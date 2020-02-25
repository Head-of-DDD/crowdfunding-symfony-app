<?php

namespace App\Domain\Aggregate;


use App\Domain\Entity\Application\Applicant;
use App\Domain\Entity\Application\ApplicantCompany;
use App\Domain\ValueObject\ApplicationStatus;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\Price;

class Application extends AbstractAggregate
{
    protected const STATUSES_TRANSITIONS = [
        ApplicationStatus::DRAFT => [
            ApplicationStatus::DECLINED_BY_APPLICANT, ApplicationStatus::WAIT_MODERATION
        ],
        ApplicationStatus::DECLINED_BY_APPLICANT => [],
        ApplicationStatus::WAIT_MODERATION => [
            ApplicationStatus::DECLINED_BY_APPLICANT, ApplicationStatus::MODERATION
        ],
        ApplicationStatus::MODERATION => [
            ApplicationStatus::DECLINED_BY_MODERATION, ApplicationStatus::PREPARED
        ],
        ApplicationStatus::DECLINED_BY_MODERATION => [
            ApplicationStatus::DRAFT
        ],
        ApplicationStatus::PREPARED => [],
    ];

    /** @var Id */
    protected $id;
    /** @var Applicant */
    protected $applicant;
    /** @var ApplicantCompany */
    protected $applicantCompany;
    /** @var Price */
    protected $needPrice;
    /** @var string */
    protected $goal;
    /** @var ApplicationStatus */
    protected $status;

    public function __construct(Id $id, Applicant $applicant, ApplicantCompany $applicantCompany, Price $needPrice, string $goal, ApplicationStatus $status)
    {
        $this->id = $id;
        $this->applicant = $applicant;
        $this->applicantCompany = $applicantCompany;
        $this->needPrice = $needPrice;
        $this->goal = $goal;
        $this->status = $status;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return Applicant
     */
    public function getApplicant(): Applicant
    {
        return $this->applicant;
    }

    /**
     * @return ApplicantCompany
     */
    public function getApplicantCompany(): ApplicantCompany
    {
        return $this->applicantCompany;
    }

    /**
     * @return Price
     */
    public function getNeedPrice(): Price
    {
        return $this->needPrice;
    }

    /**
     * @return string
     */
    public function getGoal(): string
    {
        return $this->goal;
    }

    protected function canMoveStatus(ApplicationStatus $newStatus): bool
    {
        $transitions = self::STATUSES_TRANSITIONS[$this->status->getStatus()];

        return count($transitions) > 0 && in_array($newStatus->getStatus(), $transitions, true);
    }
}