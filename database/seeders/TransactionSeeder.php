<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'income' => ['wage', 'bonus', 'gift'],
            'expense' => ['food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation']
        ];

        for ($i = 0; $i < 100; $i++) {
            $type = rand(0, 1) == 1 ? 'income' : 'expense';
            $category = $categories[$type][array_rand($categories[$type])];

            Transaction::create([
                'amount' => rand(1, 10000),
                'type' => $type,
                'category' => $category,
                'notes' => 'Transaction ' . ($i + 1),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
