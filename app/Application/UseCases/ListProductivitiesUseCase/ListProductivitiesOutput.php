<?php

namespace App\Application\UseCases\ListProductivitiesUseCase;

class ListProductivitiesOutput {
    public array $items;
    public int $page;
    public int $limit;
    public int $total;

    public function totalPages(): int {
        return (int) ceil($this->total / $this->limit);
    }

    public function __construct(array $items, int $page, int $limit, int $total) {
        $this->items = $items;
        $this->page = $page;
        $this->limit = $limit;
        $this->total = $total;
    }
}