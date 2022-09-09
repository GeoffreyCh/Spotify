<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\artisteController
 */
class artisteControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $artistes = artiste::factory()->count(3)->create();

        $response = $this->get(route('artiste.index'));

        $response->assertOk();
        $response->assertViewIs('artiste.index');
        $response->assertViewHas('artistes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('artiste.create'));

        $response->assertOk();
        $response->assertViewIs('artiste.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\artisteController::class,
            'store',
            \App\Http\Requests\artisteStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('artiste.store'));

        $response->assertRedirect(route('artiste.index'));
        $response->assertSessionHas('artiste.id', $artiste->id);

        $this->assertDatabaseHas(artistes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $artiste = artiste::factory()->create();

        $response = $this->get(route('artiste.show', $artiste));

        $response->assertOk();
        $response->assertViewIs('artiste.show');
        $response->assertViewHas('artiste');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $artiste = artiste::factory()->create();

        $response = $this->get(route('artiste.edit', $artiste));

        $response->assertOk();
        $response->assertViewIs('artiste.edit');
        $response->assertViewHas('artiste');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\artisteController::class,
            'update',
            \App\Http\Requests\artisteUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $artiste = artiste::factory()->create();

        $response = $this->put(route('artiste.update', $artiste));

        $artiste->refresh();

        $response->assertRedirect(route('artiste.index'));
        $response->assertSessionHas('artiste.id', $artiste->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $artiste = artiste::factory()->create();
        $artiste = Artiste::factory()->create();

        $response = $this->delete(route('artiste.destroy', $artiste));

        $response->assertRedirect(route('artiste.index'));

        $this->assertModelMissing($artiste);
    }
}
