<?php

namespace Tests\Feature;
use AppTest\Models\User;
use Tests\TestCase;

class DBUserTest extends TestCase
{

    /**
     * @test
     * @testdox Adding User
     */
    public function test_add_user()
    {
        $attr = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'role' => 1
        ];

        $user = User::create($attr);
        self::assertDatabaseHas('users', $attr);
    }

    /**
     * @test
     * @testdox Updating User
     */
    public function test_update_user()
    {

        $attr = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'role' => 1
        ];

        $user = User::create($attr);

        $user->role = 2;
        $user->save();
        self::assertDatabaseHas('users', $user->getAttributes());
    }

    /**
     * @test
     * @testdox Showing User
     */
    public function test_show_user()
    {

        $attr = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'role' => 1
        ];
        $user = User::create($attr);
        $last = User::latest()->first();
        self::assertDatabaseHas('users', $last->getAttributes());
    }

    /**
     * @test
     * @testdox Removing User
     */
    public function test_remove_user()
    {

        $attr = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'role' => 1
        ];
        $user = User::create($attr);
        $user->delete();
        self::assertSoftDeleted('users', $user->getAttributes());
    }

}
