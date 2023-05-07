<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Ongeza Mauzo</h1>

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
                    <td>Jina la Bidhaa: </td>
                    <td>
                        <input type="text" name="title" placeholder="Jina la Bidhaa">
                    </td>
                </tr>

                <tr>
                    <td>Maelezo: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Maelezo ya Bidhaa."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Bei ya Kuuzia: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Tarehe ya Mauzo: </td>
                    <td>
                        <input type="date" name="date">
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Ongeza Mauzo" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <?php

            //check if the button is clicked
            if(isset($_POST['submit']))
            {
                //Add food in db
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $date = $_POST['date'];

                //insert into db

                $sql2 = "INSERT INTO tbl_mauzo SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    date = DATE '$date'
                ";

                //query execution
                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Umefanikiwa Kuongeza Mauzo.</div>";
                    header('location:'.SITEURL.'admin/manage-mauzo.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Mauzo Yameshindikana Kuongezwa.</div>";
                    header('location:'.SITEURL.'admin/manage-mauzo.php');
                }

            }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>