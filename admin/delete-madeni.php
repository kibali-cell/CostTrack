<?php
    include('../config/constants.php');

    if(isset($_GET['id']))
    {
        //process to delete
        //get ID and image name
        $id = $_GET['id'];

        //delete food from db
        $sql = "DELETE FROM tbl_madeni WHERE id= $id";
        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            //food deleted
            $_SESSION['delete'] = "<div class='success'>Umefanikiwa Kufuta Deni.</div>";
            header('location:'.SITEURL.'admin/manage-madeni.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Imeshindikana Kufuta Deni.</div>";
            header('location:'.SITEURL.'admin/manage-madeni.php');
        }
    }
    else
    {
        //Redirect to manage food page
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-mauzo.php');
    }

?>