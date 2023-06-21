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

    /**
     * @test
     */
    public function testPostEditOrganiserPageDesign()
    {
        $response = $this->post(route('postEditOrganiserPageDesign', ['organiser_id' => '1']),
        ['page_header_bg_color' => '#c22a1e', 'page_text_color' => '#ffffff', 'page_bg_color' => '#000000']);
        $this->assertEquals('success', $response->decodeResponseJson()['status']);
    }
}
