<?php


namespace App\Domain\Aggregate;


use App\Domain\Events\DomainEventInterface;

abstract class AbstractAggregate
{
    /** @var DomainEventInterface[] */
    private $events = [];

    public function pushEvent(DomainEventInterface $event): void
    {
        $this->events[] = $event;
    }

    /**
     * @return DomainEventInterface[]
     */
    public function releaseEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }
}