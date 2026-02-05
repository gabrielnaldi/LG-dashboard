<?php

namespace App\Domain\Repositories\Productivity;

use App\Domain\Entities\Productivity\Productivity;

interface ProductivityRepository {
    public function save(Productivity $productivity): Productivity;
    public function findById(string $id): ?Productivity;

    /** *@return Productivity[] */
    public function list(int $page, int $limit): array;
}