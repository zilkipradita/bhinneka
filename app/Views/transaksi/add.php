<title>
	<?= session()->get('title')." | ".$title_form ?>
</title>
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script>
	$(function() {
		document.getElementById("liNavTransaksi").classList.add("menu-open");
		document.getElementById("navTransaksi").classList.add("active");

		$("#btnBack").click(function() {
			window.location = "<?php echo base_url(); ?>transaksi";
		});

		$("#btnSubmit").click(function() {
			save();
		});
	});

	function save() {
		$.ajax({
			url: '<?php echo base_url() ?>transaksi/save',
			method: 'post',
			data: {
				faktur: $('#faktur').val(),
				untuk: $('#untuk').val()
			},
			success: function(response) {
				if (response == '2') {
					$("#divAlertSuccess").css('display', 'none');
					$("#divAlert").css('display', 'block');
					$("#divAlert").html('Data gagal disimpan');
				} else if (response == '3') {
					$("#divAlertSuccess").css('display', 'none');
					$("#divAlert").css('display', 'block');
					$("#divAlert").html('Silahkan isi kolom Faktur dan Untuk');
				} else {
					$("#divAlert").css('display', 'none');
					$("#divAlertSuccess").css('display', 'block');
					$("#divAlertSuccess").html('Data berhasil disimpan');

					setInterval(function() {
						window.location.href =
							"<?php echo base_url(); ?>transaksi/edit/" +
							response
					}, 2000);

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
								<label for="faktur">Faktur</label>
								<input type="text" class="form-control" id="faktur" name="faktur" value=""
									placeholder="Masukan Faktur">
							</div>
							<div class="form-group">
								<label for="untuk">Untuk</label>
								<input type="text" class="form-control" id="untuk" name="untuk" value=""
									placeholder="Masukan Untuk">
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