<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repositories\CategoryRepositories $category)
    {
        //清除表
        App\Category::truncate();

        factory(\App\Category::class)->create([
            'name' => '默认',
            'parent_id' => '0',
            'alias' => 'default',
        ]);

        factory(\App\Category::class)->create([
            'name' => '闹钟任务',
            'parent_id' => $category->selectWhereFirst('category_id', 'alias', 'default')['category_id'],
            'alias' => 'alarm',
        ]);
    }
}
