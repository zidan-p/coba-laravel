<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //disini tempat kita akan melakukan define
    //untuk menggunakn data random
    //info lanjut lihat pada websitenya
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)), //generate kalimat random, antara 2 - 8 kata
            'slug' => $this->faker->slug(), //glug generator bawaan php
            'excerpt' => $this->faker->paragraph(), //paragraf 1
            'body' => collect($this->faker->paragraphs(mt_rand(3,5)))//membuat lebih ddari 11 paragrap(bukan kalimat) berbentuk array
                        ->map(fn($p)=> "<p>$p</p>") //melakukan map untuk setiap array suapa diberi tag p
                        ->implode(''),   //menggabungkan semua array menjadi sebuah string tunggal
            'category_id' => mt_rand(1,2),
            'user_id' => mt_rand(1,4)

        ];
    }
}
