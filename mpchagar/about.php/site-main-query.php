<?php
    include "include/db-config.php";
    // include "include/functions.php";
    $sql_seo = mysqli_query($db, "SELECT * FROM tbl_seo WHERE 1");
    if(mysqli_num_rows($sql_seo) > 0){
      $compseo = mysqli_fetch_array($sql_seo);
    }
    
    $sql_general = mysqli_query($db, "SELECT * FROM tbl_general WHERE 1");
    if(mysqli_num_rows($sql_general) > 0){
      $general = mysqli_fetch_array($sql_general);
    }
    
    $sql_sitedown = mysqli_query($db, "SELECT * FROM tbl_sitedown WHERE 1");
    if(mysqli_num_rows($sql_sitedown) > 0){
      $compsitedown = mysqli_fetch_array($sql_sitedown);
    }
    // $sql_comp_detail=db_query("select * from tbl_general where 1");
    // if(mysqli_num_rows($sql_comp_detail)>0){
    //   $compDATA=mysqli_fetch_array($sql_comp_detail);
    // }

?>