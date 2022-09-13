<div class="containerAddInfoMusique">
    <button class="btn btnAddAlbumGroupe">X</button>
    <div class="formAddInfoMusique d-flex flex-column text-center">
        <h1>{{ $groupe->nom }}</h1>
        <form class="d-flex flex-column justify-content-center" method="POST"
            action="{{route('groupe.addAlbum', ['groupe'=>$groupe])}}"
        >
            @csrf
            <label for="album">Interprère :</label>
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
