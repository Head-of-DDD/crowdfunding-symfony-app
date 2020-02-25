<?php


namespace App\Domain\ValueObject;


class INN implements ValueObjectInterface
{
    /** @var string */
    protected $INN;

    public function __construct(string $INN)
    {
        $this->INN = $INN;
    }

    public function __toString(): string
    {
        $this->INN;
    }

    public function equals(self $object): bool
    {
        return $this->getINN() === $object->getINN();
    }

    public function getINN(): string
    {
        return $this->INN;
    }
}