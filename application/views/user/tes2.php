<?php
//INI BUAT AMBIL DATA USER DARI SESSION
$no_indihome =  $this->session->userdata("no_indihome");
$nilai = $this->db->query("SELECT pelanggan.id,no_indihome,no_telepon,nama_lengkap, kota_kabupaten_id,kecamatan_id,desa_kelurahan_id,alamat,kodepos_id,no_handphone,email,pekerjaan_id,ktp_id, kartu_tanda_penduduk.id,no_ktp,image FROM pelanggan JOIN kartu_tanda_penduduk ON pelanggan.ktp_id = kartu_tanda_penduduk.id WHERE no_indihome = '" . $no_indihome . "'")->result_array();
?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="A stepper plugin for Bootstrap 4.">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/user/css/bs-stepper.min.css">
      <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet" type="text/css" />
      <title>Pevita</title>
   </head>
   <body class="d-flex flex-column min-vh-100 bg-light" style="background: #d60202; /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover,  #d60202 1%, #5a1c1c 100%); /* FF3.6+ */
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(1%,#d60202), color-stop(100%,#5a1c1c)); /* Chrome,Safari4+ */
background: -webkit-radial-gradient(center, ellipse cover,  #d60202 1%,#5a1c1c 100%); /* Chrome10+,Safari5.1+ */
background: -o-radial-gradient(center, ellipse cover,  #d60202 1%,#5a1c1c 100%); /* Opera 12+ */
background: -ms-radial-gradient(center, ellipse cover,  #d60202 1%,#5a1c1c 100%); /* IE10+ */
background: radial-gradient(ellipse at center,  #d60202 1%,#5a1c1c 100%);">
   <!-- <?php echo $this->session->flashdata('pesan'); ?> -->
      <div class="container flex-grow-1 flex-shrink-0 py-5">
         <div class="card mb-5 p-4 bg-white shadow-sm">
            <div class="d-flex justify-content-between">
               <h3 class="mt-4">Pembaruan Data</h3>
               <div class="">
                  <img src="<?php echo base_url() ?>/assets/image/logo.png" width="110" height="80">
               </div>
            </div>
            <div id="stepperForm" class="bs-stepper">
               <div class="bs-stepper-header" role="tablist">
                  <div class="step" data-target="#test-form-1">
                  <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="test-form-1">
                     <span class="bs-stepper-circle">1</span>
                     <span class="bs-stepper-label">Data Indihome</span>
                  </button>
                  </div>
                  <div class="bs-stepper-line"></div>
                  <div class="step" data-target="#test-form-2">
                  <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="test-form-2">
                     <span class="bs-stepper-circle">2</span>
                     <span class="bs-stepper-label">Domisili</span>
                  </button>
                  </div>
                  <div class="bs-stepper-line"></div>
                  <div class="step" data-target="#test-form-3">
                  <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="test-form-3">
                     <span class="bs-stepper-circle">3</span>
                     <span class="bs-stepper-label">Data Pribadi</span>
                  </button>
                  </div>
               </div>
               <div class="bs-stepper-content">
                  <form method="post" id="register_form" action="<?php echo site_url('User/update_pelanggan') ?>" enctype="multipart/form-data">
                     <div id="test-form-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger1">
                        <div class="form-group">
                           <input type="text" name="id" value="<?php print_r($nilai[0]["id"]); ?>">
                           <label valign="top" for="inputMailForm">Nomor Indihome <span class="text-danger font-weight-bold">*</span></label>
                           <input id="inputnoindihome" type="number" onkeypress="return hanyaAngka(event)" name="no_indihome" id="no_indihome" class="form-control no_indihome" value="<?php print_r($nilai[0]["no_indihome"]); ?>" readonly required maxlength="12" data-validation="length alphanumeric" data-validation-length="12" data-validation-error-msg="Nomor Indihome harus berjumlah 12 karakter">
                           <div class="invalid-feedback">Nomor indihome harus terdiri dari 12 angka</div>
                        </div>
                        <div class="form-group">
                           <label valign="top" for="inputMailForm">Nomor Telepon <span class="text-danger font-weight-bold">*</span></label>
                           <input id="inputnotelepon" name="no_telepon" id="no_telepon" type="number" onkeypress="return hanyaAngka(event)" class="form-control no_telepon"  value="<?php print_r($nilai[0]["no_telepon"]); ?>" maxlength="13" required data-validation="length alphanumeric" data-validation-length="10-13" data-validation-error-msg="Nomor Telepon harus berjumlah 10-13 karakter">
                        </div>
                        <span class="btn btn-danger btn-next-form">Next</span>
                     </div>
                     <div id="test-form-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger2">
                        <div class="form-group">
                           <label valign="top">Kota Kabupaten: <span class="text-danger font-weight-bold">*</span></label>
                           <select class="form-control select2 nama_kota_kabupaten" name="kota_kabupaten" id="kota_kabupaten" required>
                           <option>Pilih Kota Kabupaten</option>
                              <?php foreach($Domisili as $row):?>
                                 <option value="<?php echo $row->id;?>" <?php if($row->id == $nilai[0]["kota_kabupaten_id"]) echo 'selected' ;?>><?php echo $row->nama_kota_kabupaten;?></option>
                              <?php endforeach;?>
                           </select>
                        </div>
								<div class="form-group">
									<label valign="top">Kecamatan <span class="text-danger font-weight-bold">*</span></label>
									<select class="form-control select2 nama_kecamatan" name="kecamatan" id='kecamatan' required>
                           <option>Pilih Kecamatan</option>
                           <?php foreach($Dom as $row):?>
                              <option value="<?php echo $row->id;?>" <?php if($row->id == $nilai[0]["kecamatan_id"]) echo 'selected' ;?>><?php echo $row->nama_kecamatan ;?></option>
                           <?php endforeach;?>
		                     </select>
                        </div>
                        <div class="form-group">
                           <label valign="top">Desa Kelurahan <span class="text-danger font-weight-bold">*</span></label>
                           <select class="form-control select2 nama_desa_kelurahan" name="desa_kelurahan" id='desa_kelurahan' required>
                           <option>Pilih Kelurahan</option>
                           <?php foreach($Domi as $row):?>
                           <option value="<?php echo $row->id;?>" <?php if($row->id == $nilai[0]["desa_kelurahan_id"]) echo 'selected' ;?>><?php echo $row->nama_desa_kelurahan ;?></option>
                           <?php endforeach;?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label valign="top">Kode POS <span class="text-danger font-weight-bold">*</span></label>
                           <select class="form-control select2 kodepos" readonly name="kodepos_id" id="kodepos_id" required>
                           <?php foreach($Domis as $row):?>
                           <option value="<?php echo $row->id;?>" <?php if($row->id == $nilai[0]["kodepos_id"]) echo 'selected' ;?>><?php echo $row->kodepos ;?></option>
                           <?php endforeach;?>			
                           </select>
                        </div>
                        <div class="form-group">
                           <label valign="top">Alamat <span class="text-danger font-weight-bold">*</span></label>
                           <input type="text" name="alamat" id="alamat" class="form-control alamat" maxlength="50" required data-validation="length" data-validation-length="3-50" data-validation-error-msg="Masukan alamat anda" value="<?php print_r($nilai[0]["alamat"]); ?>">
                        </div>
                        <span class="btn btn-secondary" onclick="stepperForm.previous()">Previous</span>
                        <span class="btn btn-danger btn-next-form">Next</span>
                     </div>
                     <div id="test-form-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger3">
                        <div class="form-group">
                           <label valign="top" for="inputMailForm">Nama Lengkap <span class="text-danger font-weight-bold">*</span></label>
                           <input id="inputnama" name="nama_lengkap" id="nama_lengkap" type="text" class="form-control nama_lengkap" value="<?php print_r($nilai[0]["nama_lengkap"]); ?>" maxlength="50" data-validation="length" required data-validation-length="3-50" data-validation-error-msg="Masukan nama lengkap anda">
                        </div>
                        <div class="form-group">
                           <label valign="top">Nomor Handphone <span class="text-danger font-weight-bold">*</span></label>
                           <input type="text" name="no_handphone" id="no_handphone" class="form-control no_handphone" value="<?php print_r($nilai[0]["no_handphone"]); ?>" required onkeypress="return hanyaAngka(event)" maxlength="14" data-validation="length alphanumeric" data-validation-length="10-14" data-validation-error-msg="Nomor Telepon harus berjumlah 10-14 karakter" >
                        </div>
                        <div class="form-group">
                           <label valign="top">Email <span class="text-danger font-weight-bold">*</span></label>
                           <input type="text" name="email" id="email" class="form-control email" value="<?php print_r($nilai[0]["email"]); ?>" required data-validation="email" data-validation-error-msg="Anda belum memberikan alamat email yang benar">
                        </div>
                        <div class="form-group">
                           <label valign="top">Pekerjaan <span class="text-danger font-weight-bold">*</span></label>
                           <select class="form-control select2 nama_pekerjaan" name="pekerjaan" id="pekerjaan" required>
                           <option>Pilih Pekerjaan</option>
                           <?php foreach($Pekerjaan as $row):?>
                           <option value="<?php echo $row->id;?>" <?php if($row->id == $nilai[0]["pekerjaan_id"]) echo 'selected' ;?>><?php echo $row->nama_pekerjaan ;?></option>
                           <?php endforeach;?>
                           </select>
                        </div>
                     <div class="form-group">
                        <label valign="top">Nomor KTP</label>
                        <input type="text" name="ktp_id" value="<?php echo $nilai[0]["ktp_id"]?>" hidden>
                        <input class="form-control no_ktp"
                        type="text" name="no_ktp" placeholder="" required maxlength="16" data-validation="length alphanumeric" data-validation-length="16" data-validation-error-msg="Nomor KTP harus berjumlah 16 karakter" value="<?php echo $nilai[0]["no_ktp"]?>">
                     </div>
                     <div class="form-group">
                        <label>Upload KTP</label>
                        <input type="text" name="old_image" value="<?php echo $nilai[0]["image"]?>" hidden>
                        <input class="form-control-file"
                        type="file" name="foto_ktp" placeholder="">
                        <!-- <input class="form-control-file"
                        type="file" name="foto_ktp" placeholder="" data-validation="mime size required" data-validation-allowing="jpg, png"  data-validation-error-msg-required="Tidak ada gambar yang dipilih"> -->
                     </div>
                        <span class="btn btn-secondary mb-3" onclick="stepperForm.previous()">Previous</span>
                        <a id="set_dtl" class="btn btn-success mb-3"  onclick="test()" ><i class="fas fa-eye"></i>Lihat data</a>
                        <button type="submit" class="btn btn-danger btn-next-form float-right mb-3" id="register">Submit</button> <br>
                        <span><small class="font-weight-bold">*Jika Tombol Submit Tidak Bisa , Klik lihat data , apakah data sudah terisi semua atau belum</small> </span>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>


      <div class="modal fade" id="modal-detail">
         <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            
            <div class="modal-body table-responsive">
                  <table class="table table-bordered no-margin">
                  <tbody>
                     <tr>
                        <th>NO. INDIHOME</th>
                        <td><span id="no_indihome_modal"></span></td>
                     </tr>
                     <tr>
                        <th>NO. TELEPON</th>
                        <td><span id="no_telepon"></span></td>
                     </tr>
                     <tr>
                        <th>NAMA LENGKAP</th>
                        <td><span id="nama_lengkap"></span></td>
                     </tr>
                     <tr>
                        <th>KOTA KABUPATEN</th>
                        <td><span id="nama_kota_kabupaten"></span></td>
                     </tr>
                     <tr>
                        <th>KECAMATAN</th>
                        <td><span id="nama_kecamatan"></span></td>
                     </tr>
                     <tr>
                        <th>DESA KELURAHAN</th>
                        <td><span id="nama_desa_kelurahan"></span></td>
                     </tr>
                     <tr>
                        <th>ALAMAT</th>
                        <td><span id="alamat"></span></td>
                     </tr>
                     <tr>
                        <th>KODE POS</th>
                        <td><span id="kodepos"></span></td>
                     </tr>
                     <tr>
                        <th>NO. HANDPHONE</th>
                        <td><span id="no_handphone"></span></td>
                     </tr>
                     <tr>
                        <th>EMAIL</th>
                        <td><span id="email"></span></td>
                     </tr>
                     <tr>
                        <th>PEKERJAAN</th>
                        <td><span id="nama_pekerjaan"></span></td>
                     </tr>
                     <tr>
                        <th>No KTP</th>
                        <td><span id="ktp_id"></span></td>
                     </tr>
                     <tr>
                        <th>Foto KTP</th>
                        <td><span id="image"></span></td>
                     </tr>
                  </tbody>
                  </table>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-next-form" id="register">Submit</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
         </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>assets/user/select2/js/select2.min.js"></script>
      <script src="<?php echo base_url()?>assets/user/script/bs-stepper.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
      <script>
         var stepperFormEl = document.querySelector('#stepperForm')
         stepperForm = new Stepper(stepperFormEl, {
            animation: true
         })

         var btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'))
         var stepperPanList = [].slice.call(stepperFormEl.querySelectorAll('.bs-stepper-pane'))
         var inputMailForm = document.getElementById('inputMailForm')
         var inputnoindihome = document.getElementById('inputnoindihome')
         var form = stepperFormEl.querySelector('.bs-stepper-content form')
         
         btnNextList.forEach(function (btn) {
            btn.addEventListener('click', function () {
               stepperForm.next()
            })
         })

         stepperFormEl.addEventListener('show.bs-stepper', function (event) {
            form.classList.remove('was-validated')
            var nextStep = event.detail.indexStep
            var currentStep = nextStep

            if (currentStep > 0) {
               currentStep--
            }

            var stepperPan = stepperPanList[currentStep]

            if ((stepperPan.getAttribute('id') === 'test-form-1'  && !inputnama.value.length )
            || (stepperPan.getAttribute('id') === 'test-form-2' && !inputPasswordForm.value.length)) {
               event.preventDefault()
               form.classList.add('was-validated')
            }
         })
      </script>
      <script type="text/javascript">
         $(document).ready(function(){
            $('#kota_kabupaten').change(function(){ 
                  var id=$(this).val();
                  $.ajax({
                     url : "<?php echo site_url('User/get_Kecamatan');?>",
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
                     url : "<?php echo site_url('User/get_Desa');?>",
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
                     url : "<?php echo site_url('User/get_Pos');?>",
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
         var submit = document.getElementById('register_form');
         document.getElementById("register".addEventListener("click",function(){
            submit.submit();
         }));
      </script>
      <script>

         function test(){
            var no_indihome = $('.no_indihome').val();
            var no_telepon = $('.no_telepon').val();
            var nama_lengkap = $('.nama_lengkap').val();
            var nama_kota_kabupaten = $('.nama_kota_kabupaten option:selected').text();
            var nama_kecamatan = $('.nama_kecamatan option:selected').text();
            var nama_desa_kelurahan = $('.nama_desa_kelurahan option:selected').text();
            var alamat = $('.alamat').val();
            var kodepos = $('.kodepos').val();
            var email = $('.email').val();
            var no_handphone = $('.no_handphone').val();
            var nama_pekerjaan = $('.nama_pekerjaan option:selected').text();
            var no_ktp = $('.no_ktp').val();
            alert("No Indihome : " + no_indihome + 
                  "\nNo Telepon : " + no_telepon+ 
                  "\nKota kabupaten : " + nama_kota_kabupaten+ 
                  "\nKecamatan : " + nama_kecamatan+ 
                  "\nDesa Kelurahan : " + nama_desa_kelurahan+ 
                  "\nKode Pos : " + kodepos+ 
                  "\nAlamat : " + alamat+ 
                  "\nNama Lengkap : " + nama_lengkap+
                  "\nNomor Handphone : " + no_handphone+
                  "\nEmail : " + email+ 
                  "\nNama Pekerjaan : " + nama_pekerjaan+
                  "\nNomor KTP : " + no_ktp
                  );

         }
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