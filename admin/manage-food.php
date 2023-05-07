<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Bidhaa</h1>

        <br><br>
            <!-- Button to add Admin-->
            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Ongeza Bidhaa</a><br><br><br>

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
                    <th>Jina</th>
                    <th>Bei ya Kuuza</th>
                    <th>Picha</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

            <?php
                //create query to get all food
                $sql = "SELECT * FROM tbl_food";

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
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>

                            <tr>
                                <td><?php echo $sn++; ?> </td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $price; ?></td>
                                <td>
                                    <?php 
                                        if($image_name!="")
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px" alt="Food Image">
                                            <?php
                                           
                                        }
                                        else
                                        {
                                           
                                            echo "<div class='error'>Image not Added.<div/>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Sahihisha</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Futa Bidhaa</a>
                                </td>
                            </tr>

                        <?php
                    }

                }
                else
                {
                    echo"<tr><td colspan='7' class='error'> Hakuna Bidhaa! </td></tr>";
                }
            ?>
            </table>
    </div>
</div>
<?php include('partials/footer.php');?>