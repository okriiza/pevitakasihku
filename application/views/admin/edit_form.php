<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$id_pelanggan =$this->input->post('id');
$no_indihome = $this->input->post('no_indihome');

$nilai = $this->db->query("SELECT pelanggan.id AS id_pelanggan,no_indihome,no_telepon,nama_lengkap, kota_kabupaten_id,kecamatan_id,desa_kelurahan_id,alamat,kodepos_id,no_handphone,email,pekerjaan_id,ktp_id, kartu_tanda_penduduk.id,no_ktp,image FROM pelanggan JOIN kartu_tanda_penduduk ON pelanggan.ktp_id = kartu_tanda_penduduk.id WHERE no_indihome = '" . $no_indihome . "'")->result_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url()?>/assets/select2/css/select2.css" rel="stylesheet" />
	<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet" type="text/css" />

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
						<a href="<?php echo site_url('/admin') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
                        <!-- <?php foreach($pelanggan as $Pelanggan){ ?> -->
						<form action="<?php echo site_url('Admin/update') ?>" method="post" >
                        	<input type="hidden" name="id" value="<?php echo $Pelanggan->id?>" />
                        	<div class="form-group">
								<label valign="top">Nomor Indihome:</label>
								<input type="number" name="no_indihome" readonly id="no_indihome" class="form-control" value="<?= $Pelanggan->no_indihome?>" required maxlength="12" data-validation="length alphanumeric" data-validation-length="12" data-validation-error-msg="Nomor Indihome harus berjumlah 12 karakter">
							</div>
							<div class="form-group">
								<label valign="top">Nomor Telepon:</label>
								<input class="form-control <?php echo form_error('no_telepon') ? 'is-invalid':'' ?>"
								type="text" onkeypress="return hanyaAngka(event)" name="no_telepon" placeholder="Nomor Telepon" value="<?php echo $Pelanggan->no_telepon ?>" maxlength="13" required data-validation="length alphanumeric" data-validation-length="10-13" data-validation-error-msg="Nomor Telepon harus berjumlah 10-13 karakter">
							</div>
                            <div class="form-group">
								<label valign="top">Nama Lengkap:</label>
								<input class="form-control"
								type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $Pelanggan->nama_lengkap ?>"/>
							</div>
							<div class="form-group">
								<label valign="top">Kota Kabupaten:</label>
								<select class="form-control select2" name="kota_kabupaten" id="kota_kabupaten" required>
								<option>Pilih Kota Kabupaten</option>
								<?php foreach($Domisili as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->kota_kabupaten_id) echo 'selected' ;?>><?php echo $row->nama_kota_kabupaten ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('kota_kabupaten') ?>
								</div>
							</div>
							<div class="form-group">
								<label valign="top">Kecamatan:</label>
								<select class="form-control select2" name="kecamatan" id="kecamatan" required>
								<option>Pilih Kecamatan</option>
								<?php foreach($Dom as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->kecamatan_id) echo 'selected' ;?>><?php echo $row->nama_kecamatan ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('kecamatan') ?>
								</div>
							</div>
							<div class="form-group">
								<label valign="top">Desa Kelurahan:</label>
								<select class="form-control select2" name="desa_kelurahan" id="desa_kelurahan" required>
								<option>Pilih Kelurahan</option>
								<?php foreach($Domi as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->desa_kelurahan_id) echo 'selected' ;?>><?php echo $row->nama_desa_kelurahan ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('desa_kelurahan') ?>
								</div>
							</div>
							<div class="form-group">
								<label valign="top">Alamat:</label>
								<input class="form-control"
								type="text" name="alamat" placeholder="Alamat" value="<?php echo $Pelanggan->alamat ?>" maxlength="50" required data-validation="length" data-validation-length="3-50" data-validation-error-msg="Masukan alamat anda">
							</div>
							<div class="form-group">
								<label valign="top">Kode POS:</label>
								<select class="form-control select2" readonly name="kodepos_id" id="kodepos_id" required>
								<?php foreach($Domis as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->kodepos_id) echo 'selected' ;?>><?php echo $row->kodepos ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('kodepos_id') ?>
								</div>
							</div>
                     		<div class="form-group">
								<label valign="top">Nomor Handphone</label>
								<input class="form-control <?php echo form_error('no_handphone') ? 'is-invalid':'' ?>"
								type="text" name="no_handphone" placeholder="Nomor Handphone"  value="<?php echo $Pelanggan->no_handphone ?>" required onkeypress="return hanyaAngka(event)" maxlength="14" data-validation="length alphanumeric" data-validation-length="10-14" data-validation-error-msg="Nomor Telepon harus berjumlah 10-14 karakter">
							</div>

                            <div class="form-group">
								<label valign="top">Email</label>
								<input class="form-control"
								type="text" name="email" placeholder="Email" value="<?php echo $Pelanggan->email ?>" required data-validation="email" data-validation-error-msg="Anda belum memberikan alamat email yang benar">
							</div>

							<div class="form-group">
								<label valign="top">Pekerjaan:</label>
								<select class="form-control select2 <?php echo form_error('pekerjaan') ? 'is-invalid':'' ?>" name="pekerjaan" id="pekerjaan" required>
								<option>Pilih Pekerjaan</option>
								<?php foreach($Pekerjaan as $row):?>
								<option value="<?php echo $row->id;?>" <?php if($row->id == $Pelanggan->pekerjaan_id) echo 'selected' ;?>><?php echo $row->nama_pekerjaan ;?></option>
								<?php endforeach;?>
								</select>
								<div class="invalid-feedback">1
									<?php echo form_error('pekerjaan') ?>
								</div>
							</div>
							<!-- <?php if($row->id == $Pelanggan->pekerjaan_id) echo 'selected' ;?> -->
							
							<div class="form-group">
							<label valign="top">Nomor KTP</label>
								<input type="text" hidden name="ktp_id" value="<?php echo $Pelanggan->ktp_id?>">
								<?php  foreach($get_ktp as $row):?>
									<?php if($row->id == $Pelanggan->ktp_id){?>
										<!-- <input type="text" name="ktp_id" value="<?php echo $row->id?>" > -->
										<input class="form-control no_ktp"
								type="text" name="no_ktp" placeholder="" required maxlength="16" data-validation="length alphanumeric" data-validation-length="16" data-validation-error-msg="Nomor KTP harus berjumlah 16 karakter" value="<?php echo $row->no_ktp?>">
									<?php } ;?>
								<?php endforeach;?>
								
							</div>
							<div class="form-group">
								<label>Upload KTP</label>
								<?php  foreach($get_ktp as $row):?>
									<?php if($row->id == $Pelanggan->ktp_id){?>
									<input type="text" name="old_image" value="<?php echo $row->image ;?>" hidden>
								<?php } ;?>
								<?php endforeach;?>
								<input class="form-control-file"
								type="file" name="foto_ktp" placeholder="">
								<!-- <input class="form-control-file"
								type="file" name="foto_ktp" placeholder="" data-validation="mime size required" data-validation-allowing="jpg, png"  data-validation-error-msg-required="Tidak ada gambar yang dipilih"> -->
							</div>

							<!-- <div class="form-group">
								<label>KTP</label>
								<input class="form-control <?php echo form_error('kartu_tanda_penduduk') ? 'is-invalid':'' ?>"
								type="text" readonly name="kartu_tanda_penduduk" placeholder="" value="<?php echo $Pelanggan->ktp_id ?>"/>
								<div class="invalid-feedback">1
									<?php echo form_error('kartu_tanda_penduduk') ?>
								</div>
							</div>
-->


							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
                        <!-- <?php } ?>            -->
					</div>

					<div class="card-footer small text-muted">
					
					</div>
					</div>
		</div>
	</div>

				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/js.php") ?>
				<?php $this->load->view("admin/_partials/footer.php") ?>


        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <!-- <script src="ajax-script.js" type="text/javascript"></script> -->
        <!-- <script type="text/javascript" src="<?php echo base_url().'/assets/bootstrap/js/jquery-3.3.1.js'?>"></script> -->
		 <script type="text/javascript" src="<?php echo base_url().'/assets/bootstrap/js/bootstrap.js'?>"></script>
		 <script src="<?php echo base_url()?>/assets/select2/js/select2.min.js"></script>
		 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#kota_kabupaten').change(function(){ 
				var id=$(this).val();
				$.ajax({
					url : "<?php echo site_url('Admin_add/get_Kecamatan');?>",
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
					url : "<?php echo site_url('Admin_add/get_Desa');?>",
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
					url : "<?php echo site_url('Admin_add/get_Pos');?>",
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
		$(document).ready(function() {
			$('.select2').select2({
				placeholder: 'Select an option'
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
		$.validate({
		modules : 'location, date, security, file',
		onModulesLoaded : function() {
			$('#country').suggestCountry();
		}
		});
	</script>

</body>



</html>