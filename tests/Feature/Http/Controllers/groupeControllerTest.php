<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\groupeController
 */
class groupeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $groupes = groupe::factory()->count(3)->create();

        $response = $this->get(route('groupe.index'));

        $response->assertOk();
        $response->assertViewIs('groupe.index');
        $response->assertViewHas('groupes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('groupe.create'));

        $response->assertOk();
        $response->assertViewIs('groupe.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\groupeController::class,
            'store',
            \App\Http\Requests\groupeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('groupe.store'));

        $response->assertRedirect(route('groupe.index'));
        $response->assertSessionHas('groupe.id', $groupe->id);

        $this->assertDatabaseHas(groupes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $groupe = groupe::factory()->create();

        $response = $this->get(route('groupe.show', $groupe));

        $response->assertOk();
        $response->assertViewIs('groupe.show');
        $response->assertViewHas('groupe');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $groupe = groupe::factory()->create();

        $response = $this->get(route('groupe.edit', $groupe));

        $response->assertOk();
        $response->assertViewIs('groupe.edit');
        $response->assertViewHas('groupe');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\groupeController::class,
            'update',
            \App\Http\Requests\groupeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $groupe = groupe::factory()->create();

        $response = $this->put(route('groupe.update', $groupe));

        $groupe->refresh();

        $response->assertRedirect(route('groupe.index'));
        $response->assertSessionHas('groupe.id', $groupe->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $groupe = groupe::factory()->create();
        $groupe = Groupe::factory()->create();

        $response = $this->delete(route('groupe.destroy', $groupe));

        $response->assertRedirect(route('groupe.index'));

        $this->assertModelMissing($groupe);
    }
}
