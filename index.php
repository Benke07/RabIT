<?php
//controller betöltése
include_once('Controller/controller.php');

//url felbontása
$url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = trim(explode('rabit/', $url)[1]);

//controller példányosítása és url részlet átadása neki, hogy megfelelő oldalakat töltsön be
$cont = new Controller();
$cont -> routing($url);

/*
.htaccess:

fallback: ha nincs olyan oldal, akkor alapból az indexet tölti be
1. rewrite: pl ha /users/1re megyünk, akkor igazából olyan, mintha '/index?uid=1'-ra mentünk volna
2. rewrite: pl ha /ads/1re megyünk, akkor igazából olyan, mintha '/index?aid=1'-ra mentünk volna
*/

?>