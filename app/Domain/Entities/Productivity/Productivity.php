<?php

namespace App\Domain\Entities\Productivity;

use App\Domain\Exceptions\Productivity\ProductivityException;
use DomainException;

class Productivity {
    private string $id;
    private string $product;
    private int $produced;
    private int $defects;

    private function __construct(string $id, string $product, int $produced, int $defects) {
        $this->id = $id;
        $this->product = $product;
        $this->produced = $produced;
        $this->defects = $defects;
    }

    public function id(): string {
        return $this->id;
    }

    public function product(): string {
        return $this->product;
    }

    public function produced(): int {
        return $this->produced;
    }

    public function defects(): int {
        return $this->defects;
    }

    public static function create( string $id, string $product, int $produced, int $defects): self {
        if($id === "") throw new ProductivityException("ID can not be empty!");

        if($product === "") throw new ProductivityException("Product can not be empty!");

        if($produced < 0) throw new ProductivityException("Produced value can not be negative!");

        if($defects < 0) throw new ProductivityException("Defects value can not be negative!");

        $productivity = new self($id, $product, $produced, $defects) ;

        return $productivity;
    }
}