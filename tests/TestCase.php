<?php

namespace Tests;

use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    protected function getRandomText($min, $max, $language = "pt_BR")
    {
        $qty = rand($min, $max);
        $faker = Factory::create($language);
        $text = $faker->realText($qty);
        return (object)["generator_qty" => $qty, "text" => $text, "text_size" => strlen($text)];
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }
}
