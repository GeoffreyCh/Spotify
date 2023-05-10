<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Album;

class AlbumTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_album_can_be_stored_to_the_database()
    {


        $response = $this->post('album', [
            'titre' => 'titre',
            'annee' => 'annee',
            'photo' => 'photo'
        ]);

        $response->assertRedirect(route('album.index'));

        $this->assertCount(1, Album::all());
    }

    public function test_album_cannot_be_null()
    {
        $response = $this->post('album', [
            'titre' => '',
            'annee' => ''
        ]);

        $response->assertSessionHasErrors(['titre', 'annee']);
    }

    public function test_an_album_can_be_updated()
    {
        // $this->withoutExceptionHandling();

        $album = Album::first();

        $response = $this->put('album/' . $album->id, [
            'titre' => 'azer',
            'annee' => 'ezart',
            'photo' => 'zaehye'
        ]);

        $this->assertEquals('azer', Album::last()->titre);
        $this->assertEquals('ezart', Album::last()->annee);
        $this->assertEquals('zaehye', Album::last()->photo);

        $response->assertRedirect(route('album.index'));
    }


    public function test_an_album_can_be_destroyed()
    {
        $this->post('album', [
            'titre' => 'titre',
            'annee' => 'annee',
            'photo' => 'photo'
        ]);

        $album = Album::first();

        $this->delete('album/'. $album->id);

        $this->assertCount(1, Album::all());
    }
}
