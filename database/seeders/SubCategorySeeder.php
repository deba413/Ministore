<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $categories = [
                'Electronics' => ['Mobile,laptop,Washing Machine', 'TV,AC', 'Camera', 'Printer', 'Computer', 'Tablet', 'Smart Watch'],
                'Clothing' => ['Men', 'Women', 'Children']
            ];

            foreach ($categories as $categoryName => $subCategories) {

                $category = Category::firstOrCreate(['name' => $categoryName]);

                foreach ($subCategories as $subCategoryName) {
                    
                    $subCategory = SubCategory::firstOrNew([
                        'name' => $subCategoryName,
                        'category_id' => $category->id
                        ]);

                        if(!$subCategory->exists){
                            $subCategory->save();
                        }
                }
            }
    }
}
