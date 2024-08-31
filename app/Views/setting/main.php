<title><?= session()->get('title')." | ".$title_form ?></title>
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script>
  $(document).ready(function(){
	document.getElementById("liNavUserManagement").classList.add("menu-open");
	document.getElementById("navUserManagement").classList.add("active");
	document.getElementById("navSetting").classList.add("active");	
	
	$("#btnBack").click(function(){
		history.back();
	});
	
	$("#btnSubmit").click(function(){
		update();
	});
  });

  function update(){
	  	$.ajax({
			url: '<?php echo base_url() ?>setting/update',
			method: 'post',
			data: {
				cms_name: $('#cms-name').val(),
				cms_version: $('#cms-version').val(),
				framework: $('#framework').val(),
				php_version: $('#php-version').val(),
				title: $('#title').val()
			},
			success: function(response) {
				
				if(response=='1'){
					$("#divAlert").css('display','none');
					$("#divAlertSuccess").css('display','block');
					$("#divAlertSuccess").html('Data berhasil disimpan</br>Silahkan logout dan login kembali untuk menerapkan perubahan Setting');
				}else if(response=='2'){
					$("#divAlertSuccess").css('display','none');
					$("#divAlert").css('display','block');
					$("#divAlert").html('Data gagal disimpan');
				}else{
					$("#divAlertSuccess").css('display','none');
					$("#divAlert").css('display','block');
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
                    <label for="cms-name">CMS Name</label>
                    <input type="text" class="form-control" id="cms-name" name="cms-name" value="<?php echo $cms_name; ?>" placeholder="Masukan CMS Name">
				  </div>
				  <div class="form-group">
                    <label for="cms-version">CMS Version</label>
                    <input type="text" class="form-control" id="cms-version" name="cms-version" value="<?php echo $cms_version; ?>" placeholder="Masukan CMS Version">
                  </div>
				  <div class="form-group">
                    <label for="framework">Framework</label>
                    <input type="text" class="form-control" id="framework" name="framework" value="<?php echo $framework; ?>" placeholder="Masukan Framework">
                  </div>
				  <div class="form-group">
                    <label for="php-version">PHP Version</label>
                    <input type="text" class="form-control" id="php-version" name="php-version" value="<?php echo $php_version; ?>" placeholder="Masukan PHP Version">
                  </div>
				  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" placeholder="Masukan Title">
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