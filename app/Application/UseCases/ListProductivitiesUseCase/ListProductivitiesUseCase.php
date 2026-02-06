<?php

namespace App\Application\UseCases\ListProductivitiesUseCase;

use App\Domain\Repositories\Productivity\ProductivityRepository;

class ListProductivitiesUseCase {
    private ProductivityRepository $repository;

    public function __construct(ProductivityRepository $repository) {
        $this->repository = $repository;
    }

    /** @return Productivity[] */
    public function execute(int $page, int $limit): ListProductivitiesOutput {
        $paginatedResult = $this->repository->list($page, $limit);

        $output = new ListProductivitiesOutput(
            $paginatedResult->items,
            $page,
            $limit,
            $paginatedResult->total,
        );

        return $output;
    }
}