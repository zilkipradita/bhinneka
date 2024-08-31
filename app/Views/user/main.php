<title>
	<?= session()->get('title')." | ".$title_form ?>
</title>
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script>
	$(function() {
		document.getElementById("liNavUserManagement").classList.add("menu-open");
		document.getElementById("navUserManagement").classList.add("active");
		document.getElementById("navUser").classList.add("active");

		var table = new DataTable('#DataTable', {
			dom: 'Bfrtip',
			buttons: [{
				text: 'Add',
				action: function(e, dt, node, config) {
					window.location =
						"<?php echo base_url(); ?>user/add";
				}
			}, {
				text: 'Refresh',
				action: function(e, dt, node, config) {
					table.ajax.reload();
					toastr.success('Refresh data berhasil ');
				}
			}, 'excel', "pdf", "print"],
			ajax: "<?php echo base_url(); ?>user/json",
			columns: [{
					data: 'id'
				}, {
					data: 'username'
				},
				{
					data: 'nama_user_level'
				},
				{
					data: 'nama'
				},
				{
					data: 'telp'
				},
				{
					data: 'email'
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
									<th>ID</th>
									<th>Username</th>
									<th>Level</th>
									<th>Nama</th>
									<th>Telepon</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Username</th>
									<th>Level</th>
									<th>Nama</th>
									<th>Telepon</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>