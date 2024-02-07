<?php

    $config = [
        'host' => 'localhost',
        'user' => 'root',
        'password' => ''

    ];

    $mysqli = new mysqli(
        $config['host'],
        $config['user'],
        $config['password']
    );

    if($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS gestione_libreria";
    $mysqli->query($sql);

    $sql = "USE gestione_libreria";
    $mysqli->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS libri(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titolo VARCHAR(150) NOT NULL,
        autore VARCHAR(30) NOT NULL,
        anno_pubblicazione INT(4) NOT NULL,
        genere VARCHAR(30) NOT NULL
    )";
    $mysqli->query($sql);

    //$sql = "INSERT INTO libri(titolo, autore, anno_pubblicazione, genere) VALUES('Daniele e il superpisello galattico', 'D.V.M', 2000, 'Fantasy Religioso')";
    //$mysqli->query($sql);

    
?>