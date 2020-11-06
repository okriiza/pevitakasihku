<html>
	<head>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pevita</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/form.css'?>" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	
	</head>
	<body>

		<div class="container"justify-content="center"> 
			<div class="row" > 
				<div class="col-md-9" >
	
					<h2 align="center"></a></h2><br />
										<form method="post" id="register_form" action="<?php echo site_url('Add/save_pelanggan') ?>" nctype="multipart/form-data">
						
            <div class="tab-content" style="margin-top:16px;">
            <ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Data Indihome</a>
							</li>
							<li class="nav-item">
								<a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Domisili</a>
							</li>
							<li class="nav-item">
								<a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Data Pribadi</a>
              </li>
              <!-- <li class="nav-item">
								<a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Upload KTP</a>
							</li> -->
						</ul>
							<div class="tab-pane active" id="login_details">
                
								<div class="panel panel-default">
									<div class="panel-heading">Detail Data Indihome</div>
									<div class="panel-body">
										<div class="form-group">
											<label>Nomor Indihome</label>
											<input type="text" name="no_indihome" id="no_indihome" class="form-control" />
											<span id="error_indihome" class="text-danger"></span>
										</div>
										<div class="form-group">
											<label>Nomor Telepon</label>
											<input type="text" name="no_telepon" id="no_telepon" class="form-control" />
											<span id="error_telepon" class="text-danger"></span>
                    </div>
                    <div class="form-group">
											<label>Nama Lengkap</label>
											<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" />
											<span id="error_nama" class="text-danger"></span>
										</div>
										<br />
										<div align="center">
											<button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-danger btn-lg">Next</button>
										</div>
										<br />
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="personal_details">
								<div class="panel panel-default">
									<div class="panel-heading">Data Domisili</div>
									<div class="panel-body">
										<div class="form-group">
											<label>Pilih Kota Kabupaten</label>
                      <select class="form-control kota_kabupaten" name="kota_kabupaten" id='kota_kabupaten' required>
                        <option>Pilih Kota Kabupaten</option>
            	            <?php foreach($Domisili as $row):?>
            	              <option value="<?php echo $row->id;?>"><?php echo $row->nama_kota_kabupaten;?></option>
                          <?php endforeach;?>
		                  </select>
										</div>
										<div class="form-group">
											<label>Kecamatan</label>
										  	<select class="form-control" name="kecamatan" id='kecamatan' required>
                          <option>Pilih Setelah Kota</option>
		                    </select>
                    </div>
                    <div class="form-group">
											<label>Desa Kelurahan</label>
											  <select class="form-control" name="desa_kelurahan" id='desa_kelurahan' required>
                          <option>Pilih Setelah Kecamatan</option>
		                    </select>
										</div>
										<div class="form-group">
											<label>Kode POS</label>
											  <select class="form-control" name="kodepos_id" id="kodepos_id" required>
                          <option>Otomatis Setelah Memilih Desa</option>			
    	                  </select>
										</div>
										<br />
										<div align="center">
											<button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
											<button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-danger btn-lg">Next</button>
										</div>
										<br />
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="contact_details">
								<div class="panel panel-default">
									<div class="panel-heading">Data Pribadi</div>
									<div class="panel-body">
										<div class="form-group">
											<label>Alamat</label>
											<textarea name="alamat" id="alamat" class="form-control"></textarea>
											<span id="error_address" class="text-danger"></span>
										</div>
										<div class="form-group">
											<label>Nomor Handphone</label>
											<input type="text" name="no_handphone" id="no_handphone" class="form-control" />
											<span id="error_mobile_no" class="text-danger"></span>
                    </div>
                    <div class="form-group">
											<label>Email</label>
											<input type="text" name="email" id="email" class="form-control" />
											<span id="error_email" class="text-danger"></span>
                    </div>
                    <div class="form-group">
											<label>Pekerjaan</label>
											  <select class="form-control" name="pekerjaan" id="pekerjaan" required>
                          <option>Pilih Pekerjaan</option>
				                    <?php
					                    if(!empty($Pekerjaan)){
                		            foreach ($Pekerjaan as $key => $value) {
                    		        echo "<option value='".$value->id."'>".$value->nama_pekerjaan."</option>";
                    	          }
					                    }
					                  else{
                              echo '<option value="">not available</option>';
                            }
                            ?>
		                    </select>
										</div>
										<br />
										<div align="center">
											<button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
											<button type="submit" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Submit</button>
										</div>
										<br />
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</body>
</html>


<script>
$(document).ready(function(){
	
	$('#btn_login_details').click(function(){
		
		var error_indihome = '';
   	var error_telepon = '';
   	var error_nama = '';
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		
		if($.trim($('#no_indihome').val()).length == 0)
		{
			error_indihome = 'Nomor indihome harus terdiri dari 12 angka';
			$('#error_indihome').text(error_indihome);
			$('#no_indihome').addClass('has-error');
		}
		else
		{
			error_indihome = '';
			$('#error_indihome').text(error_indihome);
			$('#no_indihome').removeClass('has-error');
   	}

   	if($.trim($('#no_telepon').val()).length == 0)
		{
			error_telepon = 'Nomor telepon harus terdiri dari 10-13 angka';
			$('#error_telepon').text(error_telepon);
			$('#no_telepon').addClass('has-error');
		}
		else
		{
			error_telepon = '';
			$('#error_telepon').text(error_telepon);
			$('#no_telepon').removeClass('has-error');
   	}

		if($.trim($('#nama_lengkap').val()).length == 0)
		{
			error_nama = 'Harap isi dengan nama lengkap';
			$('#error_nama').text(error_nama);
			$('#nama_lengkap').addClass('has-error');
		}
		else
		{
			error_nama = '';
			$('#error_nama').text(error_nama);
			$('#nama_lengkap').removeClass('has-error');
		}

		if(error_indihome != '' || error_telepon != '' || error_nama != '')
		{
			return false;
		}
		else
		{
			$('#list_login_details').removeClass('active active_tab1');
			$('#list_login_details').removeAttr('href data-toggle');
			$('#login_details').removeClass('active');
			$('#list_login_details').addClass('inactive_tab1');
			$('#list_personal_details').removeClass('inactive_tab1');
			$('#list_personal_details').addClass('active_tab1 active');
			$('#list_personal_details').attr('href', '#personal_details');
			$('#list_personal_details').attr('data-toggle', 'tab');
			$('#personal_details').addClass('active in');
		}
	});
	
	$('#previous_btn_personal_details').click(function(){
		$('#list_personal_details').removeClass('active active_tab1');
		$('#list_personal_details').removeAttr('href data-toggle');
		$('#personal_details').removeClass('active in');
		$('#list_personal_details').addClass('inactive_tab1');
		$('#list_login_details').removeClass('inactive_tab1');
		$('#list_login_details').addClass('active_tab1 active');
		$('#list_login_details').attr('href', '#login_details');
		$('#list_login_details').attr('data-toggle', 'tab');
		$('#login_details').addClass('active in');
	});
	
	$('#btn_personal_details').click(function(){
		
			$('#list_personal_details').removeClass('active active_tab1');
			$('#list_personal_details').removeAttr('href data-toggle');
			$('#personal_details').removeClass('active');
			$('#list_personal_details').addClass('inactive_tab1');
			$('#list_contact_details').removeClass('inactive_tab1');
			$('#list_contact_details').addClass('active_tab1 active');
			$('#list_contact_details').attr('href', '#contact_details');
			$('#list_contact_details').attr('data-toggle', 'tab');
			$('#contact_details').addClass('active in');
		
	});
	
	$('#previous_btn_contact_details').click(function(){
		$('#list_contact_details').removeClass('active active_tab1');
		$('#list_contact_details').removeAttr('href data-toggle');
		$('#contact_details').removeClass('active in');
		$('#list_contact_details').addClass('inactive_tab1');
		$('#list_personal_details').removeClass('inactive_tab1');
		$('#list_personal_details').addClass('active_tab1 active');
		$('#list_personal_details').attr('href', '#personal_details');
		$('#list_personal_details').attr('data-toggle', 'tab');
		$('#personal_details').addClass('active in');
	});
	
	$('#btn_contact_details').click(function(){
		var error_address = '';
		var error_mobile_no = '';
    var mobile_validation = /^\d{10}$/;
    var error_email = '';
		if($.trim($('#alamat').val()).length == 0)
		{
			error_address = 'Harap ini dengan alamat lengkap anda';
			$('#error_address').text(error_address);
			$('#alamat').addClass('has-error');
		}
		else
		{
			error_address = '';
			$('#error_address').text(error_address);
			$('#alamat').removeClass('has-error');
		}
		
		if($.trim($('#no_handphone').val()).length == 0)
		{
			error_mobile_no = 'Nomor handphone terdiri dari 10-14 angka';
			$('#error_mobile_no').text(error_mobile_no);
			$('#no_handphone').addClass('has-error');
		}
		else
		{
			error_mobile_no = '';
			$('#error_mobile_no').text(error_mobile_no);
			$('#no_handphone').removeClass('has-error');
    }
    if($.trim($('#email').val()).length == 0)
		{
			error_email = 'Harap mengisi dengan email yang valid';
			$('#error_email').text(error_email);
			$('#email').addClass('has-error');
		}
		else
		{
			if (!filter.test($('#email').val()))
			{
				error_email = 'Email tidak valid';
				$('#error_email').text(error_email);
				$('#email').addClass('has-error');
			}
			else
			{
				error_email = '';
				$('#error_email').text(error_email);
				$('#email').removeClass('has-error');
			}
		}
		if(error_address != '' || error_mobile_no != '' || error_email != '')
		{
			return false;
		}
		else
		{
			$('#btn_contact_details').attr("disabled", "disabled");
			$(document).css('cursor', 'prgress');
			$("#register_form").submit();
		}
		
	});
	
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#kota_kabupaten').change(function(){ 
				var id=$(this).val();
				$.ajax({
					url : "<?php echo site_url('Add/get_Kecamatan');?>",
					method : "POST",
					data : {id: id},
					async : true,
					dataType : 'json',
					success: function(data){
						var html = '';
						var i;
						for(i=0; i<data.length; i++){
								html += '<option value='+data[i].id+'>'+data[i].nama_kecamatan+'</option>';
						}
						$('#kecamatan').html(html);
					}
				});
				return false;
		}); 
		
		$('#kecamatan').change(function(){ 
				var id=$(this).val();
				$.ajax({
					url : "<?php echo site_url('Add/get_Desa');?>",
					method : "POST",
					data : {id: id},
					async : true,
					dataType : 'json',
					success: function(data){
						
						var html = '';
						var i;
						for(i=0; i<data.length; i++){
								html += '<option value='+data[i].id+'>'+data[i].nama_desa_kelurahan+'</option>';
						}
						$('#desa_kelurahan').html(html);

					}
				});
				return false;
		}); 


		$('#desa_kelurahan').change(function(){ 
				var id=$(this).val();
				$.ajax({
					url : "<?php echo site_url('Add/get_Pos');?>",
					method : "POST",
					data : {id: id},
					async : true,
					dataType : 'json',
					success: function(data){
						
						var html = '';
						var i;
						for(i=0; i<data.length; i++){
								html += '<option value='+data[i].id+'>'+data[i].kodepos+'</option>';
						}
						$('#kodepos_id').html(html);
					}
				});
				return false;
		});
	});
</script>