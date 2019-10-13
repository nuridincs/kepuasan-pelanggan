<script>
function checkPasswordMatch() {
	var password = $("#newPassword").val();
	var confirmPassword = $("#newPasswordConf").val();

	if (password != confirmPassword){
		$("#validPass").html("Passwords Tidak Sama!");
		$("#validPass").addClass("alert alert-danger");
		$("#validPass").removeClass("alert-success");
	}
	else{
		$("#validPass").html("Passwords Sesuai.");
		$("#validPass").addClass("alert alert-success");
		$("#validPass").removeClass("alert-danger");
	}
}
</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Reset Password</h1>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- /.panel-heading -->
						<div class="panel-body">
							<form method="POST" action="<?php echo site_url("control_autentikasi/reset_password");?>" role="form">
								<label for="admin">Pilih Admin</label>
								<select name="admin" class="form-control">
									<?php 
									foreach ($admin as $adminItem){
										echo "<option value=".$adminItem['idAdmin'].">".$adminItem['username']."</option>";
									}
									?>
								</select>
								<label for="newPassword">Password Baru</label>
								<input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="Isikan password baru" onKeyUp="checkPasswordMatch();" required />
								<label for="newEmailConf">Konfirmasi Password Baru</label>
								<input type="password" name="newPasswordConf" id="newPasswordConf" class="form-control" placeholder="Isikan kembali password baru" onKeyUp="checkPasswordMatch();" required /><br>
								<div id="validPass"></div><br>
								<button class="btn btn-lg btn-primary btn-block " type="submit">Reset Password</button><br>
								<?php
								if (!empty(validation_errors()) || !empty($errors)) {
									echo "<div class= \"alert alert-danger\"><ol type='1'>";
										if(!empty(validation_errors()) ) echo validation_errors("<li>", "</li>");
										if(!empty($errors)) echo "<li>".$errors."</li>";
									echo "</ol></div>";
								}else if (! empty ( $submitSukses )) {
									echo "<div class= \"alert alert-success\"><ol type='1'>";
									echo "<li>".$submitSukses."</li>\n";
									echo "</ol></div>";
								}
								?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
