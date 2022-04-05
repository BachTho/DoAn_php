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

    <form class="sign-up-form form" action="index.php?mod=product&act=update" method="POST" role="form" enctype="multipart/form-data">
       <p class="form-label" style="font-size: 20px">Cập nhật sản phẩm </p>
       <div class="form-group">
          <input type="hidden" class="form-input" id="" placeholder="" name="id"
  value="<?= $success['id'] ?>">
           <label class="form-label-wrapper">
            <p class="form-label">Danh mục</p>
            <select  class="form-input" name="category_id">
              <?php foreach ($categories as $key => $value) {
               ?>
               <option value="<?= $value['id'] ?>"<?php if($success['category_id'] == $value['id']){ echo 'selected';} ?>><?= $value['category_name']  ?></option>
           <?php } ?>
       </select>
   </label>
</div>

<div class="form-group">
  <label class="form-label-wrapper">
    <p class="form-label">Tên sản phẩm</p>
      <input class="form-input" id="title" type="text" placeholder="Tên sản phẩm"  name="product_name"  value="<?= $success['product_name'] ?>" required>
  </label>
</div>

<div class="form-group">
 <label class="form-label-wrapper">
  <p class="form-label">Giá gốc</p>
  <input class="form-input" type="text" placeholder="Tên sản phẩm"  name="originalprice"  value="<?= $success['originalprice'] ?>" required>
  
</label>
</div>

<div class="form-group">
 <label class="form-label-wrapper">
  <p class="form-label">Giá khuyến mãi</p>
  <input class="form-input" id="title" type="text" placeholder="Tên sản phẩm"  name="promotionalprice"  value="<?= $success['promotionalprice'] ?>" required>
</label>
</div>

<div class="form-group">
 <label class="form-label-wrapper">
  <p class="form-label">Số lượng</p>
  <input class="form-input" id="title" type="text" placeholder="Số lượng sản phẩm"  name="amount"  value="<?= $success['amount'] ?>" required>
</label>
</div>

<div class="form-group">
 <label class="form-label-wrapper">
  <p class="form-label">Nội dung</p>
  <textarea  name="content" class="form-control" id="content" cols="40" rows="10" ><?= $success['content'] ?></textarea>
  
</label>
</div>

<div class="form-group">
   <label class="form-label-wrapper">
    <p class="form-label">Ảnh sản phẩm thứ 1</p>
    <img src="assets/image/<?= $success['image'] ?>" alt="" width="150px" height="150px " style="margin-bottom:1%">
    <input type="file" class="form-input" id="" placeholder="" name="image" value="<?= $success['image'] ?>">
</label>
</div>

<div class="form-group">
   <label class="form-label-wrapper">
    <p class="form-label">Ảnh sản phẩm thứ 2</p>
    <img src="assets/image/<?= $success['image1'] ?>" alt="" width="150px" height="150px " style="margin-bottom:1%">
    <input type="file" class="form-input" id="" placeholder="" name="image1" value="<?= $success['image1'] ?>">
</label>
</div>


<div class="form-group">
   <label class="form-label-wrapper">
    <p class="form-label">Ảnh sản phẩm thứ 3</p>
    <img src="assets/image/<?= $success['image2'] ?>" alt="" width="150px" height="150px " style="margin-bottom:1%">
    <input type="file" class="form-input" id="" placeholder="" name="image2" value="<?= $success['image2'] ?>">
</label>
</div>





<button style="margin-top:1%" type="submit" class="form-btn primary-default-btn transparent-btn">Cập nhật bài viết</button>
</form>
</main>

<?php 
require_once('views/partials/Footerbottom.php');
?>