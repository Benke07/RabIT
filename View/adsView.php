<?php

class ad{

    function showTable($ads){
        echo '
            <table>
                <tr>
                <th>Ads ID</th>
                <th>User</th>
                <th>Advertisement Title</th>
            </tr>';
            while($row = $ads->fetch_assoc()) {
                echo '
                <tr>
                    <td>'. $row["id"] .'</td>
                    <td>'. $row["name"] .'</td>
                    <td>'. $row["title"] .'</td>
                </tr> ';
            }
        echo'</table>
        </body>';
    }
}


?>