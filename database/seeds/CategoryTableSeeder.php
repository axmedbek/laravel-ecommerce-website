<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->truncate();
        $id = DB::table('category')->insertGetId([
            'category_name'=>'Elektronika ləvazimatları',
            'slug' => 'elektronika-levazimatlari'
        ]);

        DB::table('category')->insert([
            'category_name'=>'Notbuk və Netbuklar',
            'slug' => 'notbuklar-netbuklar',
            'parent_id' => $id
        ]);
        DB::table('category')->insert([
            'category_name'=>'Ev aksesuarlari',
            'slug' => 'ev-aksesuarlari',
            'parent_id' => $id
        ]);
        DB::table('category')->insert([
            'category_name'=>'Mobil telefonlar',
            'slug' => 'mobil-telefonlar',
            'parent_id' => $id
        ]);

        $id = DB::table('category')->insertGetId([
            'category_name'=>'Kitablar',
            'slug' => 'kitablar'
        ]);
        DB::table('category')->insert([
            'category_name'=>'Türk əbədiyyatı',
            'slug' => 'turk-edebiyyati',
            'parent_id' => $id
        ]);
        DB::table('category')->insert([
            'category_name'=>'Proqramlaşdırma',
            'slug' => 'programlama-kitablari',
            'parent_id' => $id
        ]);
        DB::table('category')->insert([
            'category_name'=>'Futbol kitabları',
            'slug' => 'futbol-kitablari',
            'parent_id' => $id
        ]);



        DB::table('category')->insert([
            'category_name'=>'Mətbəx və Yeməklər',
            'slug' => 'metbex-yemekler'
        ]);
        DB::table('category')->insert([
            'category_name'=>'Ofis ləvazimatları',
            'slug' => 'ofis-levazimatlari'
        ]);
        DB::table('category')->insert([
            'category_name'=>'Mebel',
            'slug' => 'mebel'
        ]);
        DB::table('category')->insert([
            'category_name'=>'Gül buketləri',
            'slug' => 'gul-buketleri'
        ]);
        DB::table('category')->insert([
            'category_name'=>'Bijuteriya və Kosmetika',
            'slug' => 'bijuteriya-kosmetika'
        ]);
    }
}
