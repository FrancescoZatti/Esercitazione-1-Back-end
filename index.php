<?php
require_once 'config.php';
require_once 'gestione.php';

$libri = getAllBooks($mysqli);

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBooks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/img/mybookslogo.png" alt="Logo" width="auto" height="40"
                    class="d-inline-block align-text-top">
                MyBooks
            </a>
        </div>
    </nav>

    <button type="button" class="addBook mt-4 d-flex mx-auto px-4 py-2 rounded-5 text-white text-decoration-none border-0" data-bs-toggle="modal"
        data-bs-target="#modaleAggiunta">
        Aggiungi un libro
    </button>

    <div class="table container mt-4">
        <div class="row d-flex justify-content-evenly align-items-center">
            <?php foreach ($libri as $key => $libro) { ?>
                <div class="myBook text-center container col-3 mx-2 mb-4 pb-3 rounded-5">
                    <img
                    src="assets/img/mybookslogoapp.png"
                    class="copertinaLibro w-100"
                    srcset="assets/img/mybookslogoapp.png ?>"
                    alt="Copertina Libro"
                    style="background-color: transparent">
                    <span
                    scope="row"
                    class="d-none"
                    style="background-color: transparent">
                        <?= $libro['id'] ?>
                    </span>
                    <span
                    class="fs-5 fw-semibold text-white"
                    style="background-color: transparent">
                        <?= $libro['titolo'] ?>
                    </span>
                    <div
                    class="divBook d-flex justify-content-evenly my-3 rounded-5 align-items-center text-light"
                    style="background-color: #65008675;">
                        <span
                        class="fs-6 border-end border-white pe-5"
                        style="background-color: transparent">
                            <?= $libro['autore'] ?>
                        </span>
                        <span
                        class="fs-6 fw-lighter"
                        style="background-color: transparent">
                            <?= $libro['anno_pubblicazione'] ?>
                        </span>
                    </div>
                    <div
                    class="py-3"
                    style="background: transparent;
                            border-top: solid 1px #e28bff9c;
                            border-radius: 0 0 1rem 1rem;"
                    >
                        <span
                        class="fs-6"
                        style="background-color: transparent;
                        color: #e28bff">
                            <?= $libro['genere'] ?>
                        </span>
                    </div>
                    
                    <div class="mt-3" style="background-color: transparent">
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a role="button" class="btnModifica px-4 py-2 rounded-5 text-white text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#modaleUpdate_<?= $libro['id'] ?>"><i class="bi bi-pencil-square me-1"></i>
                                Modifica
                            </a>
                            <a role="button" class="btnElimina px-3 py-2 rounded-5 text-white text-decoration-none"
                                href="gestione.php?action=remove&id=<?= $libro['id'] ?>"><i class="bi bi-x-lg"></i>
                            Elimina</a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modaleUpdate_<?= $libro['id'] ?>" tabindex="-1"
                    aria-labelledby="modaleUpdate<?= $libro['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Modifica i dati</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="gestione.php">
                                    <input type="hidden" name="id" value="<?= $libro['id'] ?>">
                                    <div class="mb-3">
                                        <label for="titoloLibroUp" class="form-label">Titolo</label>
                                        <input type="text" class="form-control" id="titoloLibroUp"
                                            aria-describedby="titoloLibroUp" name="titoloUp"
                                            value="<?= $libro['titolo'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="autoreLibroUp" class="form-label">Autore</label>
                                        <input type="text" class="form-control" id="autoreLibroUp" name="autoreUp"
                                            value="<?= $libro['autore'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="annoLibroUp" class="form-label">Anno di pubblicazione</label>
                                        <input type="number" step="1" min="1" max="2024" class="form-control"
                                            id="annoLibroUp" name="annoUp" value="<?= $libro['anno_pubblicazione'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="genereLibroUp" class="form-label">Genere</label>
                                        <input type="text" class="form-control" id="genereLibroUp" name="genereUp"
                                            value="<?= $libro['genere'] ?>">
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Chiudi</button>
                                        <button type="submit" class="btn btn-primary" name="action" value="update">Aggiorna
                                            libro</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </d>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>

</html>
<div class="modal fade" id="modaleAggiunta" tabindex="-1" aria-labelledby="modaleAggiunta" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Dati del libro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="gestione.php">
                    <div class="mb-3">
                        <label for="titoloLibro" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="titoloLibro" aria-describedby="titoloLibro"
                            name="titolo">
                    </div>
                    <div class="mb-3">
                        <label for="autoreLibro" class="form-label">Autore</label>
                        <input type="text" class="form-control" id="autoreLibro" name="autore">
                    </div>
                    <div class="mb-3">
                        <label for="annoLibro" class="form-label">Anno di pubblicazione</label>
                        <input type="number" step="1" min="1" max="2024" class="form-control" id="annoLibro"
                            name="anno">
                    </div>
                    <div class="mb-3">
                        <label for="genereLibro" class="form-label">Genere</label>
                        <input type="text" class="form-control" id="genereLibro" name="genere">
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        <button type="submit" class="btn btn-primary" name="action" value="add">Aggiungi il
                            libro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>