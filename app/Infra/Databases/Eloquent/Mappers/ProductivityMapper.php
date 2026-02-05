<?php

namespace App\Infra\Databases\Eloquent\Mappers;

use App\Domain\Entities\Productivity\Productivity;
use App\Models\ProductivityModel;
use DateTimeImmutable;

final class ProductivityMapper {
    public static function toDomain(ProductivityModel $model): Productivity {
        $productivity = Productivity::create(
            $model->id,
            $model->product,
            $model->produced,
            $model->defects,
            new DateTimeImmutable($model->created_at),
        );

        return $productivity;
    }

    public static function toModel(Productivity $productivity): ProductivityModel {
        $model = new ProductivityModel([
            'id'         => $productivity->id(),
            'product'    => $productivity->product(),
            'produced'   => $productivity->produced(),
            'defects'    => $productivity->defects(),
            'created_at' => $productivity->createdAt()->format('Y-m-d H:i:s')
        ]);

        return $model;
    }
}