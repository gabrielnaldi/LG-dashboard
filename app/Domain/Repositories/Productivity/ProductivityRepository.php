<?php

namespace App\Domain\Repositories\Productivity;

use App\Domain\Entities\Productivity\Productivity;
use App\Domain\Repositories\Types\ProductivityPaginatedResult;

interface ProductivityRepository {
    public function save(Productivity $productivity): Productivity;
    public function findById(string $id): ?Productivity;
    public function list(int $page, int $limit): ProductivityPaginatedResult;
}