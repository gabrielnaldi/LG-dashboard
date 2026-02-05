<?php

namespace Database\Seeders;

use App\Models\ProductivityModel;
use DateTimeImmutable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $isThereAnyProductivity = ProductivityModel::query()->exists();

        if($isThereAnyProductivity) return;

        $products = [
            'Bicicleta',
            'Corda',
            'Chuveiro',
            'Ventilador',
            'Geladeira',
            'Fogão',
            'Liquidificador',
            'Microondas',
            'Notebook',
            'Teclado',
            'Mouse',
            'Monitor',
            'Impressora',
            'Câmera',
            'Telefone',
            'Fone de ouvido',
            'Carregador',
            'Cadeira',
            'Mesa',
            'Luminária',
            'Espelho',
            'Relógio',
            'Mochila',
            'Capacete',
            'Travesseiro',
        ];

        foreach($products as $product) {
            ProductivityModel::create([
                'id' => (string) Str::uuid(),
                'product' => $product,
                'produced' => rand(10, 500),
                'defects' => rand(0, 20),
                'created_at' => (new DateTimeImmutable())->format('Y-m-d H:i:s')
            ]);
        }
    }
}
