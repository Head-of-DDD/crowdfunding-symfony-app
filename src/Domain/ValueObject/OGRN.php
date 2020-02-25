<?php


namespace App\Domain\ValueObject;


class OGRN
{
    /** @var string */
    protected $OGRN;

    public function __construct(string $OGRN)
    {
        $this->OGRN = $OGRN;
    }

    public function __toString(): string
    {
        $this->OGRN;
    }

    public function equals(self $object): bool
    {
        return $this->getOGRN() === $object->getOGRN();
    }

    public function getOGRN(): string
    {
        return $this->OGRN;
    }
}