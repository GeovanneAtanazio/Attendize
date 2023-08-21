<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditMyProfileTest extends DuskTestCase
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
     * Edita dados do Usuário.
     *
     * @return void
     */
    public function testExemple()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/organiser/1/events')
            ->waitFor('.btn-group.btn-group-responsive')
            ->click('.dropdown-toggle')
            ->waitFor('.dropdown.profile.open')
            ->click('.loadModal.editUserModal')
            ->waitFor('.modal.fade.in')
            ->type('first_name', 'Bruno')
            ->type('last_name', 'Henrique')
            ->type('email', 'bh27@campeao.crf.br')
            ->press('Save Details')
            ->waitFor('.humane.humane-animate')
            ->assertSee('Organiser Design Successfully Updated!');
        });
    }
}
