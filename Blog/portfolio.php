<?php
require("dinamik/db_blog.php");
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
<section class="page-image page-image-portfolio md-padding">
    <h1 class="text-white text-center">PORTFOLIO</h1>
</section>
    
<!--==========================
    PORTFOLIO Section
============================-->
<section id="portfolio" class="md-padding">
    <div class="container">

			<div class="row text-center">
				<div class="col-md-4 offset-md-4">
					<div class="section-header">
						<h2 class="title">Our Works</h2>
					</div>
				</div>
			</div>
        <div class="row">


        <?php

        $sql_sorgu = "SELECT * FROM portfolios";
        $veri_cek = mysqli_query($conn, $sql_sorgu);
        while($satir = mysqli_fetch_assoc($veri_cek)){
               $port_id = $satir["portfolio_id"];
               $port_adi = $satir["portfolio_name"];
               $port_kat = $satir["portfolio_category"];
               $port_resim_k = $satir["portfolio_img_sm"];
               $port_resim_b = $satir["portfolio_img_bg"];
        ?>

            <div class="col-md-4 col-sm-6 portfolio-item">
            <a href="img/<?php echo $port_resim_b ?>" class="portfolio-link" data-lightbox="web-design" data-title="<?php echo $port_adi ?>" >
                <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                        <i class="fas fa-search fa-3x"></i>
                    </div>
                </div>
                <img class="img-fluid" src="img/<?php echo $port_resim_k ?>" alt="">
            </a>
            <div class="portfolio-caption">
                <h4>{<?php echo $port_adi ?>}</h4>
                <p class="text-muted"><?php echo $port_kat ?></p>
            </div>
        </div>
        <?php
        }

        ?>



        </div>
    </div>
</section>

<?php
require("dinamik/footer.php");
?>