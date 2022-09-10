<div class="containerCreateArtiste">
    <button class="btn btnCreateArtiste">X</button>
    <div class="formArtiste">
        <form class="d-flex flex-column justify-content-center" method="POST" action="{{ route('album.store') }}">
            @csrf
                <label for="nom" class="form-label">Nom</label>
                <input class="form-control" name="nom">

                <label for="direction" class="form-label">Direction</label>
                <input type="text" class="form-control" name="direction">

                <label for="siren" class="form-label">Siren</label>
                <input type="text" class="form-control" name="siren">

                <label for="photo" class="form-label">URL de photo</label>
                <input type="url" class="form-control" name="photo">

                <label for="degre_mechancete" class="form-label">Degré de Méchanceté</label>
                <input type="text" class="form-control" name="degre_mechancete">

                <label for="note_popularite" class="form-label">Note de popularité</label>
                <input type="text" class="form-control" name="note_popularite">

                <label for="note_popularite" class="form-label">Note de popularité</label>
                <input type="text" class="form-control" name="note_popularite">
            <button type="submit" class="btn btn-dark">Ajouter</button>
        </form>
    </div>
</div>


