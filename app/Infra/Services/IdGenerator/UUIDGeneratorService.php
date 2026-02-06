<?php

namespace App\Infra\Services\IdGenerator;

use App\Application\Services\IdGenerator\IdGeneratorService;
use Illuminate\Support\Str;

class UUIDGeneratorService implements IdGeneratorService {
    public function generate(): string {
        $uuid = Str::uuid()->toString();

        return $uuid;
    }
}