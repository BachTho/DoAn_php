<?php
require_once('views/partials/Header.php');
?>
<?php
require_once('views/partials/Sidebar.php');
?>
<?php
require_once('views/partials/Footertop.php');
?>
<main class="main users chart-page" id="skip-target">
	<div class="container">
		<h2 class="main-title">Bài viết</h2>
		<div class="main-nav-start">
			<form action="index.php?mod=product&act=index" method="POST" class="form-inline my-2 my-lg-0 header-search">
				<div class="search-wrapper ">
					<input class="form-control mr-sm-2" type="text" placeholder="Tìm sản phẩm..." name="product_name">
					<i data-feather="search" aria-hidden="true"></i>
				</div>
			</form>
		</div>
		<div class="row">
			<div class="col-lg-12 " style="margin-top:2%">
				<div class="users-table table-wrapper">
					<table class="posts-table">
						<thead>
							<tr class="users-table-info">
								<th> <label class="users-table__checkbox ms-20">
										Danh mục
									</label></th>
								<th>Tên sản phẩm</th>
								<th>Ảnh</th>

								<th>Giá gốc</th>
								<th>Giá khuyến mãi</th>
								<th>Số lượng</th>
								<th>Người tạo</th>
								<th>Trạng thái</th>
								<th>Ngày tạo</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($products as $product) { ?>
								<tr>
									<td><?= $product['categoryname'] ?></td>
									<td>
										<span class="badge-pending"><a href="?mod=home&act=detailProduct&id=<?= $product['id'] ?>"> <?= $product['product_name'] ?></a></span>
									</td>
									<td>
										<div class="categories-table-img">
											<picture>
												<source srcset="assets/image/<?= $product['image'] ?>"><img src="assets/image/<?= $product['image'] ?>" alt="post">
											</picture>
										</div>

									</td>

									<td><?= $product['originalprice'] ?></td>
									<td><?= $product['promotionalprice'] ?></td>

									<td><?= $product['amount'] ?></td>
									<td><?= $product['username'] ?></td>
									<td><?= $product['status'] ?></td>
									<td><?= date('d/m/Y', strtotime($product['create_at'])) ?></td>

									<td>
										<span class="p-relative">
											<button class="dropdown-btn transparent-btn" type="button" title="More info">
												<div class="sr-only">More info</div>
												<i data-feather="more-horizontal" aria-hidden="true"></i>
											</button>
											<ul class="users-item-dropdown dropdown">
												<li><a href="index.php?mod=product&act=edit&id=<?= $product['id'] ?>">Sửa</a></li>
												<li><a href="index.php?mod=product&act=xoa1&id=<?= $product['id'] ?>">Xóa</a></li>
												<li><a href="index.php?mod=product&act=activate&id=<?= $product['id'] ?>"><?= $product['activate'] ?>
													</a></li>
											</ul>
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