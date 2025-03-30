<?php

// database/factories/ProductFactory.php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Products::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->word(), 
            'product_description' => $this->faker->sentence(), 
            'product_price' => $this->faker->randomFloat(2, 10, 1000),
            'product_stock' => $this->faker->numberBetween(0, 100), 
            'product_status' => $this->faker->boolean(), 
        ];
    }
}

