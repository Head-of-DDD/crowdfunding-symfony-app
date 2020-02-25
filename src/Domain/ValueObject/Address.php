<?php


namespace App\Domain\ValueObject;


use App\Domain\Exceptions\DomainException;

class Address implements ValueObjectInterface
{
    protected $address;

    public function __construct(string $address)
    {
        if (empty($address)) {
            throw new DomainException('Address is empty.');
        }
        $this->address = $address;
    }

    public function __toString(): string
    {
        return $this->address;
    }

    public function equals(self $object): bool
    {
        return $this->getAddress() === $object->getAddress();
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}