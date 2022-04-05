<?php
require_once('views/partials/Headeruser.php');
?>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->

<!--================End Home Banner Area =================-->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <form action="index.php?mod=home&act=store" method="post">
            <div class="billing_details">

                <div class="row">

                    <div class="col-lg-8">
                        <h3>Thông tin</h3>

                        <div class="col-md-12 form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" id="company" name="name" value="<?= $User['fullname'] ?>" placeholder="Tên" />
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" id="number" name="phone" value="<?= $User['sdt'] ?>" placeholder="Số điện thoại" />

                        </div>
                      

                        <div class="col-md-12 form-group ">
                            <label>Địa chỉ nhận hàng</label>
                            <input type="text" class="form-control" id="add1" name="address" value="<?= $User['address'] ?>" placeholder="Địa chỉ nhận hàng" />

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Sản phẩm đã đặt</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Sản phẩm
                                        <span class="middle">SL</span>
                                        <span class="last">Thành tiền</span>
                                    </a>
                                </li>
                                <li>
                                    <!-- t chỉ lấy ra duoc 1 cái sản pham cuoi cung ak 
                                còn 2 cái truoc ko lấy ra duoc -->
                               
                                <?php  foreach ($item as  $value) { ?>
                                   
                                        <a href="#"><?=  $value['product_name'] ?>
                                            <span class="middle">x<?= $value['amount'] ?></span>
                                            <span class="last"><?= number_format($value['amount'] * $value['promotionalprice']) ?> đ</span>
                                        </a>
                                        <input type="hidden" name="masp[]" value="<?= $value['id']?>">
                                        <input type="hidden" name="soluong[]" value="<?= $value['amount'] ?>">
                                    <?php } ?>
                                </li>
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Tổng cộng
                                        <span><?= number_format($Data) ?> đ</span>
                                    </a>
                                </li>
                            </ul>
                            <input type="hidden" name="user_id" value="<?= $User['id'] ?>" />
                            <input type="hidden" name="tong" value="<?= $Data ?>" />
                            <div class="d-flex  mt-2">
                                <button class="main_btn " type="submit"> thanh toán</button>
                                <button class="main_btn ml-1 "> <a class="text-white" href="index.php?mod=home&act=ListCart">Quay lại</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================End Checkout Area =================-->

<!--================ start footer Area  =================-->
<?php
require_once('views/partials/Footeruser.php');
?>