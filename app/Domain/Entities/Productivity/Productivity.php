<?php

namespace App\Domain\Entities\Productivity;

use App\Domain\Exceptions\Productivity\ProductivityException;
use DomainException;

class Productivity {
    private string $id;
    private string $productName;
    private int $produced;
    private int $defects;

    private function __construct(string $id, string $productName, int $produced, int $defects) {
        $this->id = $id;
        $this->productName = $productName;
        $this->produced = $produced;
        $this->defects = $defects;
    }

    public function id(): string {
        return $this->id;
    }

    public function productName(): string {
        return $this->productName;
    }

    public function produced(): int {
        return $this->produced;
    }

    public function defects(): int {
        return $this->defects;
    }

    public static function create( string $id, string $productName, int $produced, int $defects): self {
        if($id === "") throw new ProductivityException("ID can not be empty!");

        if($productName === "") throw new ProductivityException("Product name can not be empty!");

        $productivity = new self($id, $productName, $produced, $defects) ;

        return $productivity;
    }
}