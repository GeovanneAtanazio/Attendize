<?php

namespace Tests\Feature\UnitTest;

use App\Models\Organiser;
use App\Models\User;
use Tests\TestCase;

class OrganizerDashboardControllerTest extends TestCase
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
    public function testShowOrganiserDashboard()
    {
        $response = $this->get(route('showOrganiserDashboard', ['organiser_id' => $this->organiser->id]));
        $response->assertSuccessful();
    }

     /**
     * @test
     */
    public function testShowOrganiserEvents()
    {
        $response = $this->get(route('showOrganiserEvents', ['organiser_id' => $this->organiser->id]));
        $response->assertSuccessful();
    }
}
