<?php


namespace App\Domain\DTO;


class CreateDraftApplicationDTO
{
    /** @var string */
    public $applicantSurname;
    /** @var string */
    public $applicantName;
    /** @var string */
    public $applicantPatronymic;
    /** @var string */
    public $applicantAddress;
    /** @var string */
    public $applicantPassportSerial;
    /** @var string */
    public $applicantPassportNumber;
    /** @var string */
    public $applicantPassportIssueOrganization;
    /** @var \DateTimeImmutable */
    public $applicantPassportIssueDate;
    /** @var string */
    public $applicantCompanyShortName;
    /** @var string */
    public $applicantCompanyFullName;
    /** @var string */
    public $applicantCompanyInn;
    /** @var string|null */
    public $applicantCompanyOgrn;
    /** @var string|null */
    public $applicantCompanyOgrnIP;
    /** @var string */
    public $applicantCompanyLegalAddress;
    /** @var string */
    public $applicantCompanyActualAddress;
    /** @var float */
    public $needSum;
    /** @var string */
    public $goal;
}