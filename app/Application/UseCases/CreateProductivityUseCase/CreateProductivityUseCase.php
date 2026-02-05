<?php

namespace App\Application\UseCases\CreateProductivityUseCase;

use App\Application\Services\IdGenerator\IdGeneratorService;
use App\Domain\Entities\Productivity\Productivity;
use App\Domain\Repositories\Productivity\ProductivityRepository;

class CreateProductivityUseCase {
    private ProductivityRepository $productivityRepository;
    private IdGeneratorService $idGeneratorService;

    public function __construct(ProductivityRepository $productivityRepository, IdGeneratorService $idGeneratorService) {
      $this->productivityRepository = $productivityRepository;
      $this->idGeneratorService = $idGeneratorService;
    }

    public function execute(string $product, int $produced, int $defects) {
        $generatedId = $this->idGeneratorService->generate();

        $productivity = Productivity::create($generatedId, $product, $produced, $defects);

        $this->productivityRepository->save($productivity);
    }
}