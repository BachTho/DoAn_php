<?php
require_once('views/partials/Headeruser.php');
?>


<!--================Single Product Area =================-->
<div class="product_image_area mb-5">
    <div class="container">
        <div class="row s_product_inner">


            <div class="col-lg-6">
                <div class="s_product_img">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                <img style="width: 60px; height:60px " src="assets/image/<?= $DetailProduct['image'] ?>" alt="" />
                            </li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                <img style="width: 60px; height:60px " src="assets/image/<?= $DetailProduct['image1'] ?>" alt="" />
                            </li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2">
                                <img style="width: 60px; height:60px " src="assets/image/<?= $DetailProduct['image2'] ?>" alt="" />
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img height="580px" class="d-block w-100" src="assets/image/<?= $DetailProduct['image'] ?>" alt="First slide" />
                            </div>
                            <div class="carousel-item">
                                <img height="580px" class="d-block w-100" src="assets/image/<?= $DetailProduct['image1'] ?>" alt="Second slide" />
                            </div>
                            <div class="carousel-item">
                                <img height="580px" class="d-block w-100" src="assets/image/<?= $DetailProduct['image2'] ?>" alt="Third slide" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">

                    <h3><?= $DetailProduct['product_name'] ?></h3>
                    <h2><?= number_format($DetailProduct['promotionalprice']) ?> đ</h2>
                    <ul class="list">
                        <li>
                            <a class="" href="#">
                                <span>Danh mục:</span> <b style="color:#2a2a2a"><?= $DetailProduct['categoryname'] ?></b></a>
                        </li>
                        <li>
                            <a href="#"> <span>Lượt xem:</span><?= $DetailProduct['view_count'] ?></a>
                        </li>
                    </ul>

                    <?= $DetailProduct['content'] ?>
                    <div class="card_area">
                        <a class="main_btn" href="index.php?mod=home&act=listCart&&action=1&msp=<?= $DetailProduct['id'] ?> ">Add to Cart</a>
                    </div>
                    <!-- <form class="sign-up-form form" action="index.php?mod=home&act=store" method="POST" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="id_product" value="">
                        <input type="number" name="amount" value="1">
                        <button type="submit" class="form-btn primary-default-btn transparent-btn">Thêm danh mục</button>

                    </form> -->
                </div>
            </div>

        </div>
    </div>
</div>

<?php
require_once('views/partials/Footeruser.php');
?>