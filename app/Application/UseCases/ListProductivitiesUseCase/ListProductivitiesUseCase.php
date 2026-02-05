<?php

namespace App\Application\UseCases\ListProductivitiesUseCase;

use App\Domain\Repositories\Productivity\ProductivityRepository;

class ListProductivitiesUseCase {
    private ProductivityRepository $repository;

    public function __construct(ProductivityRepository $repository) {
        $this->repository = $repository;
    }

    /** @return Productivity[] */
    public function execute(int $page, int $limit): array {
        $productivities = $this->repository->list($page, $limit);

        return $productivities;
    }
}