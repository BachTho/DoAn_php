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

	<form class="sign-up-form form"  action="index.php?mod=user&act=store" method="POST" role="form" enctype="multipart/form-data">
		<p class="form-label" style="font-size: 20px">Tạo tài khoản</p>
		<div class="form-group">
			<label class="form-label-wrapper">
				<p class="form-label">Họ và tên</p>
				<input class="form-input" type="text" placeholder="Tên bạn ơi..." name="fullname" required>
			</label>
		</div>

		<div class="form-group">
			<label class="form-label-wrapper">
				<p class="form-label">Email</p>
				<input class="form-input" type="email" placeholder="Email..." name="email" required>
			</label>
		</div>

		<div class="form-group">
			<label class="form-label-wrapper">
				<p class="form-label">Quyền</p>
				<select  class="form-input" name="role_id">
					<option value="0">Admin</option>
					<option value="1">Nhân viên</option>
					<option value="2">Khách</option>
				</select>
			</label>
		</div>

		<div class="form-group">
			<label class="form-label-wrapper">
				<p class="form-label">Ảnh</p>
				<input type="file" class="form-input" id="" placeholder="" name="image">
			</label>
		</div>
		
		<div class="form-group">
			<label class="form-label-wrapper">
				<p class="form-label">Sớ điện thoại</p>
				<input class="form-input" type="number" placeholder="Số điện thoại..." name="sdt" required>
			</label>
		</div>
		
		<div class="form-group">
			<label class="form-label-wrapper">
				<p class="form-label">Địa chỉ</p>
				<input class="form-input" type="text" placeholder="Địa chỉ..." name="address" required>
			</label>
		</div>
		<button type="submit" class="form-btn primary-default-btn transparent-btn">Tạo tài khoản mới</button>
	</form>
</main>

<?php 
require_once('views/partials/Footerbottom.php');
?>