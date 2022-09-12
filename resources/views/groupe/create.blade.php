<div class="containerCreateGroupe">
    <button class="btn btnCreateGroupe">X</button>
    <div class="formGroupe">
        <form class="d-flex flex-column justify-content-center" method="POST" action="{{ route('groupe.store') }}">
            @csrf
                <label for="nom" class="form-label">Nom</label>
                <input class="form-control" name="nom">

                <label for="nationalite" class="form-label">Nationalité</label>
                <input type="text" class="form-control" name="nationalite">

                <div class="inputDate">
                    <div class="d-flex flex-column">
                        <label for="annee_creation" class="form-label">Année de création</label>
                        <input type="text" class="form-control" name="annee_creation">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="annee_destruction" class="form-label">Année de destruction</label>
                        <input type="text" class="form-control" name="annee_destruction">
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


