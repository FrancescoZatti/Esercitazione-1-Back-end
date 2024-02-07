<?php

require_once "config.php";


$book = [
    "titolo" => isset($_POST['titolo']) ? $_POST['titolo'] : '',
    "autore" => isset($_POST['autore']) ? $_POST['autore'] : '',
    "anno_pubblicazione" => isset($_POST['anno']) ? $_POST['anno'] : '',
    "genere" => isset($_POST['genere']) ? $_POST['genere'] : ''
];

function getAllBooks($mysqli)
{
    $libri = [];
    $sql = "SELECT * FROM libri;";
    $res = $mysqli->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $libri[] = $row;
        }
    }
    return $libri;
}

function AddLibri($mysqli, $book)
{
    $titolo = $book['titolo'];
    $autore = $book['autore'];
    $anno_pubblicazione = $book['anno_pubblicazione'];
    $genere = $book['genere'];

    $sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) 
                VALUES ('$titolo', '$autore', '$anno_pubblicazione', '$genere')";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->error);
    } else {
        echo 'Record aggiunto con successo!!!';
    }
    header('location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    AddLibri($mysqli, $book);
}

?>