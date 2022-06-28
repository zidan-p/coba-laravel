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
            'body' => $this->faker->paragraph(mt_rand(5,10)),//generate paragraf 5 - 10
            'category_id' => mt_rand(1,2),
            'user_id' => mt_rand(1,9)

        ];
    }
}
