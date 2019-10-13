<script>
function checkEmailMatch() {
	var password = $("#newEmail").val();
	var confirmPassword = $("#newEmailConf").val();

	if (password != confirmPassword){
		$("#validEmail").html("Email Tidak Sama!");
		$("#validEmail").addClass("alert alert-danger");
		$("#validEmail").removeClass("alert-success");
	}
	else{
		$("#validEmail").html("Email Sesuai.");
		$("#validEmail").addClass("alert alert-success");
		$("#validEmail").removeClass("alert-danger");
	}
}
</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Ubah Email</h1>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<!-- /.panel-heading -->
						<div class="panel-body">
							<form method="POST" action="<?php echo site_url("control_autentikasi/ubah_email");?>" role="form">
								<input type="hidden" name="idAdmin" value="<?php echo $id; ?>" readonly>
								<label for="password">Isikan Password</label>
								<input type="password" name="password" class="form-control" placeholder="Isikan password Anda" required autofocus />
								<label for="newEmail">Email Baru</label>
								<input type="email" name="newEmail" id="newEmail" value="<?php echo set_value('newEmail')?>" class="form-control" placeholder="Isikan email baru" onKeyUp="checkEmailMatch();" required />
								<label for="newEmailConf">Konfirmasi Email Baru</label>
								<input type="email" name="newEmailConf" id="newEmailConf" value="<?php echo set_value('newEmailConf')?>" class="form-control" placeholder="Isikan kembali email baru" onKeyUp="checkEmailMatch();" required /><br>
								<div id="validEmail"></div><br>
								<button class="btn btn-lg btn-primary btn-block " type="submit">Ubah Email</button><br>
								<?php
								$validasi = validation_errors();
								if (!empty($validasi) || !empty($errors)) {
									echo "<div class= \"alert alert-danger\"><ol type='1'>";
										if(!empty($validasi)) echo validation_errors("<li>", "</li>");
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
