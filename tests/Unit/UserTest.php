<?php

namespace Tests\Unit;

use AppTest\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * @test
     * @testdox New User.
     *
     */
    public function testExample()
    {
        $attr = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'role' => 1
        ];


        $user = new User($attr);
        self::assertEquals($attr, $user->getAttributes());

    }

}
