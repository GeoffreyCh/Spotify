<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Annotation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\annotationController
 */
class annotationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $annotations = annotation::factory()->count(3)->create();

        $response = $this->get(route('annotation.index'));

        $response->assertOk();
        $response->assertViewIs('annotation.index');
        $response->assertViewHas('annotations');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('annotation.create'));

        $response->assertOk();
        $response->assertViewIs('annotation.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\annotationController::class,
            'store',
            \App\Http\Requests\annotationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('annotation.store'));

        $response->assertRedirect(route('annotation.index'));
        $response->assertSessionHas('annotation.id', $annotation->id);

        $this->assertDatabaseHas(annotations, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $annotation = annotation::factory()->create();

        $response = $this->get(route('annotation.show', $annotation));

        $response->assertOk();
        $response->assertViewIs('annotation.show');
        $response->assertViewHas('annotation');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $annotation = annotation::factory()->create();

        $response = $this->get(route('annotation.edit', $annotation));

        $response->assertOk();
        $response->assertViewIs('annotation.edit');
        $response->assertViewHas('annotation');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\annotationController::class,
            'update',
            \App\Http\Requests\annotationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $annotation = annotation::factory()->create();

        $response = $this->put(route('annotation.update', $annotation));

        $annotation->refresh();

        $response->assertRedirect(route('annotation.index'));
        $response->assertSessionHas('annotation.id', $annotation->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $annotation = annotation::factory()->create();
        $annotation = Annotation::factory()->create();

        $response = $this->delete(route('annotation.destroy', $annotation));

        $response->assertRedirect(route('annotation.index'));

        $this->assertModelMissing($annotation);
    }
}
