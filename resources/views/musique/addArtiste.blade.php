<div class="containerAddInfoMusique">
    <button class="btn btnAddArtiste">X</button>
    <div class="formAddInfoMusique d-flex flex-column text-center">
        <h1>{{ $musique->titre }}</h1>
        <form class="d-flex flex-column justify-content-center" method="POST"
            action="{{route('musique.addArtiste', ['musique'=>$musique])}}"
        >
            @csrf
            <label for="artiste">Interpréter par :</label>
            <br>
                <select name="artiste" class="form-control">
                    <option value="">--Artiste--</option>
                    @foreach($artistes as $artiste)
                        <option value="artist-{{ $artiste->id }}">{{$artiste->pseudo}}</option>
                    @endforeach
                    <option value="">--Groupe--</option>
                    @foreach($groupes as $groupe)
                        <option value="group-{{ $groupe->id }}">{{$groupe->nom}}</option>
                    @endforeach
                </select>

            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>
