<div class="containerAddInfoArtiste">
    <button class="btn btnAddGroupe">X</button>
    <div class="formAddInfoArtiste d-flex flex-column text-center">
        <h1>{{ $artiste->pseudo }}</h1>
        <form class="d-flex flex-column justify-content-center" method="POST"
            action="{{route('artiste.addGroupe', ['artiste'=>$artiste])}}"
        >
            @csrf
            <label for="groupe">Appartient à :</label>
            <br>
                <select name="groupe" class="form-control">
                    @foreach($allGroupes as $groupe)
                        <option value="{{ $groupe->id }}">{{$groupe->nom}}</option>
                    @endforeach
                </select>
            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>
