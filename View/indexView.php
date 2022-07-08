<?php

class index{

    function showPage($pName){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Próbafeladat Benke</title>
            <link rel="stylesheet" href="/rabit/style.css" type="text/css">
        </head>
        <body>
            <h1>'. $pName .'</h1>
            <div>
                <button onclick="window.location.href=\'/rabit/users\'" >Users</button>
                <button onclick="window.location.href=\'/rabit/ads\'">Ads</button>
            </div>        
        ';
    }


}




?>