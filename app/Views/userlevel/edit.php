<title>
	<?= session()->get('title')." | ".$title_form ?>
</title>
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script>
	$(function() {
		document.getElementById("liNavUserManagement").classList.add("menu-open");
		document.getElementById("navUserManagement").classList.add("active");
		document.getElementById("navUserLevel").classList.add("active");

		$("#btnBack").click(function() {
			window.location =
				"<?php echo base_url(); ?>userlevel";
		});

		$("#btnSubmit").click(function() {
			update();
		});

		var nama_user_level = document.getElementById("nama_user_level");
		nama_user_level.addEventListener("keypress", function(event) {
			if (event.key === "Enter") {
				event.preventDefault();
				update();
			}
		});
	});

	function update() {
		$.ajax({
			url: '<?php echo base_url() ?>userlevel/update',
			method: 'post',
			data: {
				id_user_level: $('#id_user_level').val(),
				nama_user_level: $('#nama_user_level').val()
			},
			success: function(response) {

				if (response == '1') {
					$("#divAlert").css('display', 'none');
					$("#divAlertSuccess").css('display', 'block');
					$("#divAlertSuccess").html('Data berhasil disimpan');

					setInterval(function() {
						window.location.href =
							"<?php echo base_url(); ?>userlevel"
					}, 2000);

				} else if (response == '2') {
					$("#divAlertSuccess").css('display', 'none');
					$("#divAlert").css('display', 'block');
					$("#divAlert").html('Data gagal disimpan');
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

				<?php
              $user = $getEditUserLevel->getRow();
	?>

				<div class="alert alert-danger alert-dismissible" id="divAlert" style="display:none"></div>
				<div class="alert alert-info alert-dismissible" id="divAlertInfo" style="display:none"></div>
				<div class="alert alert-success alert-dismissible" id="divAlertSuccess" style="display:none"></div>
				<div class="card card-primary">
					<form id="frmLevel" method="post">
						<div class="card-body">
							<div class="form-group">
								<label for="nama_user_level">Nama</label>
								<input type="text" class="form-control" id="nama_user_level" name="nama_user_level"
									value="<?php echo $user->nama_user_level; ?>"
									placeholder="Masukan Nama Level">
								<input type="hidden" class="form-control" id="id_user_level" name="id_user_level"
									value="<?php echo $user->id_user_level; ?>">
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