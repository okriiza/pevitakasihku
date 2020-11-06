<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pevita</title>
  
  <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  
  
</head>
<body>
<form action="<?php echo site_url('/Admin/add_pelanggan') ?>" id="Form" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <td valign="top">No Indihome</td>
    <td>
		<input type="text" onkeypress="return hanyaAngka(event)" name="no_indihome" maxlength="12" required data-validation="length alphanumeric" data-validation-length="12" data-validation-error-msg="Nomor Indihome harus berjumlah 12 karakter">
	</td>
  </tr>
  <tr>
    <td valign="top">No Telepon</td>
    <td>
		<input type="text" onkeypress="return hanyaAngka(event)" name="no_telepon" maxlength="13" required data-validation="length alphanumeric" data-validation-length="10-13" data-validation-error-msg="Nomor Telepon harus berjumlah 10-13 karakter">
	</td>
  </tr>
  <tr>
    <td valign="top">Nama Lengkap</td>
    <td>
		<input type="text" name="nama_lengkap" maxlength="50" data-validation="length alphanumeric" required data-validation-length="3-50" data-validation-error-msg="Masukan nama lengkap anda">
	</td>
  </tr>
  <tr>
	<td valign="top">Kota Kabupaten</td>
	<td>
		<select class="form-control select2" name="kota_kabupaten" id='kota_kabupaten' required>
            <option>Pilih Kota Kabupaten</option>
            	<?php foreach($Domisili as $row):?>
            	<option value="<?php echo $row->id;?>"><?php echo $row->nama_kota_kabupaten;?></option>
                <?php endforeach;?>
		</select>
	</td>
  </tr>
  <tr>
	<td valign="top">Kecamatan</td>
	<td>
		<select class="form-control select2" name="kecamatan" id='kecamatan' required>
                <option>Pilih Setelah Kota</option>
		</select>
	</td>
  </tr>
  <tr>
	<td valign="top">Desa Kelurahan</td>
	<td>
		<select class="form-control select2" name="desa_kelurahan" id='desa_kelurahan' required>
                <option>Pilih Setelah Kecamatan</option>
		</select>
	</td>
  </tr>
  <tr>
    <td valign="top">Alamat</td>
    <td>
		<input type="text" name="alamat" maxlength="50" required data-validation="length alphanumeric" data-validation-length="3-50" data-validation-error-msg="Masukan alamat anda">
	</td>
  </tr>
  <tr>
	<td valign="top">Kode POS</td>
	<td>
		<select class="form-control select2" name="kodepos_id" id="kodepos_id" required>
            <option>Otomatis Setelah Memilih Desa</option>			
    	</select>
	</td>
  </tr>
  <tr>
    <td valign="top">No Handphone</td>
    <td>
		<input type="text" name="no_handphone" required onkeypress="return hanyaAngka(event)" maxlength="14" data-validation="length alphanumeric" data-validation-length="10-14" data-validation-error-msg="Nomor Telepon harus berjumlah 10-14 karakter">
	</td>
  </tr>
  <tr>
    <td valign="top">Email</td>
    <td>
		<input type="email" name="email" required data-validation="email" data-validation-error-msg="Anda belum memberikan alamat email yang benar">
	</td>
  </tr>
  <tr>
    <td valign="top">Pekerjaan</td>
    <td>
		<select class="form-control select2" name="pekerjaan" id="pekerjaan" required>
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
	</td>
  </tr>
  <tr>
    <td valign="top">KTP</td>
    <td>
		<input name="foto_ktp" type="file" data-validation="mime size required" data-validation-allowing="jpg, png" data-validation-max-size="300kb" data-validation-error-msg-required="Tidak ada gambar yang dipilih">
	</td>
  </tr>
  <tr>
    <td valign="top"></td>
    <td>
      <input type="submit" value="Simpan">
      <input type="reset" value="Reset form">
   </td>
  </tr>
</table>
</form>
<script>
  $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script type="text/javascript">
	// $("#kota_kabupaten").chosen();
	// $("#kecamatan").chosen();
	// $("#desa_kelurahan").chosen();
 	// $("#pekerjaan").chosen();
		$(document).ready(function() {
			$('.select2').select2();
		});
</script>

</body>
</html>