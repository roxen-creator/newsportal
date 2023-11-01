<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="images/logo.png" height="40" width="76">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
      data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item" style="margin-right: auto;"> <!-- Align date and time to the center -->
          <span id="datetime" class="nav-link text-center"></span> <!-- Added text-center class -->
        </li>

        <li class="nav-item" style="margin-right: 20px;"> <!-- Add margin to create space between items -->
          <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="text" name="searchtitle" placeholder="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>



<script>
  function updateDateTime() {
    const datetimeElement = document.getElementById("datetime");
    const currentDate = new Date();
    const formattedDate = currentDate.toLocaleDateString();
    const formattedTime = currentDate.toLocaleTimeString();
    const dateTimeString = `${formattedDate} - ${formattedTime}`;
    datetimeElement.textContent = dateTimeString;
  }

  // Call the updateDateTime function to initially display the date and time
  updateDateTime();

  // Update the date and time every second
  setInterval(updateDateTime, 1000);
</script>