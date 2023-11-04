<div class="col-md-4">
  <div class="card border-primary">
    <h5 class="card-header bg-primary text-white">Categories</h5>
    <div class="card-body">
      <ul class="list-unstyled mb-0">
        <?php $query = mysqli_query($con, "select id,CategoryName from tblcategory");
        while ($row = mysqli_fetch_array($query)) {
          $categoryId = $row['id'];
          $categoryName = htmlentities($row['CategoryName']);
          $activeClass = ($currentCategory === $categoryId) ? 'active' : '';
          ?>
          <li class="mb-2">
            <a href="category.php?catid=<?php echo htmlentities($categoryId); ?>" class="<?php echo $activeClass; ?>"
              style="color: #333; transition: 0.3s; text-decoration: none;"
              onmouseover="this.style.color='#007bff'; this.style.backgroundColor='lightgray';"
              onmouseout="this.style.color='#333'; this.style.backgroundColor='transparent';">
              <?php echo $categoryName; ?>
            </a>
          </li>
          <hr> <!-- Add a horizontal line to separate each category -->
        <?php } ?>
      </ul>
    </div>
  </div>

  <!-- Side Widget -->
  <div class="card my-4 border-success mb-4">
    <h5 class="card-header bg-success text-white">Recent News</h5>
    <div class="card-body">
      <ul class="mb-0">
        <?php
        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
        while ($row = mysqli_fetch_array($query)) {
          ?>
          <li class="mb-2">
            <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>"
              style="color: #333; transition: 0.3s; text-decoration: none;" onmouseover="this.style.color='#007bff';"
              onmouseout="this.style.color='#333';">
              <?php echo htmlentities($row['posttitle']); ?>
            </a>
          </li>
          <hr style="border-top: 1px solid lightgray;">
        <?php } ?>
      </ul>
    </div>
  </div>

  <!-- Side Widget -->
  <div class="card my-4 border-info mb-4">
    <h5 class="card-header bg-info text-white">Popular News</h5>
    <div class="card-body">
      <ul class="mb-0">
        <?php
        $query1 = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId  order by viewCounter desc limit 5");
        while ($result = mysqli_fetch_array($query1)) {
          ?>
          <li class="mb-2">
            <a href="news-details.php?nid=<?php echo htmlentities($result['pid']) ?>"
              style="color: #333; transition: 0.3s; text-decoration: none;" onmouseover="this.style.color='#007bff';"
              onmouseout="this.style.color='#333';">
              <?php echo htmlentities($result['posttitle']); ?>
            </a>
          </li>
          <hr style="border-top: 1px solid lightgray;">
        <?php } ?>
      </ul>
    </div>
  </div>
</div>