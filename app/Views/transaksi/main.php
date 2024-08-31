<title>
	<?= session()->get('title')." | ".$title_form ?>
</title>
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script>
	$(function() {
		document.getElementById("liNavTransaksi").classList.add("menu-open");
		document.getElementById("navTransaksi").classList.add("active");

		var table = new DataTable('#DataTable', {
			dom: 'Bfrtip',
			buttons: [{
				text: 'Add',
				action: function(e, dt, node, config) {
					window.location =
						"<?php echo base_url(); ?>transaksi/add";
				}
			}, {
				text: 'Refresh',
				action: function(e, dt, node, config) {
					table.ajax.reload();
					toastr.success('Refresh data berhasil ');
				}
			}, 'excel', "pdf", "print"],
			ajax: "<?php echo base_url(); ?>transaksi/json",
			columns: [{
					data: 'id'
				}, {
					data: 'faktur'
				},
				{
					data: 'untuk'
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
</script>
<style>
	.dataTables_wrapper .dataTables_filter {
		float: right
	}

	.dataTables_wrapper .dataTables_paginate {
		float: right
	}

	.dataTable tbody tr:hover {
		background: #007bff !important;
		font-size: 18px;
	}
</style>
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
			<div class="col-12">

				<?php if(session()->getFlashdata('info')):?>
				<div class="alert alert-info alert-dismissible" style='font-size:12px'>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?= session()->getFlashdata('info') ?>
				</div>
				<?php endif;?>

				<?php if(session()->getFlashdata('error')):?>
				<div class="alert alert-danger alert-dismissible" style='font-size:12px'>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?= session()->getFlashdata('error') ?>
				</div>
				<?php endif;?>

				<div class="card">
					<div class="card-body">
						<table id="DataTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width:8%;text-align:center">ID</th>
									<th style="width:20%;text-align:left">Faktur</th>
									<th>Untuk</th>
									<th style="width:25%;text-align:left">Total</th>
									<th style="width:15%;text-align:center">Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th style="width:8%;text-align:center">ID</th>
									<th style="width:20%;text-align:left">Faktur</th>
									<th>Untuk</th>
									<th style="width:25%;text-align:left">Total</th>
									<th style="width:15%;text-align:center">Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>