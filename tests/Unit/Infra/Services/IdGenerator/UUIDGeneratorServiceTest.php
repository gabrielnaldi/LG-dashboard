<?php

namespace Tests\Unit\Infra\Services\IdGenerator;

use App\Infra\Services\IdGenerator\UUIDGeneratorService;
use Tests\TestCase;

class UUIDGeneratorServiceTest extends TestCase {
    private UUIDGeneratorService $uuidService;

    protected function setUp(): void {
        parent::setUp();
        $this->uuidService = new UUIDGeneratorService();
    }

    public function test_it_should_generate_an_uuid(): void {
        $uuid = $this->uuidService->generate();

        $this->assertIsString($uuid);

        $pattern = '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i';
        $this->assertMatchesRegularExpression($pattern, $uuid);
    }
}