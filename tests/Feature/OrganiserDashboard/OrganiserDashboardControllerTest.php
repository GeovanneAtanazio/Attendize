<?php

namespace Tests\Feature\EventTickets;

use App\Models\Organiser;
use App\Models\User;
use Tests\TestCase;

class OrganizerDashboardControllerTest extends TestCase
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
    public function testShowOrganiserDashboard()
    {
        $response = $this->get(route('showOrganiserDashboard', ['organiser_id' => 1]));
        $response->assertSuccessful();
    }
}
