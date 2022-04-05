<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">BÁN ĐÀN</span>
                    <span class="logo-subtitle">Quản lý</span>
                </div>
            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="index.php"><span class="icon home" aria-hidden="true"></span>Trang chủ</a>
                </li>
            </ul>
            <span class="system-menu__title">SẢN PHẨM</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a class="show-cat-btn" href="index.php?mod=category&act=index">
                        <span class="icon document" aria-hidden="true"></span>Danh mục
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="index.php?mod=category&act=index">Danh sách</a>
                        </li>
                        <li>
                            <a href="index.php?mod=category&act=create">Thêm mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="index.php?mod=post&act=index">
                        <span class="icon folder" aria-hidden="true"></span>Sản phẩm
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="index.php?mod=product&act=index">Danh sách</a>
                        </li>
                        <li>
                            <a href="index.php?mod=product&act=create">Thêm mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="index.php?mod=order&act=index">
                        <span class="icon fa fa-shopping-basket" aria-hidden="true"></span>Đơn hàng
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="index.php?mod=order&act=index&action=1">Đơn đang xử lý</a>
                        </li>
                        <li>
                            <a href="index.php?mod=order&act=index&action=2">Đơn đã xử lý</a>

                        </li>
                        <li>
                            <a href="index.php?mod=order&act=index&action=3">Đơn đang giao hàng</a>

                        </li>
                        <li>
                            <a href="index.php?mod=order&act=index&action=4">Đơn đã hoàn thành</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <span class="system-menu__title">Hệ thống</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a class="show-cat-btn" href="index.php?mod=user&act=index">
                        <span class="icon user-3" aria-hidden="true"></span>Users
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="index.php?mod=user&act=index">Danh sách</a>
                        </li>
                        <li>
                            <a href="index.php?mod=user&act=createadmin">Thêm mới</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture>
                    <source srcset="assets/image/<?= $_SESSION['auth']['image'] ?>"><img src="assets/image/<?= $_SESSION['auth']['image'] ?>" alt="User name">
                </picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title"><?= $_SESSION['auth']['fullname'] ?></span>
            </div>
        </a>
    </div>
</aside>