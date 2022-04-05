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
		<h2 class="main-title">Đơn hàng </h2>
		<div class="main-nav-start">
			<form action="index.php?mod=category&act=index" method="POST" class="form-inline my-2 my-lg-0 header-search">
				<div class="search-wrapper ">
					<input class="form-control mr-sm-2" type="text" placeholder="Đơn hàng ..." name="name">
					<i data-feather="search"></i>
				</div>
			</form>
		</div>
		<div class="row">
			<div class="col-lg-12 " style="margin-top: 2%">
				<div class="users-table table-wrapper">
					<table class="posts-table">
						<thead>
							<tr class="users-table-info">
								<th>Mã đơn hàng</th>
								
								<th>Tổng số tiền</th>
								<th>Trạng thái</th>
								<th>Ngày tạo</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php

							foreach ($ListOrder as $order) { ?>
								<tr>
									<td><?= $order['id'] ?></td>
									<td><?= $order['total'] ?></td>
									<td><?= $order['status'] ?></td>
									<td><?= date('d/m/Y', strtotime($order['create_at'])) ?></td>
									<td>
										<span class="p-relative">
											<button class="dropdown-btn transparent-btn" type="button" title="More info">
												<div class="sr-only">More info</div>
												<i data-feather="more-horizontal" aria-hidden="true"></i>
											</button>
											<?php if ($order['status'] =='Đang chờ duyệt') {  ?>
												<ul class="users-item-dropdown dropdown">
													<li><a href="index.php?mod=order&act=orderDetail&id=<?= $order['id'] ?>">Chi tiết</a></li>
													
													<li><a href="index.php?mod=order&act=update&id=<?= $order['id'] ?>">Xác nhận</a></li>
												
												</ul>
											<?php } else if ($order['status'] == 'Đã duyệt') {  ?>
												<ul class="users-item-dropdown dropdown">
													<li><a href="index.php?mod=order&act=orderDetail&id=<?= $order['id'] ?>">Chi tiết</a></li>
													<li><a href="index.php?mod=order&act=update&id=<?= $order['id'] ?>">Giao hàng</a></li>
												</ul>
											<?php } else if ($order['status'] == 'Đang giao hàng') {  ?>
												<ul class="users-item-dropdown dropdown">
													<li><a href="index.php?mod=order&act=orderDetail&id=<?= $order['id'] ?>">Chi tiết</a></li>
												</ul>

											<?php } else { ?>
												<ul class="users-item-dropdown dropdown">
													<li><a href="index.php?mod=order&act=orderDetail&id=<?= $order['id'] ?>">Chi tiết</a></li>
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