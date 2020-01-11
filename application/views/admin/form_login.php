<div class= "container">
	<form class="form-login" method="POST" action="<?php echo site_url("autentikasi/login");?>" role="form">
		<input type="hidden" name="location" value="<?php if(isset($location)) echo htmlspecialchars($location); ?>" readonly>
		<label for="username">Username</label>
		<input type="text" name="username" value="<?php echo set_value('username')?>" class="form-control" placeholder="Masukan Username" required autofocus />
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control" placeholder="Masukan Password" required />
		<h5>Captcha</h5>
		<div class="wrapper-captcha">
			<?= $captcha ?>
		</div><br>
		<input type="text" name="captcha" class="form-control" placeholder="Masukan Captcha" required /><br>
		<input type="hidden" name="captcha_temporary" value="<?= $captcha ?>" class="form-control" />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button><br>
		<a href="<?php echo base_url("");?>">Kembali Ke Laman Kuisioner</a>
		<?php
		$validasi = validation_errors();
		if (!empty($validasi) || !empty($errors)) {
			echo "<div class= \"alert alert-danger\"><ol type='1'>";
				if(!empty($validasi) ) echo validation_errors("<li>", "</li>");
				if(!empty($errors)) echo "<li>".$errors."</li>";
			echo "</ol></div>";
		}
		?>
	</form>
</div>
<style>
.wrapper-captcha{
	margin: auto;
	padding: 5px;
	text-align: center;
	background: #cecece;
	pointer-events: none;
	font-size: 25px;
	user-select: none;
}
</style>