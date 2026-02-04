<?php

namespace Tests\Unit\Domain\Entities\Productivity;

use App\Domain\Entities\Productivity\Productivity;
use Tests\TestCase;

class ProductivityTest extends TestCase
{

    public function test_it_should_create_a_valid_productivity(): void
    {
        $productivity = Productivity::create(
            id: "1",
            productName: 'TV',
            produced: 100,
            defects: 5
        );

        $this->assertEquals('1', $productivity->id());
        $this->assertEquals('TV', $productivity->productName());
        $this->assertEquals(100, $productivity->produced());
        $this->assertEquals(5, $productivity->defects());
    }
}
