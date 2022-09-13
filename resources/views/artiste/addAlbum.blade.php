<div class="containerAddInfoArtiste">
    <button class="btn btnAddAlbumArtiste">X</button>
    <div class="formAddInfoArtiste d-flex flex-column text-center">
        <h1>{{ $artiste->pseudo }}</h1>
        <form class="d-flex flex-column justify-content-center" method="POST"
            action="{{route('artiste.addAlbum', ['artiste'=>$artiste])}}"
        >
            @csrf
            <label for="album">Interprète :</label>
            <br>
                <select name="album" class="form-control">
                    @foreach($allAlbums as $album)
                        <option value="{{ $album->id }}">{{$album->titre}}</option>
                    @endforeach
                </select>
            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>
