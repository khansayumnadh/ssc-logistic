<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ItemUser;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(ItemUser::class, function (Faker $faker) {
    $carbon = new Carbon();
    return [
        'user_id' => mt_rand(1, 10),
        'item_id' => mt_rand(1, 19),
        'date_start' => date('Y-m-d'),
        'date_end' => $carbon->createFromDate(date('Y'), mt_rand(1, 12), mt_rand(1, 31)),
        'notes' => $faker->text,
        'status' => mt_rand(1, 3)
    ];
});
