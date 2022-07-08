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

						if(isset($_POST["search"])){
							$search = $_POST["search"];

							$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ORDER BY post_id DESC";
							$search_query = mysqli_query($conn, $query);
							if(!$search_query){
								die("Bağlantı hatalıdır: ". mysqli_errno($conn));
							}
							$search_count = mysqli_num_rows($search_query);
							if($search_count == 0){
								echo "<h3>Aradınız kelimeyi bulamamıştır</h3>";
							}
							else{

								while($row = mysqli_fetch_assoc($search_query)){
									$post_id = $row["post_id"];
									$post_author = $row["post_author"];
									$post_tarih = $row["post_date"];
									$post_hits = $row["post_hits"];
									$post_test = substr($row["post_text"], 0 , 90);
									$post_resim = $row["post_image"];
									$post_tags = $row["post_tags"];
									$post_title = strtoupper($row["post_title"]);
								?>
								<div class="col-md-6">
									<div class="blog">
										<div class="blog-img">
											<!--<img src="img/blog1.jpg" class="img-fluid">-->
											<img width="100" src="./img/<?php echo $post_resim; ?>">
										</div>
										<div class="blog-content">
											<ul class="blog-meta">
												<li><i class="fas fa-users"></i><span class="writer"><?php echo $post_author; ?></span></li>
												<li><i class="fas fa-clock"></i><span class="writer"><?php echo $post_tarih; ?></span></li>
												<li><i class="fas fa-eye"></i><span class="writer"><?php echo $post_hits; ?></span></li>
											</ul>
											<h3><?php echo $post_title; ?></h3>
											<p><?php echo $post_test; ?></p>
											<a href="blog-single.php?look=<?php echo $post_id; ?>">Read More</a>
										</div>
									</div>
								</div>
									
							<?php } 
							}
						}
						?>
					</div>
				</main>
				
				<?php require("dinamik/sidebar.php"); ?>
			</div>
		</div>
	</section>

<?php
require("dinamik/footer.php");
?>