<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- <link rel="icon" href="img/favicon.png" type="image/png" /> -->
	<title>PREDATOR | BÁN ĐÀN</title>
	<link rel="shortcut icon" href="assets/image/logo.png">
	<!-- Icon fontanwesome -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/home/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/home/vendors/linericon/style.css" />
	<link rel="stylesheet" href="assets/home/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/home/css/themify-icons.css" />
	<link rel="stylesheet" href="assets/home/css/flaticon.css" />
	<link rel="stylesheet" href="assets/home/vendors/owl-carousel/owl.carousel.min.css" />
	<link rel="stylesheet" href="assets/home/vendors/lightbox/simpleLightbox.css" />
	<link rel="stylesheet" href="assets/home/vendors/nice-select/css/nice-select.css" />
	<link rel="stylesheet" href="assets/home/vendors/animate-css/animate.css" />
	<link rel="stylesheet" href="assets/home/vendors/jquery-ui/jquery-ui.css" />

	<!-- boostrap -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	 -->



	<!-- main css -->
	<link rel="stylesheet" href="assets/home/style.css" />
	<link rel="stylesheet" href="assets/home/css/responsive.css" />

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- thong báo sweetalert2  sịn -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- in ra thong báo -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

</head>

<body>
	<!--================Header Menu Area =================-->
	<header class="header_area">

		<div class="main_menu">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light w-100">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<img src="img/logo.png" alt="" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
						<div class="row w-100 mr-0">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="index.php">Trang chủ</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Danh mục</a>
										<ul class="dropdown-menu">
											<?php foreach (listcategories() as $category) { ?>
												<li class="nav-item">
													<a class="nav-link" href="index.php?mod=home&act=productbycategory&id=<?= $category['id'] ?>"><?= $category['category_name'] ?></a>
												</li>
											<?php } ?>

										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="index.php?mod=home&act=listProduct">Sản phẩm</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="index.php?mod=home&act=about">Giới thiệu</a>
									</li>
								</ul>
							</div>

							<div class="col-lg-5 pr-0">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<li class="nav-item">
										<!-- <a href="#" class="icons">
											<i class="ti-search" aria-hidden="true"></i>
										</a> -->
										<!-- <form class=" nav-link form-inline my-2 my-lg-0">
											<input class="form-control mr-sm-2" type="search" placeholder="Search">
											<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
										</form> -->

										<form method="POST" class="example mt-4" action="index.php?mod=home&act=listProductBySearch" style="margin:auto;max-width:300px">
											<input type="text" placeholder="Tìm sản phẩm..." name="product_name">
											<button type="submit"><i class="fa fa-search"></i></button>
										</form>
									</li>

									<li class="nav-item">
										<a href="index.php?mod=home&act=listCart" class="icons">
											<i class="ti-shopping-cart"></i>
										</a>
									</li>

									<li class="nav-item dropdown submenu ">
										<a href="#" class=" icons nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											<i class="ti-user mt-2" aria-hidden="true"></i>
										</a>

										<ul class="dropdown-menu">
											<?php if (isset($_SESSION['auth']['fullname'])) {
												if ($_SESSION['auth']['role_id'] == 2) {
											?>
													<li class="nav-item">
														<a class="nav-link" href="category.html"> <?= $_SESSION['auth']['fullname'] ?></a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#"> <i class="fas fa-user"> Thông tin</i></a>
													</li>
													<li class="nav-item">
														<a href="index.php?mod=home&act=listOrder&id_user=<?= $_SESSION['auth']['id'] ?>" class="icons">
														<i class="fa fa-shopping-bag"></i>	Đơn hàng
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="index.php?mod=auth&act=reset"><i class="fas fa-key"> Đổi mật khẩu</i></a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="index.php?mod=auth&act=logoutFrontend"><i class="fa fa-power-off"></i>thoát</a>
													</li>
												<?php } else { ?>
													<li class="nav-item">
														<a class="nav-link" href="category.html"> Chào <?= $_SESSION['auth']['fullname'] ?></a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="index.php?mod=category&act=index"><i class="fa fa-cogs"></i> Trang quản lý</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#"> <i class="fas fa-user"></i> Thông tin</a>
													</li>
													<li class="nav-item">
														<a  class="nav-link" href="index.php?mod=home&act=listOrder&id_user=<?= $_SESSION['auth']['id'] ?>" class="icons">
														<i class="fa fa-shopping-bag"></i>	Đơn hàng
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="index.php?mod=auth&act=reset"><i class="fas fa-key"></i> Đổi mật khẩu</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="index.php?mod=auth&act=logoutFrontend"> <i class="fa fa-power-off"></i> Thoát</a>
													</li>
												<?php }
											} else {
												?>
												<li class="nav-item">
													<a class="nav-link" href="index.php?mod=auth&act=login"> Đăng nhập</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="index.php?mod=auth&act=create">Đăng ký</a>
												</li>
											<?php   } ?>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</header>