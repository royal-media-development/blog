<?php
include "functions.php";

if($session->isUserLoggedIn()) {
    $postId = $_GET["id"];
    $userId = $session->getUserSession();

    $connection = new Connection();
    $result = $connection->getSelectFrom("SELECT * FROM like WHERE user_id = '$userId' AND post_id = '$postId'");

    $result = $result[0];
    count($result["id"]);
}

/**
 * 1.)
 * Diese Funktion soll mithilfe von Ajax ausgeführt werden.
 * http://api.jquery.com/jquery.ajax/
 *
 * 2.)
 *
 * Prüfen ob der Benutzer angemeldet ist, denn nur ein Angemeldeter Benutzer darf Liken / Diskliken
 *
 * 3.)
 *
 * Prüfen ob der Benutzer zuvor dieses Bild gelikt hat, wenn dies zutrifft muss der Datensatz in der Datentabelle
 * geupdatet werden, ansonten muss ein neuer Datensatz angelegt werden.
 * Dafür die Connection Klasse verwenden
 *
 * 4.)
 * Rückgabe -> true oder false das Like oder Dislike funktioniert hat
 *
 */