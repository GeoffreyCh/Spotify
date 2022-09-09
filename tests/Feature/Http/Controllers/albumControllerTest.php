<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\albumController
 */
class albumControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $albums = album::factory()->count(3)->create();

        $response = $this->get(route('album.index'));

        $response->assertOk();
        $response->assertViewIs('album.index');
        $response->assertViewHas('albums');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('album.create'));

        $response->assertOk();
        $response->assertViewIs('album.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\albumController::class,
            'store',
            \App\Http\Requests\albumStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('album.store'));

        $response->assertRedirect(route('album.index'));
        $response->assertSessionHas('album.id', $album->id);

        $this->assertDatabaseHas(albums, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $album = album::factory()->create();

        $response = $this->get(route('album.show', $album));

        $response->assertOk();
        $response->assertViewIs('album.show');
        $response->assertViewHas('album');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $album = album::factory()->create();

        $response = $this->get(route('album.edit', $album));

        $response->assertOk();
        $response->assertViewIs('album.edit');
        $response->assertViewHas('album');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\albumController::class,
            'update',
            \App\Http\Requests\albumUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $album = album::factory()->create();

        $response = $this->put(route('album.update', $album));

        $album->refresh();

        $response->assertRedirect(route('album.index'));
        $response->assertSessionHas('album.id', $album->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $album = album::factory()->create();
        $album = Album::factory()->create();

        $response = $this->delete(route('album.destroy', $album));

        $response->assertRedirect(route('album.index'));

        $this->assertModelMissing($album);
    }
}
