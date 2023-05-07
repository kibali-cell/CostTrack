<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Matumizi</h1>

        <br><br>
            <!-- Button to add Admin-->
            <a href="<?php echo SITEURL; ?>admin/add-matumizi.php" class="btn-primary">Ongeza Matumizi</a><br><br><br>

            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['unauthorized']))
            {
                echo $_SESSION['unauthorized'];
                unset($_SESSION['unauthorized']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            ?>

            <table class="tbl-full">
                <tr>
                    <th>S/No.</th>
                    <th>Maelezo</th>
                    <th>Bei</th>
                    <th>Tarehe</th>
                    <th>Hatua</th>
                </tr>

            <?php
                //create query to get all food
                $sql = "SELECT * FROM tbl_matumizi";

                //query execution
                $res=mysqli_query($conn, $sql);

                //count Rows
                $count = mysqli_num_rows($res);

                $sn=1;

                if ($count > 0)
                {
                    //we have food
                    //get food from db
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $date = $row['date'];
                        ?>

                            <tr>
                                <td><?php echo $sn++; ?> </td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $date; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-matumizi.php?id=<?php echo $id; ?>" class="btn-secondary">Sahihisha Matumizi</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-matumizi.php?id=<?php echo $id; ?>" class="btn-danger">Futa Matumizi</a>
                                </td>
                            </tr>

                        <?php
                    }

                }
                else
                {
                    echo"<tr><td colspan='7' class='error'> Matumizi Bado Hayajaongezwa! </td></tr>";
                }
            ?>
            </table>
    </div>
</div>
<?php include('partials/footer.php');?>