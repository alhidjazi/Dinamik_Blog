<?php include "dinamik_admin/admin_header.php";  ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php include "dinamik_admin/admin_sidebar.php";  ?>

      <div id="content-wrapper">

        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Welcome to Admin Page: <small style="color:tomato;"><?php echo $_SESSION["username"]; ?></small></li>
          </ol>
          
          <hr>
            <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-clipboard"></i>
                  </div>
                  <?php
                    $query =" SELECT * FROM categories";
                    $select_all_category = mysqli_query($conn, $query);
                    $category_count = mysqli_num_rows($select_all_category);
                    echo "<div class='mr-5'>{$category_count} Categories!</div>";

                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="categories.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-comment"></i>
                  </div>
                  <?php
                    $query =" SELECT * FROM portfolios";
                    $select_all_portfolio = mysqli_query($conn, $query);
                    $portfolio_count = mysqli_num_rows($select_all_portfolio);
                    echo "<div class='mr-5'>{$portfolio_count} Portofolios!</div>";

                  ?>

                </div>
                <a class="card-footer text-white clearfix small z-1" href="portfolios.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-list-ul"></i>
                  </div>
                  <?php
                    $query =" SELECT * FROM posts";
                    $select_all_post = mysqli_query($conn, $query);
                    $post_count = mysqli_num_rows($select_all_post);
                    echo "<div class='mr-5'>{$post_count} Posts!</div>";

                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="posts.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-file-image"></i>
                  </div>
                  <?php
                    $query =" SELECT * FROM comments";
                    $select_all_comment = mysqli_query($conn, $query);
                    $comment_count = mysqli_num_rows($select_all_comment);
                    echo "<div class='mr-5'>{$comment_count} Comments!</div>";

                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="comments.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-file-image"></i>
                  </div>
                  <?php
                    $query =" SELECT * FROM users";
                    $select_all_user = mysqli_query($conn, $query);
                    $user_count = mysqli_num_rows($select_all_user);
                    echo "<div class='mr-5'>{$user_count} Users!</div>";

                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="users.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>  
          <hr>
          <div class="row">
            <div class="col-md-6">
              <script type="text/javascript">
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ['Information', ''],
                    ['Posts', <?php echo $post_count; ?>],
                    ['Categories', <?php echo $category_count; ?>],
                    ['Comments', <?php echo $comment_count; ?>],
                    ['Portofolios', <?php echo $portfolio_count; ?>]
                  ]);

                  var options = {
                    chart: {
                      title: '',
                      subtitle: '',
                    }
                  };

                  var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                  chart.draw(data, google.charts.Bar.convertOptions(options));
                }
              </script>
              <div id="columnchart_material" style="width: auto; height: 400px;"></div>
            </div>

            <?php
                    $query =" SELECT * FROM comments WHERE comment_status = 'approved'";
                    $select_all_approved = mysqli_query($conn, $query);
                    $comment_approved = mysqli_num_rows($select_all_approved);

            ?>
            <div class="col-md-6">
              <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                  var data = google.visualization.arrayToDataTable([
                    ['', ''],
                    ['Approved', <?php echo $comment_approved; ?>],
                    ['Unapproved', <?php echo ($comment_count - $comment_approved); ?>]
                  ]);

                  var options = {
                    title: ''
                  };

                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                  chart.draw(data, options);
                }
              </script>
              <div id="piechart" style="width: auto; height: 400px;"></div>
            </div>
          </div>   
<?php include "dinamik_admin/admin_footer.php";  ?>

         
