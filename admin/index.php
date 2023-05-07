
<?php
include('partials/menu.php');
?>

    <!--Main content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>
<br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    unset($_SESSION['login']);
                }
            ?>
<br><br>

            <a href="<?php echo SITEURL; ?>admin/manage-food.php">
                <div class="col-4 text-center">
                    <?php
                        $sql = "SELECT * FROM tbl_food";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                    ?>

                <h1><?php echo $count;?></h1>
                <h3>Stock</h3>
                <br> 
                <p>Ongeza Bidhaa au huduma mpya</p>
                </div>
            </a>

            <a href="<?php echo SITEURL; ?>admin/manage-category.php">
                <div class="col-4 text-center">

                    <?php
                            $sql2 = "SELECT * FROM tbl_category";
                            $res2 = mysqli_query($conn, $sql2);
                            $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2;?></h1>
                    <h3>Makundi ya Bidhaa</h3>
                    <p>Angalia, Ongeza au Punguza Makundi ya Bidhaa.</p>
                </div>
            
            </a>


            <a href="<?php echo SITEURL; ?>admin/manage-mauzo.php">
            <div class="col-4 text-center">
            <?php
                        $sql3 = "SELECT * FROM tbl_mauzo";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3;?></h1>
                <h3>Mauzo</h3>
                    <br> 
                    <p>Angalia, Ongeza au Punguza Mauzo.</p>
            </div>
            </a>

            <a href="<?php echo SITEURL; ?>admin/manage-matumizi.php">
            <div class="col-4 text-center">
            <?php
                        $sql3 = "SELECT * FROM tbl_matumizi";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3;?></h1>
                <h3>Matumizi</h3>
                    <br> 
                    <p>Angalia, Ongeza au Punguza Matumizi.</p>
            </div>
            </a>

            <a href="<?php echo SITEURL; ?>admin/manage-madeni.php">

            <div class="col-4 text-center">
            <?php
                        $sql3 = "SELECT * FROM tbl_madeni";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3;?></h1>
                <h3>Madeni</h3>
                    <br> 
                    <p>Angalia Mauzo na Wateja unaowadai</p>
            </div>
            </a>

            <div class="col-4 text-center">
                <?php
                    $sql4 = "SELECT SUM(price) AS Total FROM tbl_mauzo";
                    $res4 = mysqli_query($conn,$sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    $total_revenue1 = $row4['Total'];

                    $sql4 = "SELECT SUM(price) AS Total FROM tbl_matumizi";
                    $res4 = mysqli_query($conn,$sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    $total_revenue2 = $row4['Total'];

                    $grand_total = $total_revenue1 - $total_revenue2;

                ?>
                <h1><?php echo $grand_total; ?>/=</h1>
                <br>
                Revenue Generated
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
    <!--Main content Section Ends -->

    <?php include("partials/footer.php");?>