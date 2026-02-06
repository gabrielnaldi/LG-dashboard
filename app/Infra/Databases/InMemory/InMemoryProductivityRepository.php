<?php

namespace App\Infra\Databases\InMemory;

use App\Domain\Entities\Productivity\Productivity;
use App\Domain\Repositories\Productivity\ProductivityRepository;
use App\Domain\Repositories\Types\ProductivityPaginatedResult;

class InMemoryProductivityRepository implements ProductivityRepository {
    private array $items = [];

    public function findById(string $id): ?Productivity {
        $productivity = $this->items[$id];

        return $productivity;
    }

    public function save(Productivity $productivity): Productivity {
        $this->items[$productivity->id()] = $productivity;

        return $productivity ?? null;
    }

    public function list(int $page, int $limit, ?string $product): ProductivityPaginatedResult {
        $filteredItems = $this->items;

        if ($product !== null) {
            $filteredItems = array_filter($filteredItems, fn($item) => $item->product() === $product);
        }

        usort($filteredItems, fn($a, $b) => $b->updatedAt() <=> $a->updatedAt());

        $total = count($filteredItems);

        $offset = ($page - 1) * $limit;
        $paginatedItems = array_slice($filteredItems, $offset, $limit);

        return new ProductivityPaginatedResult($paginatedItems, $total);
    }
}