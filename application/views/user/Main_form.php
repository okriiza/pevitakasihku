<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Multi Step Form </title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/main.css'?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet" type="text/css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>  
  
</head>
  <body>
    <div class="container">
      <div class="progress-bar">
        <div class="step">
          <p>Pengguna</p>
          <div class="bullet">
            <span>1</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Domisili</p>
          <div class="bullet">
            <span>2</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Alamat</p>
          <div class="bullet">
            <span>3</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Detail</p>
          <div class="bullet">
            <span>4</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
      </div>
      <div class="form-outer">
        <form action="#">
          <div class="page slide-page">
            <div class="title">Basic Info:</div>
            <div class="field">
              <div class="label">Nomor Indihome</div>
              <input type="text" onkeypress="return hanyaAngka(event)" name="no_indihome" maxlength="12" data-validation="length alphanumeric" 
     data-validation-length="12" 
     data-validation-error-msg="Nomor Indihome harus berjumlah 12 karakter">
            </div>
            <div class="field">
              <div class="label">Nomor Telepon</div>
              <input type="text" name="no_telepon" required data-validation="length alphanumeric" data-validation-length="10-13" data-validation-error-msg="Nomor Telepon harus berjumlah 10-13 karakter"> 
            </div>
            <div class="field">
              <div class="label">Nama Lengkap</div>
              <input type="text" name="nama_lengkap">
            </div>
            <div class="field">
              <button class="firstNext next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Domisili:</div>
            <div class="field">
              <div class="label">Kota Kabupaten</div>
              <select class="form-control" name="kota_kabupaten" id="kota_kabupaten" required>
                                <option>Pilih Kota Kabupaten</option>
                                <?php foreach($Domisili as $row):?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->nama_kota_kabupaten;?></option>
                                <?php endforeach;?>
                                </select>
            </div>
            <div class="field">
              <div class="label">Kecamatan</div>
              <select class="form-control" name="kecamatan" id="kecamatan" required>
                                <option>Pilih Kecamatan</option>								
                                </select>
            </div>
            <div class="field">
              <div class="label">Desa Kelurahan</div>
              <select class="form-control" name="desa_kelurahan" id="desa_kelurahan" required>
                                <option>Pilih Desa Kelurahan</option>				
                                </select>
            </div>
            <div class="field btns">
              <button class="prev-1 prev">Previous</button>
              <button class="next-1 next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Alamat</div>
            <div class="field">
              <div class="label">Kode POS</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Alamat Lengkap</div>
              <input type="text">
            </div>
            <div class="field btns">
              <button class="prev-2 prev">Previous</button>
              <button class="next-2 next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Details:</div>
            <div class="field">
              <div class="label">No Handphone</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Email</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Pekerjaan</div>
              <input type="password">
            </div>
            <div class="field btns">
              <button class="prev-3 prev">Previous</button>
              <button class="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="<?php echo base_url().'assets/script/script.js'?>"></script>
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
	<script type="text/javascript">
 		$(document).ready(function() {
 		    $('#kota_kabupaten').select2();
 		});
		 $(document).ready(function() {
 		    $('#kecamatan').select2();
 		});
		 $(document).ready(function() {
 		    $('#desa_kelurahan').select2();
 		});
		 $(document).ready(function() {
 		    $('#pekerjaan').select2();
 		});
	</script>
  
  </body>
</html>
