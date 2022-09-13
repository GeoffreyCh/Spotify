<div class="containerAddInfoMusique">
    <button class="btn btnAddArtisteGroupe">X</button>
    <div class="formAddInfoMusique d-flex flex-column text-center">
        <h1>{{ $groupe->nom }}</h1>
        <form class="d-flex flex-column justify-content-center" method="POST"
            action="{{route('groupe.addArtiste', ['groupe'=>$groupe])}}"
        >
            @csrf
            <label for="artiste">Ajout du membre :</label>
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
