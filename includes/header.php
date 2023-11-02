<!DOCTYPE html>
<html>

<head>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="navbar-left">
        <span id="datetime" class="nav-link text-center"></span>
      </div>
      <div class="navbar-center">
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
            <a href="index.php" class="nav-link" style="margin-right: 15px; margin-bottom: 10px;"> Home </a>

            <?php
            $query = mysqli_query($con, "select id, CategoryName from tblcategory");
            while ($row = mysqli_fetch_array($query)) {
              ?>
              <a href="category.php?catid=<?php echo htmlentities($row['id']); ?>" class="nav-link"
                style="margin-right: 15px; margin-bottom: 10px;">
                <?php echo htmlentities($row['CategoryName']); ?>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Bootstrap JavaScript and jQuery libraries -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<script>
  function updateDateTime() {
    const datetimeElement = document.getElementById("datetime");
    const currentDate = new Date();

    // Get the options to format the date
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

  // Update the date and time every second
  setInterval(updateDateTime, 1000);
</script>