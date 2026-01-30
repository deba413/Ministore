<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelName;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Electronics','Clothing'];
        foreach ($categories as $category) {
            $cat = New Category();
            $cat->name = $category;
            $cat->save();
        }
    }
}
