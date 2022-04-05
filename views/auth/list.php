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
		<h2 class="main-title">Tài khoản</h2>
		 <div class="main-nav-start">
      	<form action="index.php?mod=user&act=index" method="POST" class="form-inline my-2 my-lg-0 header-search">
		 		<div class="search-wrapper ">
		 			<input class="form-control mr-sm-2" type="text" placeholder="Tìm tên người dùng..." name="fullname" >
		 			<i data-feather="search" aria-hidden="true"></i>
		 		</div>
		 	</form>
    </div>
		<div class="row">
			<div class="col-lg-12 " style="margin-top: 2%">
				<div class="users-table table-wrapper">
					<table class="posts-table">
						<thead>
							<tr class="users-table-info">
								<th>
									<label class="users-table__checkbox ms-20">
										Ảnh
									</label>
								</th>
								<th>Họ và tên</th>
								<th>Email</th>
								<th>STĐ</th>
								<th>Quyền</th>
								<th>Trạng thái</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $user) { ?>
							<tr>
								<td>
										<div class="categories-table-img">
											<picture><source srcset="assets/image/<?= $user['image'] ?>" type="image/webp"><img src="assets/image/<?= $user['image'] ?>" alt="user"></picture>
											</div>
									</td>
									<td><span class="badge-pending"><a href=""> <?= $user['fullname'] ?></a></span></td>
										<td><?= $user['email'] ?></td>
										<td><?= $user['sdt'] ?></td>
										<td><?= $user['role_id'] ?></td>
										<td><?= $user['status']?></td>
										<td>
											<span class="p-relative">
												<button class="dropdown-btn transparent-btn" type="button" title="More info">
													<div class="sr-only">More info</div>
													<i data-feather="more-horizontal" aria-hidden="true"></i>
												</button>
												<ul class="users-item-dropdown dropdown">
													<li><a href="index.php?mod=user&act=edit&id=<?= $user['id'] ?>">Sửa</a></li>
													<?php if($_SESSION['auth']['id'] == $user['id'] ){ ?>
													<li ><b>Bạn không thể tự xóa tài khoản mình </b></li>
												<?php	} else {  ?>
													<li ><a  href="index.php?mod=user&act=delete&id=<?= $user['id'] ?>">Xóa</a></li>
													<?php } ?>
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