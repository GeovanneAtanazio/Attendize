<?php

namespace Tests\Feature\UnitTest;

use App\Models\Organiser;
use App\Models\User;
use Tests\TestCase;

class EventControllerTest extends TestCase
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
    public function testPostCreateEvent()
    {
        $data = new \DateTime();
        $startDate = $data->modify('+5 days');
        $endDate = $data->modify('+1 month');

        $response = $this->post(
            route('postCreateEvent'),
            [
                'title' => 'Evento de Teste',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
                'start_date' => $startDate->format('Y-m-d H:i'),
                'end_date' => $endDate->format('Y-m-d H:i'),
                'location_venue_name' => 'Av. Rotary, 295 - Atalaia, Aracaju - SE, 49037-550',
                'organiser_id' => $this->organiser->id
            ]
        );

        $this->assertEquals('success', $response->decodeResponseJson()['status']);
    }

    /**
     * @test
     */
    public function testErrorPostCreateEvent()
    {
        $data = new \DateTime();
        $startDate = $data->modify('+5 days');
        $endDate = $data->modify('+1 month');

        $response = $this->post(
            route('postCreateEvent'),
            [
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
                'start_date' => $startDate->format('Y-m-d H:i'),
                'end_date' => $endDate->format('Y-m-d H:i'),
                'location_venue_name' => 'Av. Rotary, 295 - Atalaia, Aracaju - SE, 49037-550',
                'organiser_id' => $this->organiser->id
            ]
        );

        $this->assertEquals('error', $response->decodeResponseJson()['status']);
    }

    /**
     * @test
     */
    public function testShowOrganiserEvents()
    {
        $response = $this->get(route('showOrganiserEvents', ['organiser_id' =>  $this->organiser->id]));
        $response->assertSuccessful();
    }


}
