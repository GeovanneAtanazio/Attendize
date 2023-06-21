<?php

namespace Tests\Feature\UnitTest;

use App\Models\Organiser;
use App\Models\User;
use Tests\TestCase;

class OrganizerCustomizeControllerTest extends TestCase
{
    private $organiser, $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);

        $this->organiser = factory(Organiser::class)->create();
        $this->actingAs($this->organiser);
    }


    /**
     * @test
     */
    public function testPostEditOrganiser()
    {
        $response = $this->post(route('postEditOrganiser', ['organiser_id' => $this->organiser->id]),
        ['name' => 'Empresa', 'email' => 'empresa@teste.com', 'enable_organiser_page' => '1']);
        $this->assertEquals('success', $response->decodeResponseJson()['status']);
    }

    /**
     * @test
     */
    public function testPostEditOrganiserPageDesign()
    {
        $response = $this->post(route('postEditOrganiserPageDesign', ['organiser_id' => $this->organiser->id]),
        ['page_header_bg_color' => '#c22a1e', 'page_text_color' => '#ffffff', 'page_bg_color' => '#000000']);
        $this->assertEquals('success', $response->decodeResponseJson()['status']);
    }

    /**
     * @test
     */
    public function testShowOrganiserEvents()
    {
        $response = $this->get(route('showOrganiserCustomize', ['organiser_id' =>  $this->organiser->id]));
        $response->assertSuccessful();
    }
}
