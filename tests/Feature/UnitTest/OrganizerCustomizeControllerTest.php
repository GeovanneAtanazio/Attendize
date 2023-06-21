<?php

namespace Tests\Feature\UnitTest;

use App\Models\Organiser;
use App\Models\User;
use Tests\TestCase;

class OrganizerCustomizeControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $organiser = factory(Organiser::class)->create();
        $this->actingAs($organiser);
    }

    /**
     * @test
     */
    public function testPostEditOrganiser()
    {
        $response = $this->post(route('postEditOrganiser', ['organiser_id' => '1']),
        ['name' => 'Empresa', 'email' => 'empresa@teste.com', 'enable_organiser_page' => '1']);
        $this->assertEquals('success', $response->decodeResponseJson()['status']);
    }
}
