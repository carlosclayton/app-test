<?php

namespace Tests\Browser;

use AppTest\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginControllerTest extends DuskTestCase
{

    /**
     * @test
     * @testdox Loign page
     * @group login
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@user.com')
                ->type('password', '123456')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

    /**
     * @test
     * @testdox Logout page
     * @group login
     */
    public function testLogout()
    {

        $user = User::whereEmail('admin@suer.com')->first();


        $this->browse(function (Browser $browser) use ($user)  {
            $browser->loginAs($user)
                ->visit('/home')
                ->clickLink('Administrator')
                ->clickLink('Logout')
                ->assertPathIs('/');
        });
    }
}
