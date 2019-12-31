<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterControllerTest extends DuskTestCase
{
    /**
     * @test
     * @testdox Register page
     * @group register
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'Carlos Clayton')
                ->type('email', 'carlos.clayton@gmail.com')
                ->type('password', '123456789')
                ->type('password_confirmation', '123456789')
                ->press('Register')
                ->assertPathIs('/home');
        });
    }

}
