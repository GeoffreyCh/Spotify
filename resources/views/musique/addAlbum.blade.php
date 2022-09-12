<div class="containerAddInfoMusique">
    <button class="btn btnAddAlbum">X</button>
    <div class="formAddInfoMusique d-flex flex-column text-center">
        <h1>{{ $musique->titre }}</h1>
        <form class="d-flex flex-column justify-content-center" method="POST"
            action="{{route('addAlbum', ['musique'=>$musique])}}"
        >
            @csrf
            <label for="album">Appartient à l'album :</label>
            <br>
                <select name="album" class="form-control">
                    @foreach($albums as $album)
                        <option value="{{ $album->id }}">{{$album->titre}}</option>
                    @endforeach
                </select>

                {{-- <select name="artiste" class="form-control">
                    @foreach($artistes as $artiste)
                        <option value="{{ $artiste->id }}">{{$artiste->pseudo}}</option>
                    @endforeach
                </select>
                OU
                <select name="groupe" class="form-control">
                    @foreach($groupes as $groupe)
                        <option value="{{ $groupe->id }}">{{$groupe->nom}}</option>
                    @endforeach
                </select> --}}

            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>
