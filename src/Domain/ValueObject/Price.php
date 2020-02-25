<?php


namespace App\Domain\ValueObject;


class Price implements ValueObjectInterface
{
    protected const KF_AMOUNT = 100;
    protected const KF_EPSILON = 0.01;
    /** @var int */
    protected $amount;

    public function __construct(float $amount)
    {
        $this->amount = round($amount, 2) * self::KF_AMOUNT;
    }

    public function getAmount(): float
    {
        return round($this->amount / 100, 2);
    }

    public function __toString(): string
    {
        return number_format($this->getAmount(), 2, ',', '');
    }

    public function equals(self $object): bool
    {
        return abs($this->getAmount() - $object->getAmount()) < self::KF_EPSILON;
    }
}