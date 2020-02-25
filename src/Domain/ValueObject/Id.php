<?php


namespace App\Domain\ValueObject;


use App\Domain\Exceptions\DomainException;
use Ramsey\Uuid\Uuid;

class Id implements ValueObjectInterface
{
    protected $id;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new DomainException('Id is empty.');
        }
        if (!Uuid::isValid($value)) {
            throw new DomainException('Id value is not valid GUID.');
        }
        $this->id = $value;
    }

    public static function next(): string
    {
        return Uuid::uuid4()->toString();
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function equals(self $object): bool
    {
        return $this->getId() === $object->getId();
    }

    public function getId(): string
    {
        return $this->id;
    }
}