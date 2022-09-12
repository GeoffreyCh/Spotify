<div class="containerCreateAlbum">
    <button class="btn btnCreateAlbum">X</button>
    <div class="formAlbum">
        <form class="d-flex flex-column justify-content-center" method="POST" action="{{ route('album.store') }}">
            @csrf
                <label for="titre" class="form-label">Titre</label>
                <input class="form-control" name="titre">

                <label for="annee" class="form-label">Année de Sortie</label>
                <input type="text" class="form-control" name="annee">

                <label for="photo" class="form-label">URL de photo</label>
                <input type="url" class="form-control" name="photo">

            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>

