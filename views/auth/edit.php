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

  <form class="sign-up-form form" action="index.php?mod=user&act=update" method="POST" role="form" enctype="multipart/form-data">
    <p class="form-label" style="font-size: 20px">Cập nhật tài khoản </p>
    <div class="form-group">
      <label class="form-label-wrapper">
        <p class="form-label">Name</p>
        <input class="form-input"  type="text" placeholder=""  name="fullname"  value="<?= $success['fullname'] ?>" required>
      </label>
      <input type="hidden" class="form-control" id="" placeholder="" name="id"
      value="<?= $success['id'] ?>">
    </div>

    <div class="form-group">
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" id="email" type="text" placeholder=""  name="email"  value="<?= $success['email'] ?>" required>
      </label>
      
    </div>

    <!-- <div class="form-group">
      <label class="form-label-wrapper">
        <p class="form-label">Mật khẩu</p>
        <input class="form-input" id="password" type="text" placeholder=""  name="password"  value="<?= md5($success['password']) ?>" required>
      </label>
    </div> -->

    <div class="form-group">
      <label class="form-label-wrapper">
        <p class="form-label">Quyền</p>
        <select  class="form-input" name="role_id">
          <option value="<?= $success['role_id'] ?>">
            <?php
            if( $success['role_id'] ==0){
             echo "Admin";
           }
           else if( $success['role_id'] ==1) {
            echo "Nhân viên";
          }
          else if( $success['role_id'] ==2) {
            echo "Khách hàng";
          } ?>
        </option>
        <option value="0">Admin</option>
        <option value="1">Nhân viên</option>
        <option value="2">Khách hàng</option>
      </select>
    </label>
  </div>

  <div class="form-group">
      <label class="form-label-wrapper">
        <p class="form-label">SĐT</p>
        <input class="form-input"  type="text" placeholder=""  name="sdt"  value="<?= $success['sdt'] ?>" required>
      </label>
    </div>

    <div class="form-group">
      <label class="form-label-wrapper">
        <p class="form-label">Địa chỉ</p>
        <input class="form-input"  type="text" placeholder=""  name="address"  value="<?= $success['address'] ?>" required>
      </label>
    </div>

  <div class="form-group">
   
   <label class="form-label-wrapper">
    <p class="form-label">Ảnh</p>
    <img src="assets/image/<?= $success['image'] ?>" alt="" width="150px" height="150px " style="margin-bottom:1%">
    <input type="file" class="form-input" id="" placeholder="" name="image" value="<?= $success['image'] ?>">
  </label>
</div>

<button type="submit" class="form-btn primary-default-btn transparent-btn">Cập nhật danh mục</button>

</form>
</main>

<?php 
require_once('views/partials/Footerbottom.php');
?>