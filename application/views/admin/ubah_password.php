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
			<h1 class="page-header">Ubah Password</h1>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- /.panel-heading -->
						<div class="panel-body">
							<form method="POST" action="<?php echo site_url("control_autentikasi/ubah_password");?>" role="form">
								<input type="hidden" name="idAdmin" value="<?php echo $id; ?>" readonly>
								<label for="oldPassword">Password Lama</label>
								<input type="password" name="oldPassword" class="form-control" placeholder="Isikan password lama" required autofocus />
								<label for="newPassword">Password Baru</label>
								<input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="Isikan password baru" onKeyUp="checkPasswordMatch();" required />
								<label for="newPasswordConf">Konfirmasi Password Baru</label>
								<input type="password" name="newPasswordConf" id="newPasswordConf" class="form-control" placeholder="Isikan kembali password baru" onKeyUp="checkPasswordMatch();" required /><br>
								<div id="validPass"></div><br>
								<button class="btn btn-lg btn-primary btn-block " type="submit">Ubah Password</button><br>
								<?php
								$validasi = validation_errors();
								if (!empty($validasi) || !empty($errors)) {
									echo "<div class= \"alert alert-danger\"><ol type='1'>";
										if(!empty($validasi) ) echo validation_errors("<li>", "</li>");
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
