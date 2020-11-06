<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>/assets/select2/css/select2.css" rel="stylesheet" />
	

</head>


<body class="hold-transition sidebar-mini">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<?php $this->load->view("admin/_partials/sidebar.php") ?>
	
<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

			
<!-- put content here-->

	<div id="wrapper">
		<div id="content-wrapper">
			<div class="container-fluid">
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('Admin') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php echo site_url('Admin/save_pelanggan') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
								<label>Nomor Indihome:</label>
								<input class="form-control <?php echo form_error('no_indihome') ? 'is-invalid':'' ?>"
								type="text" onkeypress="return hanyaAngka(event)" name="no_indihome" placeholder="Nomor Indihome" required minlength="12" maxlength="12" />
								<div class="invalid-feedback">1
									<?php echo form_error('no_indihome') ?>
								</div>
							</div>

							<!-- <script>
							function hanyaAngka(evt) {
								var charCode = (evt.which) ? evt.which : event.keyCode
								if (charCode > 31 && (charCode < 48 || charCode > 57))
								return false;
								return true;
							}
							</script> -->

							<div class="form-group">
								<label>Nomor Telepon:</label>
								<input class="form-control <?php echo form_error('no_telepon') ? 'is-invalid':'' ?> "
								type="text" onkeypress="return hanyaAngka(event)" name="no_telepon" placeholder="Nomor Telepon" required minlength="10" maxlength="13"/>
								<div class="invalid-feedback">1
									<?php echo form_error('no_telepon') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Nama Lengkap:</label>
								<input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
								type="name" name="nama_lengkap" placeholder="Nama Lengkap" required/>
								<div class="invalid-feedback">1
									<?php echo form_error('nama_lengkap') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Kota Kabupaten:</label>
								<select class="form-control select2" name="kota_kabupaten" id="kota_kabupaten" required>
								<option>Pilih Kota Kabupaten</option>
								<?php foreach($Domisili as $row):?>
								<option value="<?php echo $row->id;?>"><?php echo $row->nama_kota_kabupaten;?></option>
								<?php endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<label>Kecamatan:</label>
								<select class="form-control select2" name="kecamatan" id="kecamatan" required>
								<!-- <option>Pilih Kecamatan</option>								 -->
								</select>
							</div>

							<div class="form-group">
								<label>Desa Kelurahan:</label>
								<select class="form-control select2" name="desa_kelurahan" id="desa_kelurahan" required>
								<!-- <option>Pilih Desa Kelurahan</option>				 -->
								</select>
							</div>
							<div class="form-group">
								<label>Alamat:</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								type="text" name="alamat" placeholder="Alamat" required/>
								<div class="invalid-feedback">1
									<?php echo form_error('alamat') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Kode POS:</label>
								<select class="form-control select2" readonly name="kodepos_id" id="kodepos_id" required>
								<!-- <option>Pilih Kode POS</option> -->
						
								</select>
							</div>
							<div class="form-group">
								<label>Nomor Handphone</label>
								<input class="form-control <?php echo form_error('no_handphone') ? 'is-invalid':'' ?>"
								type="text" onkeypress="return hanyaAngka(event)" name="no_handphone" placeholder="Nomor Handphone" required maxlength="13"/>
								<div class="invalid-feedback">1
									<?php echo form_error('no_handphone') ?>
								</div>
							</div>

							<div class="form-group">
								<label>Email</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								type="email" name="email" placeholder="Email" data-validation="email" data-validation-error-msg="Anda belum memberikan alamat email yang benar" required/>
								<div class="invalid-feedback">1
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label>Pekerjaan:</label>
								<select class="form-control select2" name="pekerjaan" id="pekerjaan" required>
										<!-- <option>Pilih Pekerjaan</option> -->
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
							<div class="form-group">
								<label>KTP</label>
								<input class="form-control <?php echo form_error('kartu_tanda_penduduk') ? 'is-invalid':'' ?>"
								type="text" name="no_ktp" placeholder="" required/>
								<div class="invalid-feedback">1
									<?php echo form_error('kartu_tanda_penduduk') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Upload KTP</label>
								<input class="form-control-file <?php echo form_error('foto_ktp') ? 'is-invalid':'' ?>"
								type="file" name="foto_ktp" placeholder="" required/>
								<div class="invalid-feedback">1
									<?php echo form_error('foto_ktp') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				
	<?php $this->load->view("admin/_partials/js.php") ?>
				
	<!-- <script src="ajax-script.js" type="text/javascript"></script> -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'/assets/bootstrap/js/bootstrap.js'?>"></script>
	<script src="<?php echo base_url()?>/assets/select2/js/select2.min.js"></script>
	<?php $this->load->view("admin/_partials/footer.php") ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#kota_kabupaten').change(function(){ 
					var id=$(this).val();
					$.ajax({
						url : "<?php echo site_url('Admin/get_Kecamatan');?>",
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
						url : "<?php echo site_url('Admin/get_Desa');?>",
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
						url : "<?php echo site_url('Admin/get_Pos');?>",
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
	<script>
		function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
		}
	</script>
	<script>
		$(document).ready(function() {
			$('.select2').select2({
				placeholder: 'Select an option'
			});
		});
	</script>
</body>



</html>