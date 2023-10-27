<?php

namespace Tests;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;
    protected $faker;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create("pt_BR");
        $this->artisan('migrate:fresh');
    }

    protected function getRandomText($min, $max)
    {
        $qty = rand($min, $max);
        $text = $this->faker->realText($qty);
        return (object)["generator_qty" => $qty, "text" => $text, "text_size" => strlen($text)];
    }
}
