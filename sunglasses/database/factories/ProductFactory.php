<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $brands = ['Ray-Ban', 'Gucci', 'Prada', 'Oakley', 'Police', 'Carrera', 'Dior', 'Versace'];
        $styles = ['Aviator', 'Wayfarer', 'Round', 'Cat Eye', 'Sport', 'Clubmaster', 'Oversized'];
        $colors = ['чёрные', 'коричневые', 'золотые', 'серебряные', 'прозрачные', 'синие', 'красные'];

        $brand = $this->faker->randomElement($brands);
        $style = $this->faker->randomElement($styles);
        $color = $this->faker->randomElement($colors);

        return [
            'category_id' => Category::factory(),
            'title'       => "{$brand} {$style} — {$color}",
            'description' => $this->faker->paragraph(3),
            'price'       => $this->faker->randomFloat(2, 1500, 25000),
            'image_path'  => 'products/demo.jpg',
        ];
    }
}
