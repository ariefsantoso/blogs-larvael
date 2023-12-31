<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => mt_rand(1, 20),
            'tags_id' => mt_rand(1, 6)
        ];
    }
}
