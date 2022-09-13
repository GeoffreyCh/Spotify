<div class="containerAddInfoMusique">
    <button class="btn btnAddArtisteAlbum">X</button>
    <div class="formAddInfoMusique d-flex flex-column text-center">
        <h1>{{ $album->titre }}</h1>
        <form class="d-flex flex-column justify-content-center" method="POST"
            action="{{route('album.addArtiste', ['album'=>$album])}}"
        >
            @csrf
            <label for="artiste">Interprété par :</label>
            <br>
                <select name="artiste" class="form-control">
                    @foreach($allArtistes as $artiste)
                        <option value="{{ $artiste->id }}">{{$artiste->pseudo}}</option>
                    @endforeach
                </select>

            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>
