<?php
    function db_query($query) {
        global $db;
        return mysqli_query($db, $query);
    }
    
    

?>