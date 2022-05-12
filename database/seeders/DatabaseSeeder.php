<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Dimas Iqbal P',
            'username' => 'dimasi',
            'email' => 'dimasiqbal69@gmail.com',
            'password' => bcrypt('password')
        ]);

        // User::create([
        //     'name' => 'Burhanudin',
        //     'email' => 'burhanudin@gmail.com',
        //     'password' => bcrypt('12345')

        // ]);
        User::factory(3)->create();

        Category::create([
            'category_name' => 'Programming',
            'slug' => 'programming'
        ]);
        Category::create([
            'category_name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'category_name' => 'Web Desain',
            'slug' => 'web-desain'
        ]);

        Post::factory(10)->create();
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet.',    
        //     'isi_post' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque totam, dolorem ad numquam esse sapiente accusamus suscipit aliquam quaerat blanditiis eligendi tenetur mollitia corrupti temporibus dolore quibusdam fugiat alias, ut voluptatibus ullam rem. Illum soluta quidem inventore id, eveniet sunt voluptatum nisi. Minus maiores quas repudiandae voluptate voluptatem esse incidunt.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet.',
        //     'isi_post' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque totam, dolorem ad numquam esse sapiente accusamus suscipit aliquam quaerat blanditiis eligendi tenetur mollitia corrupti temporibus dolore quibusdam fugiat alias, ut voluptatibus ullam rem. Illum soluta quidem inventore id, eveniet sunt voluptatum nisi. Minus maiores quas repudiandae voluptate voluptatem esse incidunt.',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet.',
        //     'isi_post' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque totam, dolorem ad numquam esse sapiente accusamus suscipit aliquam quaerat blanditiis eligendi tenetur mollitia corrupti temporibus dolore quibusdam fugiat alias, ut voluptatibus ullam rem. Illum soluta quidem inventore id, eveniet sunt voluptatum nisi. Minus maiores quas repudiandae voluptate voluptatem esse incidunt.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
    }
}
