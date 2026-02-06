<?php


namespace Tests\Unit\Infra\UseCases\ListProductivitiesUseCase;

use App\Application\UseCases\ListProductivitiesUseCase\ListProductivitiesOutput;
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
        $this->assertInstanceOf(ListProductivitiesOutput::class, $firstResult);
        $this->assertIsArray($firstResult->items);
        $this->assertCount(10, $firstResult->items);
        $this->assertEquals(1, $firstResult->page);

        // Second page check
        $secondResult = $this->usecase->execute(3, 5);
        $this->assertIsArray($secondResult->items);
        $this->assertCount(5, $secondResult->items);
        $this->assertEquals(3, $secondResult->page);
    }

    public function test_it_should_filter_by_product(): void {
        $result = $this->usecase->execute(1, 10, 'Produto 1');
        $this->assertInstanceOf(ListProductivitiesOutput::class, $result);
        $this->assertIsArray($result->items);
        $this->assertCount(1, $result->items);
        $this->assertEquals('Produto 1', $result->items[0]->product());
    }
}