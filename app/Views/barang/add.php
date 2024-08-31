<title>
	<?= session()->get('title')." | ".$title_form ?>
</title>
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script>
	$(function() {
		document.getElementById("liNavMasterData").classList.add("menu-open");
		document.getElementById("navMasterData").classList.add("active");
		document.getElementById("navBarang").classList.add("active");

		$("#btnBack").click(function() {
			window.location = "<?php echo base_url(); ?>barang";
		});

		$("#btnSubmit").click(function() {
			save();
		});
	});

	function save() {
		$.ajax({
			url: '<?php echo base_url() ?>barang/save',
			method: 'post',
			data: {
				kode: $('#kode').val(),
				nama: $('#nama').val(),
				satuan: $('#satuan').val(),
				stok: $('#stok').val(),
				harga: $('#harga').val()
			},
			success: function(response) {
				if (response == '1') {
					$("#divAlert").css('display', 'none');
					$("#divAlertSuccess").css('display', 'block');
					$("#divAlertSuccess").html('Data berhasil disimpan');

					setInterval(function() {
						window.location.href =
							"<?php echo base_url(); ?>barang"
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
				<div class="alert alert-danger alert-dismissible" id="divAlert" style="display:none"></div>
				<div class="alert alert-info alert-dismissible" id="divAlertInfo" style="display:none"></div>
				<div class="alert alert-success alert-dismissible" id="divAlertSuccess" style="display:none"></div>
				<div class="card card-primary">
					<form id="frmUser" method="post">
						<div class="card-body">
							<div class="form-group">
								<label for="kode">Kode</label>
								<input type="text" class="form-control" id="kode" name="kode" value=""
									placeholder="Masukan Kode">
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" value=""
									placeholder="Masukan Nama User">
							</div>
							<div class="form-group">
								<label for="satuan">Satuan</label>
								<input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
							</div>
							<div class="form-group">
								<label for="stok">Stok</label>
								<input type="text" class="form-control" id="stok" name="stok" value=""
									placeholder="Masukan Stok">
							</div>
							<div class="form-group">
								<label for="harga">Harga</label>
								<input type="text" class="form-control" id="harga" name="harga" value=""
									placeholder="Masukan Harga">
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