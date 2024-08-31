<title>
	<?= session()->get('title')." | ".$title_form ?>
</title>
<link rel="stylesheet"
	href="<?php echo base_url(); ?>plugins/select2/css/select2.min.css">
<link rel="stylesheet"
	href="<?php echo base_url(); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<?php
 $transaksi = $getEditTransaksi->getRow();
	?>
<script>
	$(function() {
		document.getElementById("liNavTransaksi").classList.add("menu-open");
		document.getElementById("navTransaksi").classList.add("active");

		$("#btnBack").click(function() {
			window.location = "<?php echo base_url(); ?>transaksi";
		});

		$("#btnSubmit").click(function() {
			update();
		});

		$("#btnSubmitDetail").click(function() {
			saveDetail();
		});

		var table = new DataTable('#DataTable', {
			ajax: "<?php echo base_url(); ?>transaksi/jsonDetail/<?php echo $transaksi->id; ?>",
			columns: [{
					data: 'nama_barang'
				}, {
					data: 'jumlah'
				},
				{
					data: 'harga'
				},
				{
					data: 'total'
				},
				{
					data: 'action'
				}
			]
		});

	});

	function update() {
		$.ajax({
			url: '<?php echo base_url() ?>transaksi/update',
			method: 'post',
			data: {
				id: $('#id').val(),
				faktur: $('#faktur').val(),
				untuk: $('#untuk').val()
			},
			success: function(response) {
				if (response == '1') {
					toastr.success('Data berhasil disimpan');
				} else if (response == '2') {
					toastr.error('Data gagal disimpan');
				} else {
					toastr.error(response);
				}
			}
		});
	}

	function saveDetail() {
		$.ajax({
			url: '<?php echo base_url() ?>transaksi/saveDetail',
			method: 'post',
			data: {
				id: $('#id').val(),
				barang: $('#barang').val(),
				jumlah: $('#jumlahDetail').val()
			},
			success: function(response) {
				if (response == '1') {
					toastr.success('Data berhasil disimpan');
					setInterval(function() {
						window.location.reload();
					}, 2000);
				} else if (response == '2') {
					toastr.error('Data gagal disimpan');
				} else {
					toastr.error(response);
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
				<div class="card card-primary">
					<form id="frmUser" method="post">
						<div class="card-body">
							<div class="form-group">
								<label for="faktur">Faktur</label>
								<input type="text" class="form-control" id="faktur" name="faktur"
									value="<?php echo $transaksi->faktur; ?>"
									placeholder="Masukan Faktur">
								<input type="hidden" class="form-control" id="id" name="id"
									value="<?php echo $transaksi->id; ?>"
									placeholder="Masukan ID">
							</div>
							<div class="form-group">
								<label for="untuk">Untuk</label>
								<input type="text" class="form-control" id="untuk" name="untuk"
									value="<?php echo $transaksi->untuk; ?>"
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
			<div class="col-6">
				<div class="card card-primary">
					<div class="card-body">
						<div class="form-group">
							<label for="jumlah">Jumlah Item</label>
							<input disabled type="text" class="form-control" id="jumlah" name="jumlah"
								value="<?php echo number_format($transaksi->jumlah, 2, ",", "."); ?>"
								placeholder="Masukan Jumlah">
						</div>
						<div class="form-group">
							<label for="harga">Harga</label>
							<input disabled type="text" class="form-control" id="harga" name="harga"
								value="<?php echo number_format($transaksi->harga, 2, ",", "."); ?>"
								placeholder="Masukan Harga">
						</div>
						<div class="form-group">
							<label for="total">Total</label>
							<input disabled type="text" class="form-control" id="total" name="total"
								value="<?php echo number_format($transaksi->total, 2, ",", "."); ?>"
								placeholder="Masukan Total">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<div class="card card-primary">
					<form id="frmTransaksiDetail" method="post">
						<div class="card-body">
							<div class="form-group">
								<label for="barang">Barang</label>
								<select class="form-control" name="barang" id="barang">

									<?php
	                     foreach($getBarang->getResult() as $barang) {
	                         ?>
									<option
										value="<?php echo $barang->id; ?>">
										<?php echo $barang->nama." (Rp. ".number_format($barang->harga, 2, ",", ".").")"; ?>
									</option>
									<?php
	                     }
	?>
								</select>
							</div>
							<div class="form-group">
								<label for="jumlahDetail">Jumlah</label>
								<input type="text" class="form-control" id="jumlahDetail" name="jumlahDetail" value=""
									placeholder="Masukan Jumlah">
							</div>
						</div>
						<div class="card-footer">
							<button type="button" id="btnSubmitDetail" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-6">
				<div class="card card-primary">
					<div class="card-body">
						<table id="DataTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="text-align:center">Barang</th>
									<th style="width:10%;text-align:center">Jumlah</th>
									<th style="width:20%;text-align:left">Harga</th>
									<th style="width:20%;text-align:left">Total</th>
									<th style="width:10%;text-align:center">Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th style="text-align:center">Barang</th>
									<th style="width:10%;text-align:center">Jumlah</th>
									<th style="width:20%;text-align:left">Harga</th>
									<th style="width:20%;text-align:left">Total</th>
									<th style="width:10%;text-align:center">Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>