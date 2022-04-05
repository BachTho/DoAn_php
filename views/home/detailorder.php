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
                    <h2>Cart</h2>
                    <p>Very us move be blessed multiply night</p>
                </div>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="cart.html">Cart</a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng cộng</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1;
                        foreach ($ListOrderDetails as $value) { ?>
                            
                            <tr>
                                <td><?= $stt++ ?></td>
                                <td>
                                    <p><?= $value['product_name'] ?></p>
                                </td>
                                <td>
                                    <img style="width:100px; height:100px" src="assets/image/<?= $value['product_image'] ?>" alt="" />
                                </td>
                                <td>
                                    <h5><?= number_format($value['price']) ?> đ</h5>
                                </td>
                                <td>
                                    x<?= $value['amount'] ?>
                                </td>
                                <td>
                                    <?= $value['total'] ?>
                                </td>
                               
                            </tr>
                        <?php }  ?>
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

<!--================ start footer Area  =================-->

<?php
require_once('views/partials/Footeruser.php');
?>