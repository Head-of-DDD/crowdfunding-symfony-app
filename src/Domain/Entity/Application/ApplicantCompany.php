<?php


namespace App\Domain\Entity\Application;


use App\Domain\Exceptions\DomainException;
use App\Domain\ValueObject\Address;
use App\Domain\ValueObject\INN;
use App\Domain\ValueObject\OGRN;
use App\Domain\ValueObject\OGRNIP;

class ApplicantCompany
{
    /** @var string */
    protected $shortName;
    /** @var string */
    protected $fullName;
    /** @var INN */
    protected $INN;
    /** @var OGRN|null */
    protected $OGRN;
    /** @var OGRNIP|null */
    protected $OGRNIP;
    /** @var Address */
    protected $legalAddress;
    /** @var Address */
    protected $actualAddress;

    public function __construct(string $shortName, string $fullName, INN $INN, ?OGRN $OGRN, ?OGRNIP $OGRNIP, Address $legalAddress, Address $actualAddress)
    {
        if ($OGRNIP === null && $OGRN === null) {
            throw new DomainException('OGRN and OGRNIP is empty.');
        }

        $this->shortName = $shortName;
        $this->fullName = $fullName;
        $this->INN = $INN;
        $this->OGRN = $OGRN;
        $this->OGRNIP = $OGRNIP;
        $this->legalAddress = $legalAddress;
        $this->actualAddress = $actualAddress;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return INN
     */
    public function getINN(): INN
    {
        return $this->INN;
    }

    /**
     * @return OGRN|null
     */
    public function getOGRN(): ?OGRN
    {
        return $this->OGRN;
    }

    /**
     * @return OGRNIP|null
     */
    public function getOGRNIP(): ?OGRNIP
    {
        return $this->OGRNIP;
    }

    /**
     * @return Address
     */
    public function getLegalAddress(): Address
    {
        return $this->legalAddress;
    }

    /**
     * @return Address
     */
    public function getActualAddress(): Address
    {
        return $this->actualAddress;
    }

    public function isCompany(): bool
    {
        return $this->OGRN !== null;
    }
}