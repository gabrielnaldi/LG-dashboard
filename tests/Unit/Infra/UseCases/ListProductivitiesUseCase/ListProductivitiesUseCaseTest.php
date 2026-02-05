<?php


namespace Tests\Unit\Infra\UseCases\ListProductivitiesUseCase;

use App\Application\UseCases\ListProductivitiesUseCase\ListProductivitiesUseCase;
use App\Domain\Entities\Productivity\Productivity;
use App\Domain\Repositories\Productivity\ProductivityRepository;
use App\Infra\Databases\InMemory\InMemoryProductivityRepository;
use Tests\TestCase;

class ListProductivitiesUseCaseTest extends TestCase {
    private ListProductivitiesUseCase $usecase;
    private ProductivityRepository $repository;

    protected function setUp(): void {
        parent::setUp();

        $this->repository = new InMemoryProductivityRepository();
        $this->usecase = new ListProductivitiesUseCase($this->repository);

        for($counter = 1; $counter < 26; $counter++) {
            $productivity = Productivity::create('fake-id-' . $counter, 'Produto ' . $counter, $counter * 10, $counter);
            $this->repository->save($productivity);
        }
    }

    public function test_it_should_list_with_pagination(): void {
        // First check
        $firstResult = $this->usecase->execute(1, 10);

        $this->assertIsArray($firstResult);
        $this->assertCount(10, $firstResult);
        $this->assertEquals('Produto 1', $firstResult[0]->product());
        $this->assertEquals('Produto 10', $firstResult[9]->product());

        // Second page check
        $secondResult = $this->usecase->execute(3, 5);
        $this->assertCount(5, $secondResult);
        $this->assertEquals('Produto 11', $secondResult[0]->product());
        $this->assertEquals('Produto 15', $secondResult[4]->product());
    }
}