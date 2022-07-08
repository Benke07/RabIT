<?php

class Controller{

    //az alap oldalrészlet betöltése, ami minden oldalon ott van
    function mainPart($pName){
        include_once('View/indexView.php');
        $index = new index();
        $index->showPage($pName);
    }

    //oldaltól függően töltöm be az includeokat
    function includes($which){
        if($which == 1){
            $this->mainPart("Index");
        }

        //usereknél vagyunk
        elseif($which == 2){
            $this->mainPart("Users");

            include_once('Service/dbService.php');
            include_once('View/usersView.php'); 
        }

        //hirdetéseknél vagyunk
        elseif($which == 3){
            $this->mainPart("Ads");

            include_once('Service/dbService.php');
            include_once('View/adsView.php');
        }   
    }


    function routing($route){
        
        //az urlben benne van-e a 'users' szó
        if(strpos($route, "users") === 0){
            //uid paraméter lett e beállítva
            if(isset($_GET["uid"]) && is_numeric($_GET["uid"])){  
                $this->includes(2);

                //a paramétert átadjuk az adatbázisos modellnek, ahol a "where id = x" részhez az x helyére teszi a paraméterünket
                $db = new dbService();            
                $userView = new user();
                $user = $db->fetchSingleUser($_GET["uid"]);

                //ha van felhasználó azzal az ID-val, akkor megjelenítjük
                if($user){
                    $userView->showTable($user);
                } 
                 
            }   

            //ha nincs paraméter/nem szám, de az usersnél vagyunk
            else{
                $this->includes(2);

                $db = new dbService(); 
                $userView = new user();

                //az összes felhasználót lekérjük
                $users = $db->fetchUsers();            
                
                //ha van felhasználónk, akkor kilistázzuk
                if($users){
                    $userTable = $userView->showTable($users);
                }
            } 
        }

        //az urlben benne van-e a 'ads' szó
        elseif(strpos($route, "ads") === 0){
            //aid paraméter lett e beállítva
            if(isset($_GET["aid"]) && is_numeric($_GET["aid"])){            
                $this->includes(3);
                
                //a paramétert átadjuk az adatbázisos modellnek, ahol a "where id = x" részhez az x helyére teszi a paraméterünket
                $db = new dbService();
                $adView = new ad();
                $ad = $db ->fetchSingleAd($_GET["aid"]);

                //ha van hirdetés azzal az ID-val, akkor megjelenítjük
                if($ad){
                    $adView->showTable($ad);
                } 
                
            }

            //ha nincs paraméter/nem szám, de az adsnál vagyunk
            else{
                $this->includes(3);

                $db = new dbService();
                $adView = new ad();

                //az összes hirdetést lekérjük
                $ads = $db->fetchAds();

                //ha van hirdetés, akkor kilistázzuk
                if($ads){
                    $adsTable = $adView->showTable($ads);
                }
                
            }           

        }

        //ha nem is a hirdetéseknél és nem is a felhasználóknál vagyunk
        else{
            $this->includes(1);
        }
    }
}

?>