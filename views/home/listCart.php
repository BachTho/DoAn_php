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
                            <th> STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>

                        </tr>

                    </thead>
                    <tbody>
                        <form action="index.php?mod=home&act=Order" method="post">
                            <?php $stt = 1;
                            if (sizeof($ListCarts) > 0) {
                                $tong = 0;
                                foreach ($ListCarts as $key => $value) {
                                    $tt = $value['soluong'] * $value['promotionalprice'];
                                    $tong += $tt;
                            ?>
                                    <tr>
                                        <!-- lấy ra id san pham -->
                                        <input type="hidden" name='products[]' value="<?= $key ?>">
                                        <td><?= $stt++ ?></td>

                                        <td>

                                            <p><?= $value['product_name'] ?></p>
                                        </td>
                                        <td>

                                            <img style="width:100px; height:100px" src="assets/image/<?= $value['image'] ?>" alt="" />
                                        </td>
                                        <td>
                                            <h5><?= number_format($value['promotionalprice']) ?> đ</h5>
                                        </td>
                                        <td>
                                            <a style="margin-right:10px;" href="index.php?mod=home&act=listCart&action=1&msp=<?= $value['id'] ?>" class="btn btn-success">+</a>
                                            <?= $value['soluong'] ?>
                                            <a href="index.php?mod=home&act=listCart&action=2&msp=<?= $value['id'] ?>" style="margin-left:10px;" class="btn btn-primary">-</a>
                                        </td>
                                        <td>
                                            <h5><?= number_format($value['soluong'] * $value['promotionalprice']) ?></h5>
                                        </td>
                                        <td>
                                            <a href="index.php?mod=home&act=listCart&action=3&msp=<?= $value['id'] ?>">
                                                <i class=" fas fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php }  ?>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <?= number_format($tong) ?> đ
                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="checkout_btn_inner">
                                            <a class="gray_btn" href="index.php?mod=home&act=listProduct">Tiếp tục mua sắm</a>
                                            <input type="hidden" name="tong" value="<?= $tong ?>">
                                            <input type="hidden" name="id_username" value="<?php if (isset($_SESSION['auth']['id'])) {
                                                                                                echo   $_SESSION['auth']['id'];
                                                                                            } ?>">
                                            <button class="main_btn" type="submit"> thanh toán</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="7">
                                        <h1>Giỏ hàng đang trống mời bạn thêm sản phẩm trước</h1>
                                    </td>
                                <tr>
                                    <td colspan="7">
                                        <a class="gray_btn" href="index.php?mod=home&act=listProduct">Trang sản phẩm</a>
                                    </td>
                                </tr>
                                </tr>
                            <?php
                            } ?>

                        </form>
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