<footer class="footer-area section_gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 single-footer-widget">
        <h4>Về chúng tôi</h4>
        <ul>
          <li><a href="#">CƠ SỞ SẢN XUẤT ĐÀN GUITAR PHÁT QUẬN 12</a></li>
          <li><a href="#">
              <p><i class="fa fa-map-marker"></i> Đường TCH10, phường Tân Chánh Hiệp - Quận 12 - TP Hồ Chí Minh</p>
            </a></li>
          <li><a href="#">
              <p><i class="fa fa-phone"></i> 0336 418 838 - 09 7830 3446</p>
            </a></li>
          <li><a href="#">
              <p><i class="fa fa-envelope"></i> predator@gmail.com</p>
            </a></li>
        </ul>
      </div>


      <div class="col-lg-4 col-md-6 single-footer-widget">
        <h4>Thông tin</h4>
        <ul>
          <li><a href="index.php">Trang chủ</a></li>
          <li><a href="index.php?mod=home&act=about">Giới thiệu</a></li>
          <li><a href="index.php?mod=home&act=listProduct">Sản phẩm</a></li>

        </ul>
      </div>
      <div class="col-lg-4 col-md-6 single-footer-widget">
        <h4>Bản đồ</h4>
        <div class="textwidget"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.2627225393767!2d106.62407961382324!3d10.867611260478007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a1d17ab8e9f%3A0x5a34770171b59150!2zVMOibiBDaMOhbmggSGnhu4dwIDEwLCBUw6JuIENow6FuaCBIaeG7h3AsIFF14bqtbiAxMiwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1647225734992!5m2!1svi!2sus" width height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
      </div>

    </div>
    <div class="footer-bottom row align-items-center">
      <p class="footer-text m-0 col-lg-8 col-md-12">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Bản quyền &copy;<script>
          document.write(new Date().getFullYear());
        </script> Tất cả các quyền | Mẫu này được tạo bởi <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank"> Predator</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>

      <div class="col-lg-4 col-md-12 footer-social">
        <a href="https://www.facebook.com/vobachtho"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-behance"></i></a>
      </div>
    </div>
  </div>
</footer>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/home/js/popper.js"></script>
<script src="assets/home/js/bootstrap.min.js"></script>
<script src="assets/home/js/stellar.js"></script>
<script src="assets/home/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="assets/home/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="assets/home/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="assets/home/vendors/isotope/isotope-min.js"></script>
<script src="assets/home/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/home/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/home/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="assets/home/vendors/counter-up/jquery.counterup.js"></script>
<script src="assets/home/js/mail-script.js"></script>
<script src="assets/home/js/theme.js"></script>
<script>
  var list = document.getElementsById("idqty");
  console.log(list);
</script>
<!-- in ra thong bao -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
  // $('#click').on('click',function(){
  //   swal.fire(
  //     'tho pro',
  //     'tho dep zai',
  //     'cau tra loi'
  //   )
  // })
  
  <?php
  if (!empty($_SESSION['success']['cart'])) { ?>
  toastr.success('<?php echo $_SESSION['success']['cart'] ?>')
   
  <?php } ?>
  <?php
  if (!empty($_SESSION['error']['cart'])) { ?>
  toastr.error('<?php echo $_SESSION['error']['cart'] ?>')
   
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
?>