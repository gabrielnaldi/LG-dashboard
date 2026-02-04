<?php

namespace App\Domain\Entities\Productivity;

class Productivity {
    private string $id;
    private string $productName;
    private int $produced;
    private string $defects;

    private function __construct(string $id, string $productName, int $produced, string $defects) {
        $this->id = $id;
        $this->productName = $productName;
        $this->produced = $produced;
        $this->defects = $defects;
    }

    public static function create( string $id, string $productName, int $produced, string $defects): self {
        $productivity = new self($id, $productName, $produced, $defects) ;

        return $productivity;
    }
}