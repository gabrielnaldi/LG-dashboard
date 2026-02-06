<?php

namespace App\Domain\Repositories\Types;

class ProductivityPaginatedResult {
    /** @var Productivity[] */
    public array $items;
    public int $total;

    public function __construct(array $items, int $total) {
        $this->items = $items;
        $this->total = $total;
    }
}
