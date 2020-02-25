<?php


namespace App\Domain\ValueObject;


use App\Domain\Exceptions\DomainException;

class PersonName implements ValueObjectInterface
{
    /** @var string */
    protected $surname;
    /** @var string */
    protected $name;
    /** @var string|null */
    protected $patronymic;

    public function __construct(string $surname, string $name, ?string $patronymic = null)
    {
        if (empty($surname)) {
            throw new DomainException('Surname is empty.');
        }
        if (empty($name)) {
            throw new DomainException('Name is empty.');
        }

        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function __toString(): string
    {
        return sprintf('%s %s %s', $this->surname, $this->name, $this->patronymic);
    }

    public function equals(self $object): bool
    {
        return (string)$this === (string)$object;
    }
}