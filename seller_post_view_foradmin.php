<?php include_once 'header.php'; 
include_once 'filter_option.php';
if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
  ?>

<!--navbar-->

<div class="container ms-0">
            <div class="row">
            <div class="col-1">
            <?php
include_once 'side_navbar.php';
?>   

</div>

<div class="col ms-5 ">
<?php
$query = mysqli_query(
        $mysqli_connection,
        "SELECT * FROM item where user_id='".$_GET['user_id']."'");
        $RowCount = mysqli_num_rows($query);

          if ($RowCount == 0) {?>
          <div class="row row-cols-1" >
          <h4 class="text-danger">🔍 No posts to show!</h4>
         </div> 
         <?php } else {?>
      
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4" id="productcard" >

<?php

         for ($i = 0; $i < $RowCount; ++$i) {
             $row = mysqli_fetch_array($query); ?>
  <div class="col">

  <?php include 'product_card_for_dashboard.php'; ?>
                </div> 
<?php
         }?>
</div>
<?php
        }?>
  </div>
  
  </div>
</div>

<?php
include_once 'footer.php'; } else
echo '<script type="text/javascript"> window.location="main.php";</script>';
?>