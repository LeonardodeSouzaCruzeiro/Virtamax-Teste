<?php

namespace Database\Factories;
use App\Models\Contato;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContatoFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @var string
     */
    
    protected $model = Contato::class;

    
    /**
     * Define the model's default state.
     *
     * @return array
     */

    


    public function definition()
    {
        return [
            'nome'=>$this->faker->word(),
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->e164PhoneNumber,
            'foto' =>$this->faker->url()

        ];
    }
}
