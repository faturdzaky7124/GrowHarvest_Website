<?php 
    require "function/koneksi.php";

	$query= " SELECT * FROM tb_produk ORDER BY id_produk ASC ";
	$sql= mysqli_query($con,$query);
  
  $query= "  SELECT * FROM tb_kategori ORDER BY id_kategori ASC";
	$kate= mysqli_query($con,$query);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rajawali</title>
	<link rel="icon" type="image/x-icon" href="../assets/img/backgrounds/wali.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/landingpage/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/landingpage/css/animate.css">
    
    <link rel="stylesheet" href="assets/landingpage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/landingpage/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/landingpage/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/landingpage/css/aos.css">

    <link rel="stylesheet" href="assets/landingpage/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/landingpage/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/landingpage/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="assets/landingpage/css/flaticon.css">
    <link rel="stylesheet" href="assets/landingpage/css/icomoon.css">
    <link rel="stylesheet" href="assets/landingpage/css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+6281331638447</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">Rajawali@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">Desa Randuagung,Kec.Sumber Jambe,Kab.Jember </span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Pertanian Rajawali</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
		  <style>
.ftco-navbar-light .navbar-nav > .nav-item > .nav-link{
	font-weight: 700;
	font-size: 13px;
}
		  </style>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item active"><a href="shop.php" class="nav-link">Product</a></li>
	          <!-- <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.html">Shop</a>
              	<a class="dropdown-item" href="wishlist.html">Wishlist</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li> -->
	          <li class="nav-item"><a href="about.php" class="nav-link">Profile</a></li>
	          <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <!-- <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li> -->

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('assets/landingpage/asetLP/img/produk1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p> -->
            <!-- <h1 class="mb-0 bread">Kami Menyediakan semua produk tani silahkan cek</h1> -->
          </div>
        </div>
      </div>
    </div>




<section id="portfolio" class="port mt-5">
	<div class="container">
	
	<div class="row justify-content-center">
			<div class="col-md-10 mt-3 mb-4 text-center">
			
				<ul class="" id="portfolio-flters">
					<li data-filter="*" class="filter-active">All</li>
					<?php foreach ($kate as $datakategori): ?>
					<li data-filter=".filter-<?= $datakategori["id_kategori"] ?>" value="<?= $datakategori["id_kategori"] ?>" class="filter"><?= $datakategori["nama_kategori"] ?></li>
					<?php endforeach ?>
				</ul>
				
			</div>
		</div>

		<div class="row portfolio-container">
		<?php foreach ($sql as $data): ?>
			<div class="col-md-6 col-lg-3 portfolio-item filter-<?= $data["id_kategori"] ?>">
				<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="<?= $data["gambar_produk"] ?>" alt="Colorlib Template">
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#" data-toggle="modal" data-target="#productModal<?= $data["id_produk"] ?>"><?= $data["nama_produk"] ?></a></h3>
						<div class="d-flex">
							<div class="pricing">
								<!-- <p class="price"><span>$120.00</span></p> -->
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							
						</div>
					</div>
				</div>
			</div>

					<div class="modal fade" id="productModal<?= $data["id_produk"] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel2">Detail Produk</h5>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col mb-3">
								<div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img
                                              src="assets/landingpage/asetLP/img/produk1.jpg"
                                              alt="user-avatar"
                                              class="d-block rounded"
                                              height="100"
                                              width="100"
                                              id="uploadedAvatar"
                                            />
                                          </div>
                                </div>
                              </div>
                              <div class="row g-4">
							  <p class="price"><?= $data["deskripsi"] ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

			<?php endforeach ?>

		</div>
	</div>
	
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb py-2 bg-white">
      <div class="container py-2">
        <div class="row d-flex justify-content-center py-2">
          <div class="col-md-2">
          	<!-- <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2> -->
          	<!-- <span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3"> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
						<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-1">
              <h2 class="ftco-heading-2">Rajawali</h2>
              <p>Kami meyediakan sarana pertanian,pupuk,benih,pestisida,alat pertanian DLL.</p>
              <!-- <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-whatsapp"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul> -->
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Home</a></li>
                <li><a href="#" class="py-2 d-block">Product</a></li>
                <li><a href="#" class="py-2 d-block">Profile</a></li>
                <li><a href="#" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Membantu</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Pengiriman Informasi</a></li>
	                <li><a href="#" class="py-2 d-block">Pengambilan &amp; Penukaran</a></li>
	                <li><a href="#" class="py-2 d-block"> Ketentuan &amp; Kondisi</a></li>
	                <li><a href="#" class="py-2 d-block">Kebijakan Pribadi</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Ada Pertanyaan?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Desa Randuagung,Kec.Sumber Jambe,Kab.Jember</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+6281331638447</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">Rajawali@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">


          </div>
        </div>
      </div>
    </footer>
    
  
	<script>

		(function() {
		  "use strict";
		
		  /**
		   * Easy selector helper function
		   */
		  const select = (el, all = false) => {
			el = el.trim()
			if (all) {
			  return [...document.querySelectorAll(el)]
			} else {
			  return document.querySelector(el)
			}
		  }
		
		  /**
		   * Easy event listener function
		   */
		  const on = (type, el, listener, all = false) => {
			let selectEl = select(el, all)
			if (selectEl) {
			  if (all) {
				selectEl.forEach(e => e.addEventListener(type, listener))
			  } else {
				selectEl.addEventListener(type, listener)
			  }
			}
		  }
		
		  window.addEventListener('load', () => {
			let portfolioContainer = select('.portfolio-container');
			if (portfolioContainer) {
			  let portfolioIsotope = new Isotope(portfolioContainer, {
				itemSelector: '.portfolio-item'
			  });
		
			  let portfolioFilters = select('#portfolio-flters li', true);
		
			  on('click', '#portfolio-flters li', function(e) {
				e.preventDefault();
				portfolioFilters.forEach(function(el) {
				  el.classList.remove('filter-active');
				});
				this.classList.add('filter-active');
		
				portfolioIsotope.arrange({
				  filter: this.getAttribute('data-filter')
				});
		
			  }, true);
			}
		
		  });
		
		  new PureCounter();
		
		})()
			  </script>
			  
		
		<style>
		.port #portfolio-flters {
		  padding: 0;
		  margin: 0 auto 15px auto;
		  list-style: none;
		  text-align: center;
		  border-radius: 50px;
		  padding: 2px 15px;
		}
		
		.port #portfolio-flters li {
		  cursor: pointer;
		  display: inline-block;
		  padding: 10px 15px;
		  font-size: 16px;
		  font-weight: 600;
		  line-height: 1;
		  text-transform: uppercase;
		  color: #444444;
		  margin-bottom: 10px;
		  transition: all 0.3s ease-in-out;
		}
		
		.port #portfolio-flters li:hover,
		.port #portfolio-flters li.filter-active {
		  color: #fff;
		  background-color: rgb(90, 170, 63);
		  padding: 10px 10px 10px 10px;
		  border-radius: 7px;
		}
		
		.port #portfolio-flters li:last-child {
		  margin-right: 0;
		}
		
		</style>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="assets/landingpage/js/jquery.min.js"></script>
  <script src="assets/landingpage/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/landingpage/js/popper.min.js"></script>
  <script src="assets/landingpage/js/bootstrap.min.js"></script>
  <script src="assets/landingpage/js/jquery.easing.1.3.js"></script>
  <script src="assets/landingpage/js/jquery.waypoints.min.js"></script>
  <script src="assets/landingpage/js/jquery.stellar.min.js"></script>
  <script src="assets/landingpage/js/owl.carousel.min.js"></script>
  <script src="assets/landingpage/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/landingpage/js/aos.js"></script>
  <script src="assets/landingpage/js/jquery.animateNumber.min.js"></script>
  <script src="assets/landingpage/js/bootstrap-datepicker.js"></script>
  <script src="assets/landingpage/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="assets/landingpage/js/google-map.js"></script>
  <script src="assets/landingpage/js/main.js"></script>

  <script src="assets/landingpage/isotope-layout/isotope.pkgd.min.js"></script>

  <script>
    // Add this script to handle the click event and load product details dynamically
    $(document).ready(function() {
        $('#productModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var productID = button.data('productid');

            // Assuming you have a PHP script to fetch product details by ID, you can use AJAX
            $.ajax({
                url: 'get_product_details.php', // Replace with your PHP script
                method: 'GET',
                data: {id: productID},
                success: function(response) {
                    $('#productDetails').html(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
    
  </body>
</html>