<?php

namespace App\Infra\Databases\Eloquent\Repositories;

use App\Domain\Entities\Productivity\Productivity;
use App\Domain\Repositories\Productivity\ProductivityRepository;
use App\Infra\Databases\Eloquent\Mappers\ProductivityMapper;
use App\Models\ProductivityModel;

class EloquentProductivityRepository implements ProductivityRepository {
    public function save(Productivity $productivity): Productivity {
        ProductivityModel::updateOrCreate([
            'id' => $productivity->id(),
            [
                'product' => $productivity->product(),
                'produced' => $productivity->produced(),
                'defects' => $productivity->defects(),
                'created_at' => $productivity->createdAt()->format('Y-m-d H:i:s'),
                'updated_at' => $productivity->updatedAt()->format('Y-m-d H:i:s'),
            ]
        ]);

        return $productivity;
    }

    public function findById(string $id): ?Productivity {
        $model = ProductivityModel::find($id);

        if(!$model) return null;

        return ProductivityMapper::toDomain($model);
    }

    /** @return Productivity[] */
    public function list(int $page, int $limit): array {
        $models = ProductivityModel::query()
        ->orderBy('updated_at', 'desc')
        ->offset(($page - 1) * $limit)
        ->limit($limit)
        ->get();

        $mappedModels = $models->map(fn ($model) => ProductivityMapper::toDomain($model))->toArray();

        return $mappedModels;
    }
}