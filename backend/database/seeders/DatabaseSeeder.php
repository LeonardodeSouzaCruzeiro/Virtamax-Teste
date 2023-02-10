<?php

namespace Database\Seeders;
use App\Models\Contato;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users=\App\Models\User::factory(10)->create();
        $users->each(function($user){
            $user->contatos()->createMany(Contato::factory(5)->make()->toArray());
        });
    }
}
