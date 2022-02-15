<?php

namespace Database\Factories;

use App\Models\Artigo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artigo>
 */
class ArtigoFactory extends Factory
{

    protected $model = Artigo::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->title(),
            'descricao'  => $this->faker->text(rand(20, 50)),
            'texto'  => $this->faker->text(400),
            'foto' => $this->faker->image(storage_path('imagens'), 1024, 1024, 'cats', false),
            'usuario_id' => rand(1,15)
        ];
    }
        public function title($nbWords = 5)
    {
        $sentence = $this->faker->sentence($nbWords);
        return substr($sentence, 0, strlen($sentence) - 1);
    }

}
