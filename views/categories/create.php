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

   <form  class="sign-up-form form" action="index.php?mod=category&act=store" method="POST" role="form" enctype="multipart/form-data">
     <p class="form-label" style="font-size: 20px">Tạo danh mục</p>
    <div class="form-group">
       <label class="form-label-wrapper">
        <p class="form-label">Tên danh mục</p>
        <input class="form-input" type="text" placeholder="Tên danh mục" name="category_name" required>
      </label>
    </div>

     <button type="submit" class="form-btn primary-default-btn transparent-btn">Thêm danh mục</button>
    
</form>
 
</main>
<?php 
require_once('views/partials/Footerbottom.php');
?>