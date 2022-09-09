<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\tagController
 */
class tagControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $tags = tag::factory()->count(3)->create();

        $response = $this->get(route('tag.index'));

        $response->assertOk();
        $response->assertViewIs('tag.index');
        $response->assertViewHas('tags');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('tag.create'));

        $response->assertOk();
        $response->assertViewIs('tag.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\tagController::class,
            'store',
            \App\Http\Requests\tagStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('tag.store'));

        $response->assertRedirect(route('tag.index'));
        $response->assertSessionHas('tag.id', $tag->id);

        $this->assertDatabaseHas(tags, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $tag = tag::factory()->create();

        $response = $this->get(route('tag.show', $tag));

        $response->assertOk();
        $response->assertViewIs('tag.show');
        $response->assertViewHas('tag');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $tag = tag::factory()->create();

        $response = $this->get(route('tag.edit', $tag));

        $response->assertOk();
        $response->assertViewIs('tag.edit');
        $response->assertViewHas('tag');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\tagController::class,
            'update',
            \App\Http\Requests\tagUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $tag = tag::factory()->create();

        $response = $this->put(route('tag.update', $tag));

        $tag->refresh();

        $response->assertRedirect(route('tag.index'));
        $response->assertSessionHas('tag.id', $tag->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $tag = tag::factory()->create();
        $tag = Tag::factory()->create();

        $response = $this->delete(route('tag.destroy', $tag));

        $response->assertRedirect(route('tag.index'));

        $this->assertModelMissing($tag);
    }
}
