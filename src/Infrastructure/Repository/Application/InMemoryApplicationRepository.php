<?php


namespace App\Infrastructure\Repository\Application;


use App\Domain\Aggregate\Application;
use App\Domain\Repository\ApplicationRepositoryInterface;

class InMemoryApplicationRepository implements ApplicationRepositoryInterface
{
    protected static $applications = [];

    public function saveApplication(Application $application): bool
    {
        self::$applications[$application->getId()->getId()] = $application;
        return true;
    }

    public function getApplicationById(string $applicationId): ?Application
    {
        if (isset(self::$applications[$applicationId])) {
            return self::$applications[$applicationId];
        }
    }
}