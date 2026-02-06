<?php

namespace App\Application\UseCases\ListProductivitiesUseCase;

use App\Domain\Repositories\Productivity\ProductivityRepository;

class ListProductivitiesUseCase {
    private ProductivityRepository $repository;

    public function __construct(ProductivityRepository $repository) {
        $this->repository = $repository;
    }

    public function execute(int $page, int $limit, ?string $product = null): ListProductivitiesOutput {
        $paginatedResult = $this->repository->list($page, $limit, $product);

        $output = new ListProductivitiesOutput(
            $paginatedResult->items,
            $page,
            $limit,
            $paginatedResult->total,
        );

        return $output;
    }
}