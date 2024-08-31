<title>
	<?= session()->get('title')." | ".$title_form ?>
</title>
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script>
	$(function() {
		document.getElementById("liNavUserManagement").classList.add("menu-open");
		document.getElementById("navUserManagement").classList.add("active");
		document.getElementById("navUser").classList.add("active");

		$("#btnBack").click(function() {
			window.location = "<?php echo base_url(); ?>user";
		});

		$("#btnSubmit").click(function() {
			save();
		});
	});

	function save() {
		$.ajax({
			url: '<?php echo base_url() ?>user/save',
			method: 'post',
			data: {
				username: $('#username').val(),
				password: $('#password').val(),
				password2: $('#password2').val(),
				id_user_level: $('#id_user_level').val(),
				nama: $('#nama').val(),
				telp: $('#telp').val(),
				email: $('#email').val()
			},
			success: function(response) {

				if (response == '1') {
					$("#divAlert").css('display', 'none');
					$("#divAlertSuccess").css('display', 'block');
					$("#divAlertSuccess").html('Data berhasil disimpan');

					setInterval(function() {
						window.location.href =
							"<?php echo base_url(); ?>user"
					}, 2000);

				} else if (response == '2') {
					$("#divAlertSuccess").css('display', 'none');
					$("#divAlert").css('display', 'block');
					$("#divAlert").html('Data gagal disimpan');
				} else if (response == '3') {
					$("#divAlertSuccess").css('display', 'none');
					$("#divAlert").css('display', 'block');
					$("#divAlert").html(
						'Username yang anda masukan sudah digunakan</br>Silahkan masukan Username yang lain'
					);
				} else {
					$("#divAlertSuccess").css('display', 'none');
					$("#divAlert").css('display', 'block');
					$("#divAlert").html(response);
				}
			}
		});
	}
</script>
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0"><?= $title_form; ?></h1>
			</div>
		</div>
	</div>
</div>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="alert alert-danger alert-dismissible" id="divAlert" style="display:none"></div>
				<div class="alert alert-info alert-dismissible" id="divAlertInfo" style="display:none"></div>
				<div class="alert alert-success alert-dismissible" id="divAlertSuccess" style="display:none"></div>
				<div class="card card-primary">
					<form id="frmUser" method="post">
						<div class="card-body">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" value=""
									placeholder="Masukan Username">
							</div>

							<div class="form-group">
								<label for="username">Password</label>
								<input type="password" class="form-control" id="password" name="password"
									placeholder="Password">
							</div>

							<div class="form-group">
								<label for="username">Konfirmasi Password</label>
								<input type="password" class="form-control" id="password2" name="password2"
									placeholder="Password">
							</div>

							<div class="form-group">
								<label for="id_user_level">Level</label>
								<select class="form-control" name="id_user_level" id="id_user_level">

									<?php
                     foreach($getUserLevel->getResult() as $user_level) {
                         if(session()->get('id_user_level')=='1') {
                             ?>
									<option
										value="<?php echo $user_level->id_user_level; ?>">
										<?php echo $user_level->nama_user_level; ?>
									</option>
									<?php
                         } elseif(session()->get('id_user_level')=='2') {
                             if($user_level->id_user_level<>'1' and $user_level->id_user_level<>'2') {
                                 ?>
									<option
										value="<?php echo $user_level->id_user_level; ?>">
										<?php echo $user_level->nama_user_level; ?>
									</option>
									<?php
                             }
                         }
                     }
	?>

								</select>
							</div>

							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" value=""
									placeholder="Masukan Nama User">
							</div>
							<div class="form-group">
								<label for="nama">Telepon</label>
								<input type="text" class="form-control" id="telp" name="telp" value=""
									placeholder="Masukan No Telepon User">
							</div>
							<div class="form-group">
								<label for="nama">Email</label>
								<input type="text" class="form-control" id="email" name="email" value=""
									placeholder="Masukan Email User">
							</div>
						</div>
						<div class="card-footer">
							<button type="button" id="btnBack" class="btn btn-primary">Back</button>
							<button type="button" id="btnSubmit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>