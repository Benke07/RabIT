<?php

class dbService{
   
    
    //kapcsolodás az adatbázishoz
    function connect(){
        include_once('./Model/dbModel.php');
        $dbInfo = DB::DBLOGIN;

        $mysqli = new mysqli($dbInfo[0], $dbInfo[1], $dbInfo[2], $dbInfo[3]);

        if ($mysqli -> connect_errno) {
            echo "Error " . $conn -> connect_error;
            exit();
        }

        return $mysqli;
    }

    //az összes felhasználó megszerzése
    function fetchUsers(){
        $conn = $this->connect();

        $query = "SELECT * FROM users";        
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            return $result;
        }
    }

    //egyetlen egy felhasználó kiválasztása
    function fetchSingleUser($id){
        $conn = $this->connect();
        $query = "SELECT * FROM users WHERE id = ". $id ." ";        
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            return $result;
        }

    }
    
    //az összes hirdetés megszerzése, user id és ads id összekapcsolva,     
    //hogy megszerezzük a felhasználó nevét, aki készítette a hirdetést
    function fetchAds(){
        $conn = $this->connect();
        $query = 
        "   SELECT 	advertisements.id,
	                users.name,
	                advertisements.title       
            FROM advertisements
            LEFT JOIN users 
            ON users.id = advertisements.userid"; 

        $result = $conn->query($query);

        if($result->num_rows > 0){
            return $result;
        }

    }

    //hasonlóan az elözőhöz, csak itt egyetlen egy hirdetést kapunk vissza
    function fetchSingleAd($id){
        $conn = $this->connect();
        $query = 
        "   SELECT 	advertisements.id,
	                users.name,
	                advertisements.title       
            FROM advertisements
            LEFT JOIN users 
            ON users.id = advertisements.userid
            WHERE advertisements.id = ". $id ." ";
                  
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            return $result;
        }

    }


}


?>