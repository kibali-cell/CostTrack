<?php
    include('../config/constants.php');

    if(isset($_GET['id']))
    {
        //process to delete
        //get ID and image name
        $id = $_GET['id'];

        //delete food from db
        $sql = "DELETE FROM tbl_matumizi WHERE id= $id";
        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            //food deleted
            $_SESSION['delete'] = "<div class='success'>Umefanikiwa Kufuta Matumizi.</div>";
            header('location:'.SITEURL.'admin/manage-matumizi.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Imeshindikana Kufuta Matumizi.</div>";
            header('location:'.SITEURL.'admin/manage-matumizi.php');
        }
    }
    else
    {
        //Redirect to manage food page
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-matumizi.php');
    }

?>