<!DOCTYPE html>
<html>

<head>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <style>
    .navbar .navbar-category .nav-link.active {
      font-weight: bold;
      /* Customize the style for the active tab */
      color: #007bff;
      /* Customize the color for the active tab */
    }
  </style>
</head>

<body>
  <?php
  // Define the current page (you may adjust this based on your URL structure)
  $currentPage = basename($_SERVER['PHP_SELF']);

  // Initialize $currentCategory as null
  $currentCategory = null;

  if (isset($_GET['catid'])) {
    // Define the current category based on the URL parameter 'catid'
    $currentCategory = $_GET['catid'];
  }
  ?>

  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="navbar-left">
        <span id="datetime" class="nav-link text-center"></span>
      </div>
      <div class "navbar-center">
        <a class="navbar-brand" href="index.php">
          <img src="images/logo.png" height="80" width="152">
        </a>
      </div>
      <div class="navbar-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="text" name="searchtitle" placeholder="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go</button>
          </form>
        </div>
      </div>
    </div>
  </nav>
  <?php
  include('includes/head.php');

  ?>

</body>

</html>