<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Madeni</h1>

        <br><br>
            <!-- Button to add Admin-->
            <a href="<?php echo SITEURL; ?>admin/add-deni.php" class="btn-primary">Rekodi Deni</a><br><br><br>

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
                    <th>Jina la Mdaiwa</th>
                    <th>Maelezo ya Deni</th>
                    <th>Kiasi Anachodaiwa</th>
                    <th>Tarehe</th>
                    <th>Actions</th>
                </tr>

            <?php
                //create query to get all food
                $sql = "SELECT * FROM tbl_madeni";

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
                        $description = $row['description'];
                        $price = $row['price'];
                        $date = $row['date'];
                        ?>

                            <tr>
                                <td><?php echo $sn++; ?> </td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $date; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-madeni.php?id=<?php echo $id; ?>" class="btn-secondary">Sahihisha Deni</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-madeni.php?id=<?php echo $id; ?>" class="btn-danger">Futa Deni</a>
                                </td>
                            </tr>

                        <?php
                    }

                }
                else
                {
                    echo"<tr><td colspan='7' class='error'> Hakuna Deni Lolote. </td></tr>";
                }
            ?>
            </table>
    </div>
</div>
<?php include('partials/footer.php');?>