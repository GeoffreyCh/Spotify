<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\genreController
 */
class genreControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $genres = genre::factory()->count(3)->create();

        $response = $this->get(route('genre.index'));

        $response->assertOk();
        $response->assertViewIs('genre.index');
        $response->assertViewHas('genres');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('genre.create'));

        $response->assertOk();
        $response->assertViewIs('genre.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\genreController::class,
            'store',
            \App\Http\Requests\genreStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('genre.store'));

        $response->assertRedirect(route('genre.index'));
        $response->assertSessionHas('genre.id', $genre->id);

        $this->assertDatabaseHas(genres, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $genre = genre::factory()->create();

        $response = $this->get(route('genre.show', $genre));

        $response->assertOk();
        $response->assertViewIs('genre.show');
        $response->assertViewHas('genre');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $genre = genre::factory()->create();

        $response = $this->get(route('genre.edit', $genre));

        $response->assertOk();
        $response->assertViewIs('genre.edit');
        $response->assertViewHas('genre');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\genreController::class,
            'update',
            \App\Http\Requests\genreUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $genre = genre::factory()->create();

        $response = $this->put(route('genre.update', $genre));

        $genre->refresh();

        $response->assertRedirect(route('genre.index'));
        $response->assertSessionHas('genre.id', $genre->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $genre = genre::factory()->create();
        $genre = Genre::factory()->create();

        $response = $this->delete(route('genre.destroy', $genre));

        $response->assertRedirect(route('genre.index'));

        $this->assertModelMissing($genre);
    }
}
