<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $continents = [
            ['id' => 1, 'name' => 'Asia'],
            ['id' => 2, 'name' => 'Europe'],
            ['id' => 3, 'name' => 'Australia'],
            ['id' => 4, 'name' => 'Africa'],
            ['id' => 5, 'name' => 'South America'],
            ['id' => 6, 'name' => 'North America'],
            ['id' => 7, 'name' => 'Arctic '],
        ];
        foreach ($continents as $continent) {
            \App\Models\Continent::factory()
                ->create($continent)
                ->each(function ($c) {
                    $c->countries()
                        ->saveMany(Country::factory(10)
                            ->make());
                });
        }

        Product::factory(100)->create();
    }
}
