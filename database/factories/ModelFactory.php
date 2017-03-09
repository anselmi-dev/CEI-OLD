<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
        'role' => $faker->randomElement(['user','superUser','admin','superAdmin']),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\boleta::class, function (Faker\Generator $faker) {


    return [
        'boleta' => $faker->boolean()
    ];
});
$factory->define(App\Models\docente::class, function (Faker\Generator $faker) {


    return [
        'nombre' => $faker->name,
        'apellido'=> $faker->lastname,
        'cedula' => $faker->randomNumber(),
        'activo' => $faker->boolean()
    ];
});
$factory->define(App\Models\estudiante::class, function (Faker\Generator $faker) {


    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastname,
        'fechaNacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'email' => $faker->email,
        'sexo' => $faker->randomElement(['F', 'M']),
        'activo' => $faker->boolean()
    ];
});
$factory->define(App\Models\grado::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'secciones' => $faker->numberBetween($min = 1, $max = 5),
        'activo' => $faker->boolean()
    ];
});
$factory->define(App\Models\seccion::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'activo' => $faker->boolean()
    ];
});
$factory->define(App\Models\trimestre::class, function (Faker\Generator $faker) {


    return [
        'trimestre' => $faker->randomElement(['ENE', 'MAY', 'JUL']),
        'ano' =>  '2017',
        'activo' => $faker->boolean()
    ];
});
