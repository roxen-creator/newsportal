<?php
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>News Portal | Contact us</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">






</head>

<body>



  <!-- Page Content -->
  <div class="container">

    <?php
    $pagetype = 'contactus';
    $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
    while ($row = mysqli_fetch_array($query)) {

      ?>
      <h1 class="mt-4 mb-3">
        <?php echo htmlentities($row['PageTitle']) ?>

      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Intro Content -->
      <div class="row">

        <div class="col-lg-12">

          <p>
            <?php echo $row['Description']; ?>
          </p>
        </div>
      </div>
      <!-- /.row -->
    <?php } ?>

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>