<?php


namespace App\Domain\Entity\Application;


use App\Domain\ValueObject\Address;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\Passport;
use App\Domain\ValueObject\PersonName;

class Applicant
{
    /** @var Id */
    protected $id;
    /** @var PersonName */
    protected $name;
    /** @var Address */
    protected $address;
    /** @var Passport */
    protected $passport;

    public function __construct(Id $id, PersonName $name, Address $address, Passport $passport)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->passport = $passport;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return PersonName
     */
    public function getName(): PersonName
    {
        return $this->name;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return Passport
     */
    public function getPassport(): Passport
    {
        return $this->passport;
    }
}