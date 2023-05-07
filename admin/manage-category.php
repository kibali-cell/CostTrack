<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Makundi Ya Bidhaa</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        ?>
        <br><br>

            <!-- Button to add Admin-->
            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Ongeza Kundi</a><br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S/No.</th>
                    <th>Jina</th>
                    <th>Picha</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //query for getting all categories
                    $sql = "SELECT * FROM tbl_category";

                    //query execution
                    $res = mysqli_query($conn, $sql);

                    //count Rows
                    $count = mysqli_num_rows($res);

                    //create serial num variable
                    $sn = 1;

                    //check if we have data in db
                    if($count>0)
                    {
                        //get data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>

                                <tr>
                                    <td><?php echo $sn++?> </td>
                                    <td><?php echo $title;?></td>

                                    <td>
                                        <?php 
                                            //check if image is available

                                            if($image_name!="")
                                            {
                                                ?>

                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                                                
                                                <?php
                                            } 
                                            else
                                            {
                                                echo"<div class='error'>Image not Added.</div>";
                                            }
                                        ?>
                                    </td>

                                    <td><?php echo $featured;?></td>
                                    <td><?php echo $active;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Sahihisha</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Futa Kundi la Bidhaa</a>
                                    </td>
                                </tr>

                            <?php
                        }
                    }
                    else
                    {
                        ?>

                        <tr>
                            <td colspan="6" class="error">Hakuna Kundi Lililoongezwa.</td>
                        </tr>
                        
                        <?php
                    }

                ?>

              
            </table>
    </div>
</div>
<?php include('partials/footer.php');?>