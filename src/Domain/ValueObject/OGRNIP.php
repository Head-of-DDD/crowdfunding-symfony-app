<?php


namespace App\Domain\ValueObject;


class OGRNIP
{
    /** @var string */
    protected $OGRNIP;

    public function __construct(string $OGRNIP)
    {
        $this->OGRNIP = $OGRNIP;
    }

    public function __toString(): string
    {
        $this->OGRNIP;
    }

    public function equals(self $object): bool
    {
        return $this->getOGRNIP() === $object->getOGRNIP();
    }

    public function getOGRNIP(): string
    {
        return $this->OGRNIP;
    }
}