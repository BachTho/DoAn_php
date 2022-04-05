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
  <form class="sign-up-form form" action="index.php?mod=category&act=update" method="POST" role="form" enctype="multipart/form-data">
     <p class="form-label" style="font-size: 20px">Cập nhật danh mục </p>
   <div class="form-group">
    <label class="form-label-wrapper">
      <p class="form-label">Danh mục</p>
      <input class="form-input" type="text" placeholder="Tên danh mục"  name="category_name"  value="<?= $success['category_name'] ?>" required>
    </label>
   
    <input type="hidden" class="form-control" id="" placeholder="" name="id"
    value="<?= $success['id'] ?>">
  </div>

 


<button type="submit" class="form-btn primary-default-btn transparent-btn">Cập nhật danh mục</button>

</form>
</main>

<?php 
require_once('views/partials/Footerbottom.php');
?>
