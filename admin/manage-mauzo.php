<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Mauzo</h1>

        <br><br>
            <!-- Button to add Admin-->
            <a href="<?php echo SITEURL; ?>admin/add-mauzo.php" class="btn-primary">Ongeza Mauzo</a><br><br><br>

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
                    <th>Jina la Bidhaa</th>
                    <th>Bei</th>
                    <th>Tarehe</th>
                    <th>Hatua</th>
                </tr>

            <?php
                //create query to get all food
                $sql = "SELECT * FROM tbl_mauzo";

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
                        $title = $row['title'];
                        $price = $row['price'];
                        $date = $row['date'];
                        ?>

                            <tr>
                                <td><?php echo $sn++; ?> </td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $date; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-mauzo.php?id=<?php echo $id; ?>" class="btn-secondary">Sahihisha Mauzo</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-mauzo.php?id=<?php echo $id; ?>" class="btn-danger">Futa Mauzo</a>
                                </td>
                            </tr>

                        <?php
                    }

                }
                else
                {
                    echo"<tr><td colspan='7' class='error'> Hakuna Rekodi ya Mauzo. </td></tr>";
                }
            ?>
            </table>
    </div>
</div>
<?php include('partials/footer.php');?>