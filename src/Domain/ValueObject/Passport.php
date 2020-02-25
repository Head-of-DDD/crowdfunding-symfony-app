<?php


namespace App\Domain\ValueObject;

use App\Domain\Exceptions\DomainException;
use DateTimeImmutable;

class Passport
{
    /** @var string */
    protected $serial;
    /** @var string */
    protected $number;
    /** @var string */
    protected $issuedOrganizationName;
    /** @var DateTimeImmutable */
    protected $issuedDate;

    public function __construct(string $serial, string $number, string $issuedOrganizationName, DateTimeImmutable $issuedDate)
    {
        if (empty($serial)) {
            throw new DomainException('Passport serial is empty.');
        }
        if (empty($number)) {
            throw new DomainException('Passport number is empty.');
        }
        if (empty($issuedOrganizationName)) {
            throw new DomainException('Passport issued organizations is empty.');
        }
        if (null === $issuedDate) {
            throw new DomainException('Passport issued date is empty.');
        }

        $this->serial = $serial;
        $this->number = $number;
        $this->issuedOrganizationName = $issuedOrganizationName;
        $this->issuedDate = $issuedDate;
    }

    /**
     * @return string
     */
    public function getSerial(): string
    {
        return $this->serial;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getIssuedOrganizationName(): string
    {
        return $this->issuedOrganizationName;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getIssuedDate(): DateTimeImmutable
    {
        return $this->issuedDate;
    }
}