
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Du lịch và khám phá | Đăng ký</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/image/logotitle.png" >
  <!-- Custom styles -->
  <link rel="stylesheet" href="assets/css/style.min.css">
  <!-- toastr -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
</head>
<body>

  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <h1 class="sign-up__title">Tạo tài khoản</h1>
      <p class="sign-up__subtitle">Đăng ký để có trải nghiệm tốt nhất!!!</p>
      <form class="sign-up-form form" action="index.php?mod=auth&act=storeuser" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label class="form-label-wrapper">
            <h1></h1>
            <p class="form-label">Họ và tên</p>
            <input class="form-input" type="text" placeholder="Tên bạn ơi..." name="fullname" >
          </label>
        </div>

        <div class="form-group">
         <label class="form-label-wrapper">
          <p class="form-label">Email</p>
          <input class="form-input" type="email" placeholder="Email..." name="email"  >
        </label>
      </div>

      <div class="form-group">
       <label class="form-label-wrapper">
        <p class="form-label">Mật khẩu</p>
        <input class="form-input" type="text" placeholder="Mật khẩu..." name="password" >
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
        <p class="form-label">Số điện thoại</p>
        <input class="form-input" type="number" placeholder="Số điện thoại..." name="sdt" >
      </label>
    </div>

    <div class="form-group">
       <label class="form-label-wrapper">
        <p class="form-label">Địa chỉ</p>
        <input class="form-input" type="text" placeholder="Địa chỉ..." name="address" >
      </label>
    </div>

  <a class="link-info forget-link" href="index.php?mod=auth&act=login">Đã có tài khoản?</a>

  <button type="submit" class="form-btn primary-default-btn transparent-btn">Đăng ký</button>
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
if(!empty($_SESSION['error']['name'])) {?>
  toastr.error('<?php echo $_SESSION['error']['name'] ?>');
<?php } ?>

  <?php
if(!empty($_SESSION['error']['checkemail'])) {?>
  toastr.error('<?php echo $_SESSION['error']['checkemail'] ?>');
<?php } ?>

  <?php
if(!empty($_SESSION['error']['email'])) {?>
  toastr.error('<?php echo $_SESSION['error']['email'] ?>');
<?php } ?>

 <?php
if(!empty($_SESSION['error']['pass'])) {?>
  toastr.error('<?php echo $_SESSION['error']['pass'] ?>');
<?php } ?>
</script>
</body>

</html>
<?php

if(!empty($_SESSION['error'])){
  unset($_SESSION['error']);
}
 ?>