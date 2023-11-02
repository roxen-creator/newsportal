<!DOCTYPE html>
<html>

<head>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="navbar-category" style="padding-top: 55px;">
          <div class="navbar-category-list d-flex justify-content-center flex-wrap collapse navbar-collapse"
            id="navbarNavCategory">
            <style>
              .nav-link {
                border: 1px solid #ccc;
                /* Add a subtle border to the nav-links */
                border-radius: 5px;
                /* Add rounded corners for a cleaner look */
                padding: 5px 10px;
                /* Adjust padding for spacing */
                margin-right: 15px;
                margin-bottom: 10px;
              }
            </style>
            <a href="index.php" class="nav-link <?php if ($currentPage === 'index.php')
              echo 'active'; ?>"> Home </a>

            <?php
            $query = mysqli_query($con, "select id, CategoryName from tblcategory");
            while ($row = mysqli_fetch_array($query)) {
              $categoryId = $row['id'];
              $categoryName = htmlentities($row['CategoryName']);
              $activeClass = ($currentCategory === $categoryId) ? 'active' : '';
              echo '<a href="category.php?catid=' . $categoryId . '" class="nav-link ' . $activeClass . '">' . $categoryName . '</a>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


<script>
  function updateDateTime() {
    const datetimeElement = document.getElementById("datetime");
    const currentDate = new Date();


    const options = {
      weekday: 'long', // 'short', 'narrow' can also be used
      year: 'numeric',
      month: 'long',
      day: 'numeric',
    };

    const formattedDate = currentDate.toLocaleDateString(undefined, options);
    const formattedTime = currentDate.toLocaleTimeString();
    const dateTimeString = `${formattedDate} - ${formattedTime}`;
    datetimeElement.textContent = dateTimeString;
  }

  updateDateTime();
  setInterval(updateDateTime, 1000);

</script>