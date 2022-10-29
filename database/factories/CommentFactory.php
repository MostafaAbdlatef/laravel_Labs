<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$name = $this->faker->text(30);
        return [
                'content'=> Str::slug($name),
                'commentable_id'=>rand(1,100),
                'commentable_type'=>Str::slug($name)
            
        ];
    }
}
