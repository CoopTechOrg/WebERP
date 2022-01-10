<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
	
	dump(env("DB_DATABASE"));
	dump(env("APP_ENV"));
	dump(env("DB_HOST"));		
	dump(env("DB_USERNAME"));		
	dump(env("DB_PASSWORD"));		


        $this->assertTrue(true);
    }
}
