<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\playlistController
 */
class playlistControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $playlists = playlist::factory()->count(3)->create();

        $response = $this->get(route('playlist.index'));

        $response->assertOk();
        $response->assertViewIs('playlist.index');
        $response->assertViewHas('playlists');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('playlist.create'));

        $response->assertOk();
        $response->assertViewIs('playlist.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\playlistController::class,
            'store',
            \App\Http\Requests\playlistStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('playlist.store'));

        $response->assertRedirect(route('playlist.index'));
        $response->assertSessionHas('playlist.id', $playlist->id);

        $this->assertDatabaseHas(playlists, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $playlist = playlist::factory()->create();

        $response = $this->get(route('playlist.show', $playlist));

        $response->assertOk();
        $response->assertViewIs('playlist.show');
        $response->assertViewHas('playlist');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $playlist = playlist::factory()->create();

        $response = $this->get(route('playlist.edit', $playlist));

        $response->assertOk();
        $response->assertViewIs('playlist.edit');
        $response->assertViewHas('playlist');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\playlistController::class,
            'update',
            \App\Http\Requests\playlistUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $playlist = playlist::factory()->create();

        $response = $this->put(route('playlist.update', $playlist));

        $playlist->refresh();

        $response->assertRedirect(route('playlist.index'));
        $response->assertSessionHas('playlist.id', $playlist->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $playlist = playlist::factory()->create();
        $playlist = Playlist::factory()->create();

        $response = $this->delete(route('playlist.destroy', $playlist));

        $response->assertRedirect(route('playlist.index'));

        $this->assertModelMissing($playlist);
    }
}
