<?php
require_once('views/partials/Headeruser.php');
?>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<!-- <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Shop Category</h2>
                    <p>Very us move be blessed multiply night</p>
                </div>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="category.html">Shop</a>
                    <a href="category.html">Women Fashion</a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--================End Home Banner Area =================-->

<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9"> 
                <div class="latest_product_inner ">
                    <div class="row">
                        <?php foreach (listproducts() as $product) { ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img height="350px" class="card-img" src="assets/image/<?= $product['image'] ?>" alt="hình sản phẩm của cửa hàng" />
                                        <div class="p_icon">
                                            <a href="index.php?mod=home&act=detailProduct&id=<?= $product['id'] ?>">
                                                <i class="ti-eye"></i>
                                            </a>

                                            <a id="click" href="index.php?mod=home&act=listCart&action=1&msp=<?= $product['id'] ?> ">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="index.php?mod=home&act=detailProduct&id=<?= $product['id'] ?>" class="d-block">
                                            <h4><?= $product['product_name'] ?></h4>
                                        </a>
                                        <div class="mt-3">
                                            <div class="row">

                                                <div class="col">
                                                    <p> Số lượng còn lại: <b><?= $product['amount'] ?> </b></p>
                                                </div>
                                                <div class="col">
                                                    <p> Đã bán: <b><?= $product['sold'] ?> </b></p>
                                                </div>
                                            </div>
                                            <span class="mr-4"><?= number_format($product['promotionalprice']) ?> đ</span>
                                            <del><?= number_format($product['originalprice']) ?> đ</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                <?php
                require_once('views/partials/SidebarListCategory.php');
                ?>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

<!--================ start footer Area  =================-->
<?php
require_once('views/partials/Footeruser.php');
?>