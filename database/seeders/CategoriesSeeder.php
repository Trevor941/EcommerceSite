<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'Best Selling',
            'fontawesome' => 'fa fa-briefcase',
            'description' => '',
            'slug' => '',
            'CountProducts' => 0,
            'image' => ''
        ]);

        $category2 = Category::create([
            'name' => 'New Arrivals',
            'fontawesome' => 'fa fa-calendar-plus',
            'description' => '',
            'slug' => '',
            'CountProducts' => 0,
            'image' => ''
        ]);

        $category3 = Category::create([
            'name' => 'Fashion & Beauty',
            'fontawesome' => 'fa fa-tshirt',
            'description' => '',
            'slug' => '',
            'CountProducts' => 0,
            'image' => ''
        ]);

        $category4 = Category::create([
            'name' => 'Kids & Babies Clothes',
            'fontawesome' => 'fa fa-child',
            'description' => '',
            'slug' => '',
            'CountProducts' => 0,
            'image' => ''
        ]);

        $category5 = Category::create([
            'name' => 'Men & Women Clothes',
            'fontawesome' => 'fa fa-restroom',
            'description' => '',
            'slug' => '',
            'CountProducts' => 0,
            'image' => ''
        ]);

        $category6 = Category::create([
            'name' => 'Phones & Computers',
            'fontawesome' => 'fa fa-desktop',
            'description' => '',
            'slug' => '',
            'CountProducts' => 0,
            'image' => ''
        ]);

        $category7 = Category::create([
            'name' => 'Electronics & Accessories',
            'fontawesome' => 'fa fa-theater-masks',
            'description' => '',
            'slug' => '',
            'CountProducts' => 0,
            'image' => ''
        ]);
        
    }
}
