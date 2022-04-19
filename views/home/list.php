<?php
require_once('views/partials/Headeruser.php');
?>

  <!--================Header Menu Area =================-->

  <!--================Home Banner Area =================-->
  <section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content row">
          <div class="col-lg-12">
            
            <h3><span>PREDATOR</span> </h3>
            <h2 style="color:white">  Tại sao nên mua đàn của chúng tôi</h2>
            <a class="main_btn mt-40" href="index.php?mod=home&act=about">Xem thêm</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!-- Start feature Area -->
  <section class="feature-area section_gap_bottom_custom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-money"></i>
              <h3>Hoàn tiền</h3>
            </a>
            <p>Hoàn tiền nếu sản phẩm lỗi</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-truck"></i>
              <h3>Giao hàng miễn phí</h3>
            </a>
            <p>Nhanh chóng toàn vẹn</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-support"></i>
              <h3>Hỗ trợ mọi lúc</h3>
            </a>
            <p>Luôn luôn lắng nghe ý kiến</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-blockchain"></i>
              <h3>Thanh toán an toàn</h3>
            </a>
            <p>Thanh toán nhanh chóng tiện lợi</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End feature Area -->

  <!--================ Feature Product Area =================-->
  <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>SẢN PHẨM NỔI BẬT</span></h2>
          
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach ($ListProductsTop3ByViewCount as $product) { ?>
        <div class="col-lg-4 col-md-6">
          <div class="single-product">
            <div class="product-img">
              <img style="height: 450px;" class="img-fluid w-100" src="assets/image/<?= $product['image'] ?>" alt="Sản phẩm bán chạy" />
              <div class="p_icon">
                <a href="index.php?mod=home&act=detailProduct&id=<?= $product['id'] ?>">
                  <i class="ti-eye"></i>
                </a>
               
                <a href="index.php?mod=home&act=listCart&action=1&msp=<?= $product['id'] ?> ">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="index.php?mod=home&act=detailProduct&id=<?= $product['id'] ?>" class="d-block">
                <h4><?= $product['product_name'] ?></h4>
              </a>
              <div class="">Đã bán: <a href="" class="text-danger"><?= $product['sold'] ?> </a> </div>
             
              <div class="mt-3">
                <span style="color:#87d539" class="mr-4"><?= number_format($product['promotionalprice']) ?> đ</span>
                <del ><?= number_format($product['originalprice']) ?> đ</del>
              </div>
            </div>
          </div>
        </div>

       <?php } ?>

      </div>
    </div>
  </section>
  <!--================ End Feature Product Area =================-->

  <!--================ New Product Area =================-->
  <section class="new_product_area  section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>SẢN PHẨM MỚI NHẤT</span></h2>
           
          </div>
        </div>
      </div>
      
      <div class="row">
      <?php foreach ($ListProductsTop1ByCreated as $product) { ?>
        <div class="col-lg-6">
          <div class="new_product">
            <h5 class="text-uppercase"> <?= $product['categoryname'] ?></h5>
            <h3 class="text-uppercase"><a href="index.php?mod=home&act=detailProduct&id=<?= $product['id'] ?>"> <b style="color:black"><?= $product['product_name'] ?></b></a></h3>
            <div class="mb-3" >
            <a href="index.php?mod=home&act=detailProduct&id=<?= $product['id'] ?>">  <img style="height: 400px;" class="img-fluid" src="assets/image/<?= $product['image1'] ?>" alt="Sản phẩm mới mở bán" />
            </a> </div>
            <h4><?= number_format($product['promotionalprice']) ?> đ</h4>
            <a href="index.php?mod=home&act=listCart&&action=1&msp=<?= $product['id'] ?> " class="main_btn">Add to cart</a>
          </div>
        </div>
        <?php } ?>
        <div class="col-lg-6 mt-5 mt-lg-0">
          <div class="row">
          <?php foreach ($ListProductsTop4ByCreated as $product) { ?>
            <div class="col-lg-6 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img style="height: 272px;" class="img-fluid w-100" src="assets/image/<?= $product['image1'] ?>" alt="Sản phẩm mới mở bán" />
                  <div class="p_icon">
                    <a href="index.php?mod=home&act=detailProduct&id=<?= $product['id'] ?>">
                      <i class="ti-eye"></i>
                    </a>
              
                    <a href="index.php?mod=home&act=listCart&&action=1&msp=<?= $product['id'] ?> ">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="index.php?mod=home&act=detailProduct&id=<?= $product['id'] ?>" class="d-block">
                    <h4><b style="color:black"><?= $product['product_name'] ?></b></h4>
                  </a>
                  <div class="mt-3">
                    <span style="color:#87d539" class="mr-4"><?= number_format($product['promotionalprice']) ?> đ</span>
                    <del><?= number_format($product['originalprice']) ?> đ</del>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
      
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End New Product Area =================-->

  <!--================ Inspired Product Area =================-->
  
  <?php 
		require_once('views/partials/Footeruser.php');
		?>