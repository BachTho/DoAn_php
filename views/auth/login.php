<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Du lịch và khám phá | Đăng nhập</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/image/logotitle.png" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="assets/css/style.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

</head>

<body>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <h1 class="sign-up__title">Chào mừng bạn quay lại!</h1>
      <p class="sign-up__subtitle">Đăng nhập tài khoản của bạn để tiếp tục</p>
      <form class="sign-up-form form" method="POST" action="index.php?mod=auth&act=handlelogin">
        <label class="form-label-wrapper">
          <p class="form-label">Email</p>
          <input id="inputEmail" name="email" class="form-input" type="email" placeholder="Địa chỉ email của bạn...">
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Password</p>
          <input id="inputPassword" type="password" name="password" class="form-input" type="password" placeholder="Mật khẩu của bạn...">
        </label>
        <a class="link-info forget-link" href="index.php?mod=auth&act=create">Tạo tài khoản?</a>
        <button type="submit" class="form-btn primary-default-btn transparent-btn">Đăng nhập</button>
      </form>
    </article>
  </main>
  <!-- Chart library -->
  <script src="assets/plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="assets/plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/script.js"></script>

  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

  <script>
    <?php
    if (!empty($_SESSION['empty'])) { ?>
      toastr.warning('<?php echo $_SESSION['empty']['thongtin'] ?>')
    <?php } ?>

    <?php
    if (!empty($_SESSION['success']['thongtin'])) { ?>
      toastr.success('<?php echo $_SESSION['success']['thongtin'] ?>')
    <?php } ?>

    <?php
    if (!empty($_SESSION['error']['saitkmk'])) { ?>
      toastr.error('<?php echo $_SESSION['error']['saitkmk'] ?>')
    <?php } ?>

    <?php
    if (!empty($_SESSION['success']['changepass'])) { ?>
      toastr.success('<?php echo $_SESSION['success']['changepass']  ?>');
    <?php } ?>
  </script>
</body>

</html>

<?php
if (!empty($_SESSION['success'])) {
  unset($_SESSION['success']);
}


if (!empty($_SESSION['error'])) {
  unset($_SESSION['error']);
}
if (!empty($_SESSION['empty'])) {
  unset($_SESSION['empty']);
}

?>