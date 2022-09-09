<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Musique;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\musiqueController
 */
class musiqueControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $musiques = musique::factory()->count(3)->create();

        $response = $this->get(route('musique.index'));

        $response->assertOk();
        $response->assertViewIs('musique.index');
        $response->assertViewHas('musiques');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('musique.create'));

        $response->assertOk();
        $response->assertViewIs('musique.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\musiqueController::class,
            'store',
            \App\Http\Requests\musiqueStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('musique.store'));

        $response->assertRedirect(route('musique.index'));
        $response->assertSessionHas('musique.id', $musique->id);

        $this->assertDatabaseHas(musiques, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $musique = musique::factory()->create();

        $response = $this->get(route('musique.show', $musique));

        $response->assertOk();
        $response->assertViewIs('musique.show');
        $response->assertViewHas('musique');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $musique = musique::factory()->create();

        $response = $this->get(route('musique.edit', $musique));

        $response->assertOk();
        $response->assertViewIs('musique.edit');
        $response->assertViewHas('musique');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\musiqueController::class,
            'update',
            \App\Http\Requests\musiqueUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $musique = musique::factory()->create();

        $response = $this->put(route('musique.update', $musique));

        $musique->refresh();

        $response->assertRedirect(route('musique.index'));
        $response->assertSessionHas('musique.id', $musique->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $musique = musique::factory()->create();
        $musique = Musique::factory()->create();

        $response = $this->delete(route('musique.destroy', $musique));

        $response->assertRedirect(route('musique.index'));

        $this->assertModelMissing($musique);
    }
}
