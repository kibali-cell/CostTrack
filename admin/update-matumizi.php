<?php include('partials/menu.php') ?>

<?php
    //check id is set
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM tbl_matumizi WHERE id=$id";

        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);


        $description = $row2['description'];
        $price = $row2['price'];
        $date = $row2['date'];
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-matumizi.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Sahihisha Matumizi</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                <tr>
                    <td>Maelezo ya Matumizi: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"> <?php echo $description;?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Bei: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price;?>">
                    </td>
                </tr>

                <tr>
                    <td>Tarehe: </td>
                    <td>
                        <input type="date" name="date" value="<?php echo $date;?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Sahihisha" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                //get detraile from form

                //upload image when selected
                $id = $_POST['id'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $date = $_POST['date'];

                //remove image when new image is uploaded

                //update food in db
                $sql3 = "UPDATE tbl_matumizi SET 
                    description = '$description',
                    price = '$price',
                    date = DATE '$date'
                    WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);
                if($res3 == true)
                {
                    $_SESSION['update'] = "<div class='success'>Umefanikiwa Kusahihisha Matumizi.</div>";
                    header('location:'.SITEURL.'admin/manage-matumizi.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Imeshindikana kusahihisha Matumizi.</div>";
                    header('location:'.SITEURL.'admin/manage-matumizi.php');
                }



                //redirect to manage food with session method
            }

        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>