<?php


namespace App\Domain\ValueObject;


use App\Domain\Exceptions\DomainException;

class ApplicationStatus implements ValueObjectInterface
{
    public const DRAFT = 'draft';
    public const DECLINED_BY_APPLICANT = 'declined_by_applicant';
    public const WAIT_MODERATION = 'wait_moderation';
    public const MODERATION = 'moderation';
    public const DECLINED_BY_MODERATION = 'declined_by_moderation';
    public const PREPARED = 'prepared';

    protected const ALLOWED_STATUSES = [
        self::DRAFT,
        self::DECLINED_BY_APPLICANT,
        self::WAIT_MODERATION,
        self::MODERATION,
        self::DECLINED_BY_MODERATION,
        self::PREPARED
    ];

    /** @var string */
    protected $status;

    public function __construct(string $status)
    {
        if (!in_array($status, self::ALLOWED_STATUSES, true)) {
            throw new DomainException('this status name not allowed.');
        }
        $this->status = $status;
    }

    public function __toString(): string
    {
        return $this->status;
    }

    public function equals(self $object): bool
    {
        return $this->getStatus() === $object->getStatus();
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}