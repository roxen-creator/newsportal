<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="navbar-category" style="padding-top: 60px;">
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

                        .nav-link.active {
                            /* Style for active tab */
                            background-color: #007bff;
                            color: #fff;
                        }
                    </style>
                    <a href="index.php" class="nav-link <?php if ($currentPage === 'index.php')
                        echo 'active'; ?>">
                        <i class="fas fa-home"></i> Home
                    </a>

                    <?php
                    $currentPage = basename($_SERVER['PHP_SELF']); // Get the current page filename
                    $query = mysqli_query($con, "select id, CategoryName from tblcategory");
                    while ($row = mysqli_fetch_array($query)) {
                        $categoryId = $row['id'];
                        $categoryName = htmlentities($row['CategoryName']);
                        $activeClass = ($currentCategory === $categoryId) ? 'active' : '';
                        echo '<a href="category.php?catid=' . $categoryId . '" class="nav-link ' . (($currentPage === 'category.php' && $currentCategory === $categoryId) ? 'active' : '') . '">' . $categoryName . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach((navLink) => {
        navLink.addEventListener("click", () => {
            navLinks.forEach((link) => link.classList.remove("active"));
            navLink.classList.add("active");
        });
    });

    function updateDateTime() {
        const datetimeElement = document.getElementById("datetime");
        const currentDate = new Date();

        const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        const dayNumber = currentDate.getDay();
        const dayName = days[dayNumber];

        const options = {
            year: 'numeric',
            month: 'long'
        };

        const formattedDate = currentDate.toLocaleDateString(undefined, options);
        const finalString = formattedDate + ", " + dayName;

        datetimeElement.textContent = finalString;
    }

    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>