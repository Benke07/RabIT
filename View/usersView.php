<?php

class user{

    function showTable($users){
        echo '
            <table>
                <tr>
                <th>User ID</th>
                <th>User</th>
            </tr>';
            while($row = $users->fetch_assoc()) {
                echo '
                <tr>
                    <td>'. $row["id"] .'</td>
                    <td>'. $row["name"] .'</td>
                </tr> ';
            }
        echo'</table>
        </body>';
    }
}


?>