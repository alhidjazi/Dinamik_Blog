<?php
require("dinamik/header.php");
$title="Blog!";
baslik($title);
?>
	<!-- Navigation -->
<?php
require("dinamik/navigation.php");
?>

	<!--==========================
    INSIDE HERO SECTION Section
============================-->
	<section class="page-image page-image-blog md-padding">
		<h1 class="text-white text-center">BLOG</h1>
	</section>

	<!--==========================
    Contact Section
============================-->
	<section id="blog" class="md-padding">
		<div class="container">
			<div class="row">
				<main id="main" class="col-md-8">
					<div class="row">
						
					
					<?php

                        if(isset($_GET["cool"])){
                            $post_category_selected = $_GET["cool"];
                        }

						$sql_sorgu = "SELECT * FROM posts WHERE post_category = '$post_category_selected' ";
						$butun_post = mysqli_query($conn, $sql_sorgu);

						while($row = mysqli_fetch_assoc($butun_post)){
							$post_id = $row["post_id"];
							$post_author = $row["post_author"];
							$post_tarih = $row["post_date"];
							$post_yorum = $row["post_comment_number"];
							$post_test = $row["post_text"];
							$post_resim = $row["post_image"];
							$post_tags = $row["post_tags"];
							$post_title = strtoupper($row["post_title"]);
						?>
						<div class="col-md-6">
							<div class="blog">
								<div class="blog-img">
									<img src="img/<?php echo $post_resim;  ?>" class="img-fluid">
									
								</div>
								<div class="blog-content">
									<ul class="blog-meta">
										<li><i class="fas fa-users"></i><span class="writer"><?php echo $post_author; ?></span></li>
										<li><i class="fas fa-clock"></i><span class="writer"><?php echo $post_tarih; ?></span></li>
										<li><i class="fas fa-comments"></i><span class="writer"><?php echo $post_yorum; ?></span></li>
									</ul>
									<h3><?php echo $post_title; ?></h3>
									<p><?php echo $post_test; ?></p>
									<a href="blog-single.php?look=<?php echo $post_id; ?>">Read More</a>
								</div>
							</div>
						</div>
							
					<?php } ?>
						
			

					</div>
					<div class="row">
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1">Previous</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
								<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav>
					</div>
				</main>
				
				<?php require("dinamik/sidebar.php"); ?>
				
				
				
			</div>

		</div>
	</section>

	<?php
require("dinamik/footer.php");
?>