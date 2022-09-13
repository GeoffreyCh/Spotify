<div class="containerAddInfoMusique">
    <button class="btn btnAddMusiqueAlbum">X</button>
    <div class="formAddInfoMusique d-flex flex-column text-center">
        <h1>{{ $album->titre }}</h1>
        <form class="d-flex flex-column justify-content-center" method="POST"
            action="{{route('album.addMusique', ['album'=>$album])}}"
        >
            @csrf
            <label for="musique">Est composé de :</label>
            <br>
                <select name="musique" class="form-control">
                    @foreach($allMusiques as $musique)
                        <option value="{{ $musique->id }}">{{$musique->titre}}</option>
                    @endforeach
                </select>

            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>
