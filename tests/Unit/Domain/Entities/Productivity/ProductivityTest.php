<?php

namespace Tests\Unit\Domain\Entities\Productivity;

use App\Domain\Entities\Productivity\Productivity;
use App\Domain\Exceptions\Productivity\ProductivityException;
use Tests\TestCase;

class ProductivityTest extends TestCase
{

    public function test_it_should_create_a_valid_productivity(): void {
        $productivity = Productivity::create(
            id: "1",
            product: 'TV',
            produced: 100,
            defects: 5
        );

        $this->assertEquals('1', $productivity->id());
        $this->assertEquals('TV', $productivity->product());
        $this->assertEquals(100, $productivity->produced());
        $this->assertEquals(5, $productivity->defects());
    }

    public function test_it_should_not_allow_an_empty_id(): void {
        $this->expectException(ProductivityException::class);
        $this->expectExceptionMessage('ID can not be empty!');

        Productivity::create(
            "",
            "carro",
            10,
            20
        );
    }

    public function test_it_should_not_allow_an_empty_productName(): void {
        $this->expectException(ProductivityException::class);
        $this->expectExceptionMessage('Product can not be empty!');

        Productivity::create(
            "1",
            "",
            10,
            20
        );
    }

    public function test_it_should_not_allow_produced_value_to_be_negative(): void {
        $this->expectException(ProductivityException::class);
        $this->expectExceptionMessage('Produced value can not be negative!');

        Productivity::create(
            "1",
            "Bicicleta",
            -1,
            20
        );
    }

    public function test_it_should_not_allow_defects_value_to_be_negative(): void {
        $this->expectException(ProductivityException::class);
        $this->expectExceptionMessage('Defects value can not be negative!');

        Productivity::create(
            "1",
            "Bicicleta",
            0,
            -2
        );
    }

    public function test_it_should_calculate_effectiveness(): void {
        $productivity = Productivity::create(
            '1',
            'Bicicleta',
            10,
            2
        );

        $effectiveness = $productivity->calculateEffectiveness();

        $this->assertEquals(80.0, $effectiveness);
    }

    public function test_it_should_return_zero_when_there_are_no_produced_unities(): void {
        $productivity = Productivity::create(
            '1',
            'Bicicleta',
            0,
            0
        );

        $effectiveness = $productivity->calculateEffectiveness();

        $this->assertEquals(0.0, $effectiveness);
    }
}
