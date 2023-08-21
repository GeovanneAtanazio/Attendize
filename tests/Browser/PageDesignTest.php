<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PageDesignTest extends DuskTestCase
{

    /**
     * Testa o login.
     *
     * @beforeClass
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', 'giorgian_de_arrascaeta@campeao.crf.br')
            ->type('password', '@12345678')
            ->press('.btn-success')
            ->assertPathIs(
                "/organiser/1/dashboard"
            );
        });
    }

    /**
     * Edita dados da página de design.
     *
     * @return void
     */
    public function testConfiguracaoPageDesign()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('organiser/1/customize')
            ->click('a[href="#OrganiserPageDesign"][data-toggle="tab"]')
            ->type('page_header_bg_color', '#a60324')
            ->press('Save Changes')
            ->click('a[href="#OrganiserPageDesign"][data-toggle="tab"]')
            ->waitFor('.humane.humane-animate')
            ->assertSee('Organiser Design Successfully Updated!');
        });
    }
}
