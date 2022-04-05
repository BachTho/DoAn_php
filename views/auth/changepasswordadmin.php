<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Du lịch và khám phá | Đăng ký</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/image/logotitle.png">
	<!-- Custom styles -->
	<link rel="stylesheet" href="assets/css/style.min.css">
	<!-- toastr -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>

<body>
	<div class="layer"></div>
	<main class="page-center">
		<article class="sign-up">
			<h1 class="sign-up__title">Thay đổi mật khẩu</h1>
			<p class="sign-up__subtitle"> <?= $_SESSION['auth']['fullname'] ?> có chắc muốn đổi chứ!!!</p>
			<form class="sign-up-form form" action="index.php?mod=auth&act=updateadmin" method="POST" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label class="form-label-wrapper">
						<p class="form-label">Mật khẩu cũ</p>
						<input class="form-input" name='oldpass' placeholder="Mật khẩu cũ...">
						<input type="hidden" class="form-control" id="" placeholder="" name="id" value="<?= $_SESSION['auth']['id'] ?>">
					</label>
				</div>
				<div class="form-group">
					<label class="form-label-wrapper">
						<p class="form-label">Mật khẩu mới</p>
						<input  class="form-input" name="newpass" placeholder="Mật khẩu mới...">
					</label>
				</div>
				<div class="form-group">
					<label class="form-label-wrapper">
						<p class="form-label">Xác nhận mật khẩu</p>
						<input class="form-input" name="confirmpass" placeholder="Xác nhận mật khẩu...">
					</label>
				</div>
				<a class="link-info forget-link" href="index.php?mod=category&act=index">Quay lại?</a>

				<button type="submit" class="form-btn primary-default-btn transparent-btn">Đổi mật khẩu</button>
			</form>
			</form>
		</article>
	</main>
	<script src="assets/plugins/chart.min.js"></script>
	<!-- Icons library -->
	<script src="assets/plugins/feather.min.js"></script>
	<!-- Custom scripts -->
	<script src="assets/js/script.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	<script>
		<?php
		if (!empty($_SESSION['error']['oldpass'])) { ?>
			toastr.error('<?php echo $_SESSION['error']['oldpass'] ?>');
		<?php } ?>

		<?php
		if (!empty($_SESSION['error']['checkoldpass'])) { ?>
			toastr.error('<?php echo $_SESSION['error']['checkoldpass'] ?>');
		<?php } ?>

		<?php
		if (!empty($_SESSION['error']['newpass'])) { ?>
			toastr.error('<?php echo $_SESSION['error']['newpass'] ?>');
		<?php } ?>

		<?php
		if (!empty($_SESSION['error']['confirmpass'])) { ?>
			toastr.error('<?php echo $_SESSION['error']['confirmpass'] ?>');
		<?php } ?>

		<?php
		if (!empty($_SESSION['error']['checkpass'])) { ?>
			toastr.error('<?php echo $_SESSION['error']['checkpass'] ?>');
		<?php } ?>
	</script>
</body>

</html>
<?php

if (!empty($_SESSION['error'])) {
	unset($_SESSION['error']);
}
?>