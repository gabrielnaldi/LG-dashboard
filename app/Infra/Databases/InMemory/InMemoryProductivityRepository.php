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

    public function list(int $page, int $limit): ProductivityPaginatedResult {
        $itemsCopy = $this->items;

        usort($itemsCopy, fn($a, $b) => $a->createdAt() <=> $b->createdAt());

        $offset = ($page - 1) * $limit;

        $paginatedItems = array_slice($itemsCopy, $offset, $limit);

        $itemsCount = count($this->items);

        $result = new ProductivityPaginatedResult($paginatedItems, $itemsCount);

        return $result;
    }
}