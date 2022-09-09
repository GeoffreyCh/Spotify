<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Annotable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\annotableController
 */
class annotableControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $annotables = annotable::factory()->count(3)->create();

        $response = $this->get(route('annotable.index'));

        $response->assertOk();
        $response->assertViewIs('annotable.index');
        $response->assertViewHas('annotables');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('annotable.create'));

        $response->assertOk();
        $response->assertViewIs('annotable.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\annotableController::class,
            'store',
            \App\Http\Requests\annotableStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('annotable.store'));

        $response->assertRedirect(route('annotable.index'));
        $response->assertSessionHas('annotable.id', $annotable->id);

        $this->assertDatabaseHas(annotables, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $annotable = annotable::factory()->create();

        $response = $this->get(route('annotable.show', $annotable));

        $response->assertOk();
        $response->assertViewIs('annotable.show');
        $response->assertViewHas('annotable');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $annotable = annotable::factory()->create();

        $response = $this->get(route('annotable.edit', $annotable));

        $response->assertOk();
        $response->assertViewIs('annotable.edit');
        $response->assertViewHas('annotable');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\annotableController::class,
            'update',
            \App\Http\Requests\annotableUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $annotable = annotable::factory()->create();

        $response = $this->put(route('annotable.update', $annotable));

        $annotable->refresh();

        $response->assertRedirect(route('annotable.index'));
        $response->assertSessionHas('annotable.id', $annotable->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $annotable = annotable::factory()->create();
        $annotable = Annotable::factory()->create();

        $response = $this->delete(route('annotable.destroy', $annotable));

        $response->assertRedirect(route('annotable.index'));

        $this->assertModelMissing($annotable);
    }
}
