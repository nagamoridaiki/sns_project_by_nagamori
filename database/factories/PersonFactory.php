<?php


use App\Model;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'mail'=>$faker->email,
        'age'=>$faker->numberBetWeen(0,100),
    ];
});

$factory->state(Person::class,'upper',function($faler){
    return [
        'name'=>strtoupper($faker->name()),
    ];

});

$factory->state(Person::class,'lower',function($faler){
    return [
        'name'=>strtolower($faker->name()),
    ];

});
