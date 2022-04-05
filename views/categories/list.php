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
		<h2 class="main-title">Danh mục</h2>
		<div class="main-nav-start">
			<form action="index.php?mod=category&act=index" method="POST" class="form-inline my-2 my-lg-0 header-search">
				<div class="search-wrapper ">
					<input class="form-control mr-sm-2" type="text" placeholder="Danh mục ..." name="category_name">
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

								<th>Tên danh mục</th>
								<th>Trạng thái</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($categories as $category) { ?>
								<tr>
									<td><span class="badge-pending"><a href=""> <?= $category['category_name'] ?></a></span></td>
									<td><?= $category['status'] ?></td>
									<td>
										<span class="p-relative">
											<button class="dropdown-btn transparent-btn" type="button" title="More info">
												<div class="sr-only">More info</div>
												<i data-feather="more-horizontal" aria-hidden="true"></i>
											</button>
											<ul class="users-item-dropdown dropdown">
												<li><a href="index.php?mod=category&act=edit&id=<?= $category['id'] ?>">Sửa</a></li>
												<li><a href="index.php?mod=category&act=xoa1&id=<?= $category['id'] ?>">Xóa</a></li>
												<li><a href="index.php?mod=category&act=activate&id=<?= $category['id'] ?>"><?= $category['activate'] ?>
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