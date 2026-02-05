<?php

namespace App\Application\Services\IdGenerator;

interface IdGeneratorService {
    public function generate(): string;
}