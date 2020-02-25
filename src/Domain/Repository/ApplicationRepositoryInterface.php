<?php


namespace App\Domain\Repository;


use App\Domain\Aggregate\Application;

interface ApplicationRepositoryInterface
{
    public function saveApplication(Application $application): bool;
    public function getApplicationById(string $applicationId): ?Application;
}