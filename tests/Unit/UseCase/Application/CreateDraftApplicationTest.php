<?php


namespace App\Tests\Unit\UseCase\Application;

use App\Domain\ValueObject\Id;
use App\Infrastructure\Repository\Application\InMemoryApplicationRepository;
use App\Tests\Builders\ApplicationBuilder;
use PHPUnit\Framework\TestCase;

class CreateDraftApplicationTest extends TestCase
{
    public function testSuccess()
    {
        $applicationId = Id::next();

        $application = (new ApplicationBuilder())
            ->withApplicationId($applicationId)
            ->build();

        $applicationRepository = new InMemoryApplicationRepository();

        $this->assertTrue($applicationRepository->saveApplication($application));

        $findApplication = $applicationRepository->getApplicationById($applicationId);

        $this->assertEquals($application->getId()->getId(), $findApplication->getId()->getId());
        $this->assertEquals($application->getNeedPrice(), $findApplication->getNeedPrice());

    }
}