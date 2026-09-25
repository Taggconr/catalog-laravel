<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Мужские' => [
                'slug'  => 'mens',
                'items' => [
                    ['Ray-Ban Aviator — золотые',        8900],
                    ['Ray-Ban Wayfarer — чёрные',         9500],
                    ['Police Clubmaster — коричневые',    7400],
                    ['Carrera Sport — чёрные',            6200],
                    ['Gucci Oversized — серебряные',     18900],
                    ['Prada Round — прозрачные',         15600],
                    ['Oakley Holbrook — синие',           9800],
                    ['Versace Medusa — золотые',         22400],
                ],
            ],
            'Женские' => [
                'slug'  => 'womens',
                'items' => [
                    ['Dior Cat Eye — чёрные',            19800],
                    ['Prada Cat Eye — розовые',          17400],
                    ['Gucci Oversized — золотые',        21500],
                    ['Versace Round — серебряные',       18900],
                    ['Ray-Ban Round — коричневые',        9200],
                    ['Chanel Butterfly — чёрные',        26800],
                    ['Fendi Baguette — прозрачные',      14200],
                    ['Miu Miu Glimpse — синие',          16700],
                ],
            ],
            'Унисекс' => [
                'slug'  => 'unisex',
                'items' => [
                    ['Ray-Ban Aviator — серебряные',      8900],
                    ['Ray-Ban Wayfarer — чёрные',         9500],
                    ['Oakley Frogskins — прозрачные',     7800],
                    ['Carrera Aviator — золотые',         6400],
                    ['Police Wayfarer — коричневые',      8200],
                    ['Gucci Round — чёрные',             17600],
                    ['Prada Aviator — серебряные',       15900],
                    ['Dior Wayfarer — синие',            18400],
                ],
            ],
            'Спортивные' => [
                'slug'  => 'sport',
                'items' => [
                    ['Oakley Flak 2.0 — чёрные',         11500],
                    ['Oakley Radar EV — синие',          12800],
                    ['Nike Show X3 — красные',            7600],
                    ['Adidas Sport — чёрные',             5800],
                    ['Puma Track — прозрачные',           4900],
                    ['Under Armour Igniter — серые',      6300],
                    ['Rudy Project Tralyx — белые',       9400],
                    ['Smith Attack — синие',              8700],
                ],
            ],
            'Детские' => [
                'slug'  => 'kids',
                'items' => [
                    ['Детские Round — синие',             1200],
                    ['Детские Cat Eye — розовые',         1400],
                    ['Детские Sport — красные',           1600],
                    ['Детские Wayfarer — чёрные',         1350],
                    ['Детские Aviator — золотые',         1550],
                    ['Детские Round — прозрачные',        1100],
                    ['Детские Oversized — белые',         1700],
                    ['Детские Butterfly — сиреневые',     1450],
                ],
            ],
        ];

        foreach ($data as $name => $info) {
            $category = Category::create([
                'name' => $name,
                'slug' => $info['slug'],
            ]);

            foreach ($info['items'] as $i => [$title, $price]) {
                // seed гарантирует, что картинка будет всегда одна и та же
                // для одного и того же товара (детерминированный picsum)
                $seed = $info['slug'] . '-' . $i;

                Product::create([
                    'category_id' => $category->id,
                    'title'       => $title,
                    'description' => 'Солнечные очки ' . $title
                        . '. УФ-защита 400, поляризованные линзы, '
                        . 'прочная оправа, чехол и салфетка в комплекте.',
                    'price'       => $price,
                    'image_path'  => 'https://dummyjson.com/image/600x400/282828/ffffff?text=' . urlencode($title),
                ]);
            }
        }
    }
}
