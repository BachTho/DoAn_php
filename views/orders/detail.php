<?php
require_once('views/partials/Header.php');
?>
<?php
require_once('views/partials/Sidebar.php');
?>

<?php
require_once('views/partials/Footertop.php');
?>
<!-- ! Main -->
<main class="main users chart-page" id="skip-target">
    <div class="container">
        <h2 class="main-title">Các sản phẩm của khách hàng <?= $Order['name'] ?></h2>

        <div class="row">
            <div class="col-lg-12 " style="margin-top: 2%">
                <div class="users-table table-wrapper">
                    <table class="posts-table">
                        <thead>
                            <tr class="users-table-info">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>

                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 1;
                            foreach ($ListOrderDetails as $order) { ?>
                                <tr>
                                    <td><?= $stt++ ?></td>
                                    <td><span class="badge-pending"><a href=""> <?= $order['product_name'] ?></a></span></td>
                                    <td>
                                        <div class="categories-table-img">
                                            <picture>
                                                <source srcset="assets/image/<?= $order['product_image'] ?>"><img src="assets/image/<?= $order['product_image'] ?>" alt="post">
                                            </picture>
                                        </div>

                                    </td>
                                    <td><?= $order['price'] ?></td>
                                    <td><?= $order['amount'] ?></td>
                                    <td><?= $order['total'] ?></td>

                                    <td>
                                        <span class="p-relative">
                                            <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                                <div class="sr-only">More info</div>
                                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                                            </button>
                                            <?php if ($Order['status'] == 0) {  ?>
                                                <ul class="users-item-dropdown dropdown">
                                                    <li><a href="index.php?mod=order&act=xoa1&id=<?= $order['id'] ?>">Xác nhận</a></li>
                                                </ul>
                                            <?php } else if ($Order['status'] == 1) {  ?>
                                                <ul class="users-item-dropdown dropdown">
                                                    <li><a href="index.php?mod=order&act=xoa1&id=<?= $order['id'] ?>">Giao hàng</a></li>
                                                </ul>
                                            <?php } else if ($Order['status'] == 2) {  ?>
                                                <ul class="users-item-dropdown dropdown">
                                                </ul>

                                            <?php } else { ?>
                                                <ul class="users-item-dropdown dropdown">
                                                </ul>
                                            <?php  } ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</main>

<?php
require_once('views/partials/Footerbottom.php');
?>