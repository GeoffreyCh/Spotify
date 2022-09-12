<div class="containerCreateMusique">
    <button class="btn btnCreateMusique">X</button>
    <div class="formMusique">
        <form class="d-flex flex-column justify-content-center" method="POST" action="{{ route('musique.store') }}">
            @csrf
                <label for="titre" class="form-label">Titre</label>
                <input class="form-control" name="titre">

                <label for="duree" class="form-label">Durée</label>
                <input type="text" class="form-control" name="duree" placeholder="ex: 5.31">

                <div class="inputFile">
                    <div class="d-flex flex-column">
                        <label for="filepath" class="form-label">Filepath</label>
                        <input type="text" class="form-control" name="filepath">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="extension" class="form-label">Extension</label>
                        <input type="text" class="form-control" name="extension">
                    </div>
                </div>

            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>
