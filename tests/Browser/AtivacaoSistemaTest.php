<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AtivacaoSistemaTest extends DuskTestCase
{
    /**
     * Primeiro acesso.
     *
     * @return void
     */
    public function testPrimeiroAcesso()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/signup')
            ->assertSee('Already have account?');
        });
    }

    /**
     * Cadastro do primeiro gestor.
     *
     * @return void
     */
    public function testCadastroPrimeiroGestor()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/signup')
            ->type('first_name', 'Giorgian')
            ->type('last_name', 'De Arrascaeta')
            ->type('email', 'giorgian_de_arrascaeta@campeao.crf.br')
            ->type('password', '@12345678')
            ->type('password_confirmation', '@12345678')
            ->press('.btn-success')
            ->assertPathIs('/login');
        });
    }

    /**
     * Primeiro Login.
     *
     * @return void
     */
    public function testPrimeiroLogin(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', 'giorgian_de_arrascaeta@campeao.crf.br')
            ->type('password', '@12345678')
            ->press('.btn-success')
            ->assertSee(
                "Before you create events you'll need to create an organiser. An organiser is simply whoever is organising the event. It can be anyone, from a person to an organisation."
            );
        });
    }

    /**
     * Criação da primeira organização.
     *
     * @return void
     */
    public function testCadastroPrimeiraOrganizacao()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/organiser/create?first_run=1')
            ->type('name', 'Copa Libertadores')
            ->type('email', 'libertadores@campeao.crf.br')
            ->press('Create Organiser')
            ->assertPathIs(
                "/organiser/create"
            );
        });


    }
}
