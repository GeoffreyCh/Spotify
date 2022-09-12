<div class="containerCreateArtiste">
    <button class="btn btnCreateArtiste">X</button>
    <div class="formArtiste">
        <form class="d-flex flex-column justify-content-center" method="POST" action="{{ route('artiste.store') }}">
            @csrf
                <label for="pseudo" class="form-label">Pseudo</label>
                <input class="form-control" name="pseudo">

                <div class="inputNom">
                    <div class="d-flex flex-column">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="prenom">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom">
                    </div>
                </div>

                <label for="nationalite" class="form-label">Nationalité</label>
                <input type="text" class="form-control" name="nationalite">

                <div class="inputDate">
                    <div class="d-flex flex-column">
                        <label for="date_naissance" class="form-label">Date de Naissance</label>
                        <input type="date" class="form-control" name="date_naissance">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="date_deces" class="form-label">Date de Décès</label>
                        <input type="date" class="form-control" name="date_deces">
                    </div>
                </div>

                <label for="photo" class="form-label">URL de photo</label>
                <input type="url" class="form-control" name="photo">

            <div class="button">
                <button type="submit" class="btn btn-dark">Ajouter</button>
            </div>
        </form>
    </div>
</div>


