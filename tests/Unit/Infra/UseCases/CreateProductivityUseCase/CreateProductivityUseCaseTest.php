<?php

namespace Tests\Unit\Infra\UseCases\CreateProductivityUseCase;

use App\Application\UseCases\CreateProductivityUseCase\CreateProductivityUseCase;
use App\Domain\Entities\Productivity\Productivity;
use App\Infra\Databases\InMemory\InMemoryProductivityRepository;
use App\Infra\Services\IdGenerator\UUIDGeneratorService;
use Tests\TestCase;

class CreateProductivityUseCaseTest extends TestCase {
    private InMemoryProductivityRepository $repository;
    private UUIDGeneratorService $idGenerator;
    private CreateProductivityUseCase $usecase;

    protected function setUp(): void {
        $this->repository = new InMemoryProductivityRepository();
        $this->idGenerator = new UUIDGeneratorService();
        $this->usecase = new CreateProductivityUseCase($this->repository, $this->idGenerator);
    }

    public function test_it_should_create_a_productivity(): void {
        $productivity = $this->usecase->execute('Bicicleta', 10, 5);

        $idToSearch = $productivity->id();

        $productivityOnRepository = $this->repository->findById($idToSearch);

        $this->assertInstanceOf(Productivity::class, $productivity);
        $this->assertEquals($productivity, $productivityOnRepository);
    }
}