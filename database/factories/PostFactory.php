<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       $name = $this->faker->text(30);
        return [
            'title'=> $name,
            'slug' => str::slug($name),
            'user_id'=>rand(1,100),
            'description'=>$this->faker->text(100)
        ];
    }
}
