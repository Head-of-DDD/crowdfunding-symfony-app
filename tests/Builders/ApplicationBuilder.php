<?php


namespace App\Tests\Builders;


use App\Domain\Aggregate\Application;
use App\Domain\Entity\Application\Applicant;
use App\Domain\Entity\Application\ApplicantCompany;
use App\Domain\ValueObject\Address;
use App\Domain\ValueObject\ApplicationStatus;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\INN;
use App\Domain\ValueObject\OGRN;
use App\Domain\ValueObject\OGRNIP;
use App\Domain\ValueObject\Passport;
use App\Domain\ValueObject\PersonName;
use App\Domain\ValueObject\Price;

class ApplicationBuilder
{
    /** @var string */
    protected $applicationId;
    /** @var string */
    protected $applicantId;
    /** @var string */
    protected $applicantSurname;
    /** @var string */
    protected $applicantName;
    /** @var string */
    protected $applicantPatronymic;
    /** @var string */
    protected $applicantAddress;
    /** @var string */
    protected $applicantPassportSerial;
    /** @var string */
    protected $applicantPassportNumber;
    /** @var string */
    protected $applicantPassportIssueOrganization;
    /** @var \DateTimeImmutable */
    protected $applicantPassportIssueDate;
    /** @var string */
    protected $applicantCompanyShortName;
    /** @var string */
    protected $applicantCompanyFullName;
    /** @var string */
    protected $applicantCompanyInn;
    /** @var string|null */
    protected $applicantCompanyOgrn;
    /** @var string|null */
    protected $applicantCompanyOgrnIP;
    /** @var string */
    protected $applicantCompanyLegalAddress;
    /** @var string */
    protected $applicantCompanyActualAddress;
    /** @var float */
    protected $needSum;
    /** @var string */
    protected $goal;
    /** @var string */
    protected $applicationStatus;

    public function __construct()
    {
        $this->applicationId = Id::next();
        $this->applicantId = Id::next();
        $this->applicantSurname = 'Иванов';
        $this->applicantName = 'Иван';
        $this->applicantPatronymic = 'Иванович';
        $this->applicantAddress = 'Россия, г.Москва, ул. Ленина, д. 12, кв. 334';
        $this->applicantPassportSerial = '2323';
        $this->applicantPassportNumber = '123123';
        $this->applicantPassportIssueOrganization = 'УФРМ России по Московской области г.Москва';
        $this->applicantPassportIssueDate = new \DateTimeImmutable('2008-12-31');
        $this->applicantCompanyShortName = 'ООО Рога и Копыта';
        $this->applicantCompanyFullName = 'Общество с ограниченной ответственностью Рога и Копыта';
        $this->applicantCompanyInn = '7594734044';
        $this->applicantCompanyOgrn = '1154909802387';
        $this->applicantCompanyOgrnIP = '310375802726124';
        $this->applicantCompanyLegalAddress = 'Россия, г.Москва, ул. Ленина, д. 12, кв. 1';
        $this->applicantCompanyActualAddress = 'Россия, г.Москва, ул. Ленина, д. 12, кв. 2';
        $this->needSum = 5000000;
        $this->goal = 'Требуемая сумма требуется для запуска стартапа с Кремниевой долине.';
        $this->applicationStatus = ApplicationStatus::DRAFT;
    }

    public function build(): Application
    {
        return new Application(
            new Id($this->applicationId),
            new Applicant(
                new Id($this->applicantId),
                new PersonName($this->applicantSurname, $this->applicantName, $this->applicantPatronymic),
                new Address($this->applicantAddress),
                new Passport(
                    $this->applicantPassportSerial,
                    $this->applicantPassportNumber,
                    $this->applicantPassportIssueOrganization,
                    $this->applicantPassportIssueDate,
                )
            ),
            new ApplicantCompany(
                $this->applicantCompanyShortName,
                $this->applicantCompanyFullName,
                new INN($this->applicantCompanyInn),
                $this->applicantCompanyOgrn ? new OGRN($this->applicantCompanyOgrn): null,
                $this->applicantCompanyOgrnIP ? new OGRNIP($this->applicantCompanyOgrnIP) : null,
                new Address($this->applicantCompanyLegalAddress),
                new Address($this->applicantCompanyActualAddress)
            ), 
            new Price($this->needSum),
            $this->goal,
            new ApplicationStatus($this->applicationStatus)
        );
    }

    public function withApplicationId(string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    public function withApplicantId(string $applicantId): self
    {
        $this->applicantId = $applicantId;
        return $this;
    }

    public function withApplicantSurname(string $applicantSurname): self
    {
        $this->applicantSurname = $applicantSurname;
        return $this;
    }

    public function withApplicantName(string $applicantName): self
    {
        $this->applicantName = $applicantName;
        return $this;
    }

    public function withApplicantPatronymic(string $applicantPatronymic): self
    {
        $this->applicantPatronymic = $applicantPatronymic;
        return $this;
    }

    public function withApplicantAddress(string $applicantAddress): self
    {
        $this->applicantAddress = $applicantAddress;
        return $this;
    }

    public function withApplicantPassportSerial(string $applicantPassportSerial): self
    {
        $this->applicantPassportSerial = $applicantPassportSerial;
        return $this;
    }

    public function withApplicantPassportNumber(string $applicantPassportNumber): self
    {
        $this->applicantPassportNumber = $applicantPassportNumber;
        return $this;
    }

    public function withApplicantPassportIssueOrganization(string $applicantPassportIssueOrganization): self
    {
        $this->applicantPassportIssueOrganization = $applicantPassportIssueOrganization;
        return $this;
    }

    public function withApplicantPassportIssueDate(\DateTimeImmutable $applicantPassportIssueDate): self
    {
        $this->applicantPassportIssueDate = $applicantPassportIssueDate;
        return $this;
    }

    public function withApplicantCompanyShortName(string $applicantCompanyShortName): self
    {
        $this->applicantCompanyShortName = $applicantCompanyShortName;
        return $this;
    }

    public function withApplicantCompanyFullName(string $applicantCompanyFullName): self
    {
        $this->applicantCompanyFullName = $applicantCompanyFullName;
        return $this;
    }

    public function withApplicantCompanyInn(string $applicantCompanyInn): self
    {
        $this->applicantCompanyInn = $applicantCompanyInn;
        return $this;
    }

    public function withApplicantCompanyOgrn(?string $applicantCompanyOgrn): self
    {
        $this->applicantCompanyOgrn = $applicantCompanyOgrn;
        return $this;
    }

    public function withApplicantCompanyOgrnIP(?string $applicantCompanyOgrnIP): self
    {
        $this->applicantCompanyOgrnIP = $applicantCompanyOgrnIP;
        return $this;
    }

    public function withApplicantCompanyLegalAddress(string $applicantCompanyLegalAddress): self
    {
        $this->applicantCompanyLegalAddress = $applicantCompanyLegalAddress;
        return $this;
    }

    public function withApplicantCompanyActualAddress(string $applicantCompanyActualAddress): self
    {
        $this->applicantCompanyActualAddress = $applicantCompanyActualAddress;
        return $this;
    }

    public function withNeedSum(float $needSum): self
    {
        $this->needSum = $needSum;
        return $this;
    }

    public function withGoal(string $goal): self
    {
        $this->goal = $goal;
        return $this;
    }

    public function withApplicationStatus(string $applicationStatus): self
    {
        $this->applicationStatus = $applicationStatus;
        return $this;
    }
}