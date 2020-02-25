<?php


namespace App\Infrastructure\Repository\Application;


use App\Domain\Aggregate\Application;
use App\Domain\Repository\ApplicationRepositoryInterface;

class DbApplicationRepository implements ApplicationRepositoryInterface
{
    public function saveApplication(Application $application): bool
    {
        // TODO: Implement saveApplication() method.
    }

    public function getApplicationById(string $applicationId): ?Application
    {
        // TODO: Implement getApplicationById() method.
    }


}