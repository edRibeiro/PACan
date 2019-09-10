<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    /*$faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));*/
    return [
        'nome' => $faker->firstName,
        'sobrenome' => $faker->lastName,
        'data_nascimento'=>$faker->date('y-m-d','-18 years'),
        'cpf' => $faker->unique()->cpf(false),
        'celular'=> $faker->cellphoneNumber,
        'telefone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
