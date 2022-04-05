<!-- ! Footer -->
<footer class="footer">
	<div class="container footer--flex">
		<div class="footer-start">
			<p>2022 © Predator - <a href="https://www.facebook.com/profile.php?id=100010867245928" target="_blank" rel="noopener noreferrer">Predator.com</a></p>
		</div>

	</div>
</footer>
</div>
</div>
<!-- Chart library -->
<script src="assets/plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="assets/plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="assets/js/script.js"></script>

<!-- in ra thong bao -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script>
	<?php
	if (!empty($_SESSION['error']['email'])) { ?>
		toastr.error('<?php echo $_SESSION['error']['email'] ?>');
	<?php } ?>

	<?php
	if (!empty($_SESSION['error']['price'])) { ?>
		toastr.error('<?php echo $_SESSION['error']['price'] ?>');
	<?php } ?>

	<?php if (isset($_COOKIE['success'])) { ?>
		toastr.success("<?php echo $_COOKIE['success'];
						unset($_SESSION['success']) ?>")
	<?php } ?>

	<?php if (isset($_COOKIE['update'])) { ?>
		toastr.success("<?php echo $_COOKIE['update'];
						unset($_SESSION['update']) ?>")
	<?php } ?>
	<?php if (isset($_COOKIE['delete'])) { ?>
		toastr.success("<?php echo $_COOKIE['delete'];
						unset($_SESSION['delete']) ?>")
	<?php } ?>

</script>
<!-- tạo cái ckeditor ghi nội dung -->
<script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('content');
</script>
</body>

</html>

<?php
if (!empty($_SESSION['error'])) {
	unset($_SESSION['error']);
}
?>