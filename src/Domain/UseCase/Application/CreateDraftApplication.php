<?php


namespace App\Domain\UseCase\Application;


use App\Domain\Aggregate\Application;
use App\Domain\DTO\CreateDraftApplicationDTO;
use App\Domain\Entity\Application\Applicant;
use App\Domain\Entity\Application\ApplicantCompany;
use App\Domain\Exceptions\DomainException;
use App\Domain\Repository\ApplicationRepositoryInterface;
use App\Domain\ValueObject\Address;
use App\Domain\ValueObject\ApplicationStatus;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\INN;
use App\Domain\ValueObject\OGRN;
use App\Domain\ValueObject\OGRNIP;
use App\Domain\ValueObject\Passport;
use App\Domain\ValueObject\PersonName;
use App\Domain\ValueObject\Price;

class CreateDraftApplication
{
    /** @var ApplicationRepositoryInterface  */
    protected $applicationRepository;

    public function __construct(ApplicationRepositoryInterface $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function handle(CreateDraftApplicationDTO $data): void
    {
        $application = new Application(
            new Id(Id::next()),
            $this->createApplicant($data),
            $this->createApplicantCompany($data),
            new Price($data->needSum),
            $data->goal,
            new ApplicationStatus(ApplicationStatus::DRAFT)
        );

        if (!$this->applicationRepository->saveApplication($application)) {
            throw new DomainException('Application is not saved.');
        }

    }

    protected function createApplicant(CreateDraftApplicationDTO $data): Applicant
    {
        return new Applicant(
            new Id(Id::next()),
            new PersonName($data->applicantSurname, $data->applicantName, $data->applicantPatronymic),
            new Address($data->applicantAddress),
            new Passport(
                $data->applicantPassportSerial,
                $data->applicantPassportNumber,
                $data->applicantPassportIssueOrganization,
                $data->applicantPassportIssueDate
            )
        );
    }

    protected function createApplicantCompany(CreateDraftApplicationDTO $data): ApplicantCompany
    {
        return new ApplicantCompany(
            $data->applicantCompanyShortName,
            $data->applicantCompanyFullName,
            new INN($data->applicantCompanyInn),
            new OGRN($data->applicantCompanyOgrn),
            new OGRNIP($data->applicantCompanyOgrnIP),
            new Address($data->applicantCompanyLegalAddress),
            new Address($data->applicantCompanyActualAddress)
        );
    }
}