<?php


/**
 * Diese Datei in jedes Php Dokument einbinden
 */
/**
 * GLOBALE VARS
 */
include "config.php";

/**
 * HEADER
 */
include "header.php";

/**
 * FOOTER
 */
include "footer.php";

/**
 * CLASSES
 */
include "autoload.php";

/**
 * @global $session Session
 */
$session = new Session();

/**
 * FUNCTIONS
 */

function setRedirect($url)
{
    header('Location: ' . $url);
}