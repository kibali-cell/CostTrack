<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Ongeza Matumizi</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype = "multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Maelezo ya Matumizi: </td>
                    <td>
                        <input type="text" name="description" placeholder="Maelezo ya Matumizi">
                    </td>
                </tr>

                <tr>
                    <td>Kiasi Kilichotumika: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Tarehe ya Matumizi: </td>
                    <td>
                        <input type="date" name="date">
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Ongeza Matumizi" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <?php

            //check if the button is clicked
            if(isset($_POST['submit']))
            {
                //Add food in db
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $date = $_POST['date'];

                //insert into db

                $sql2 = "INSERT INTO tbl_matumizi SET
                    description = '$description',
                    price = $price,
                    date = DATE '$date'
                ";

                //query execution
                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Umefanikiwa Kuongeza Matumizi.</div>";
                    header('location:'.SITEURL.'admin/manage-matumizi.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Matumizi Yameshindikana Kuongezwa.</div>";
                    header('location:'.SITEURL.'admin/manage-matumizi.php');
                }

            }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>