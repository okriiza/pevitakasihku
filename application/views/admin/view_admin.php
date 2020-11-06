<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="hold-transition sidebar-mini">

  <?php $this->load->view("admin/_partials/navbar.php")   ?>

  <?php $this->load->view("admin/_partials/sidebar.php") ?>

  <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

  <!-- put content here-->

	<div id="wrapper">
		<div id="content-wrapper">
			<div class="container-fluid">
        <div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('Admin/add_pelanggan') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						<!-- <div class="table-responsive">
							
            </div> -->
            <table class="table table-hover" id="tabeldata" width="100%" >
								<thead>
									<tr>
										<!-- <th class="small">ID</th> -->
										<th class="small" style="width:12%;">No indihome</th>
										<!-- <th class="small">No Telepon</th> -->
                    <th class="small" style="width:10%;">Nama</th>
                    <th class="small" style="width:15%;">Kota Kabupaten</th>
                    <th class="small">Kecamatan</th>
                    <th class="small" style="width:15%;">Desa Kelurahan</th>
                    <th class="small">Alamat</th>
                    <!-- <th class="small">Kode POS</th>
                    <th class="small">No Handphone</th>
                    <th class="small">Email</th> -->
                    <th class="small">Pekerjaan</th>
                    <th class="small">KTP</th>
                    <th class="small">Last Updated</th>
                    <th class="small">Status</th>
                    <th class="small" style="width:100%;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($Pe as $data): ?>
                    <tr>
                      <td class="small">
                        <?php echo $data->no_indihome ?>
                      </td>
                      <td class="small">
                        <?php echo $data->nama_lengkap ?>
                      </td>
                      <td class="small">
                        <?php echo $data->nama_kota_kabupaten ?>
                      </td>
                      <td class="small">
                        <?php echo $data->nama_kecamatan ?>
                      </td>
                      <td class="small">
                        <?php echo $data->nama_desa_kelurahan ?>
                      </td>
                      <td class="small">
                        <?php echo $data->alamat ?>
                      </td>
                      <td class="small">
                        <?php echo $data->nama_pekerjaan ?>
                      </td>
                      <td class="small">
                        <?php echo $data->no_ktp ?>
                      </td>
                      <td class="small">
                        <?php echo $data->last_updated_at ?>
                      </td>
                      <td class="small">
                        <?php echo $data->status ?>
                      </td>
                      <td>
                        <a href="<?php echo site_url('Admin/edit/'.$data->id_pelanggan) ?>"
                        class="btn text-warning "><i class="fas fa-edit"></i></a>
                        <a id="set_dtl" class="btn text-success"  data-toggle="modal" data-target="#modal-detail" 
                        data-id_pelanggan="<?=$data->id_pelanggan?>"
                        data-no_indihome="<?=$data->no_indihome?>"
                        data-no_telepon="<?=$data->no_telepon?>"
                        data-nama_lengkap="<?=$data->nama_lengkap?>"
                        data-nama_kota_kabupaten="<?=$data->nama_kota_kabupaten?>"
                        data-nama_kecamatan="<?=$data->nama_kecamatan?>"
                        data-nama_desa_kelurahan="<?=$data->nama_desa_kelurahan?>"
                        data-alamat="<?=$data->alamat?>"
                        data-kodepos="<?=$data->kodepos?>"
                        data-no_handphone="<?=$data->no_handphone?>"
                        data-email="<?=$data->email?>"
                        data-nama_pekerjaan="<?=$data->nama_pekerjaan?>"
                        data-kartu_tanda_penduduk="<?=$data->no_ktp?>"
                        >
                        <!-- data-foto_ktp='<img src="<?=base_url()?>upload/<?= $data->image?>" alt="" width="100" height="100">' -->
                        <i class="fas fa-eye"></i>
                        </a>

                      <a href="" data-toggle="modal" class="btn text-primary" data-target="#detailktp<?php echo $data->ktp_id?>">
                        <i class="fas fa-address-card"></i>
                      </a>

                        <a onclick="deleteConfirm('<?php echo site_url('Admin/delete/'.$data->id) ?>')"
                        href="#!" class="btn text-danger "><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
									<?php endforeach; ?>
								</tbody>
							</table>
					</div>
				</div>
      </div>
		</div>
	</div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

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
                    <th>ID</th>
                    <td><span id="id_pelanggan"></span></td>
                </tr>
                <tr>
                    <th>NO. INDIHOME</th>
                    <td><span id="no_indihome"></span></td>
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
                    <td><span id="kartu_tanda_penduduk"></span></td>
                </tr>
                <!-- <tr>
                    <th>Foto KTP</th>
                    <td><span id="foto_ktp"></span></td>
                </tr> -->
              </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <?php $no = 0;
foreach($Pe as $data): $no++ ?>
<div class="modal fade" id="detailktp<?php echo $data->ktp_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
       <div height="100%" width="100%" >
          <img class="img-responsive" src="<?php echo base_url('upload/'.$data->image) ?>" height="100%" width="100%">
        </div>
      <div class="modal-body">
             
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- <script src="<?php echo base_url(); ?>assets/AdminLTE-3.0.1/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<!-- <script src="<?php echo base_url(); ?>assets/AdminLTE-3.0.1/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE -->
<!-- <script src="<?php echo base_url(); ?>assets/AdminLTE-3.0.1/dist/js/adminlte.js"></script> -->

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="<?php echo base_url(); ?>assets/AdminLTE-3.0.1/plugins/chart.js/Chart.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/AdminLTE-3.0.1/dist/js/demo.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/AdminLTE-3.0.1/dist/js/pages/dashboard3.js"></script> -->
<?php $this->load->view("admin/_partials/js.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
  function DetailModal(url) {
    $('#btn-delete').attr('href', url);
    $('#dataModal').modal();
  }
</script>

<script>
  $(document).ready(function(){
    $(document).on('click', '#set_dtl', function(){
      var id_pelanggan = $(this).data('id_pelanggan');
      var no_indihome = $(this).data('no_indihome');
      var no_telepon = $(this).data('no_telepon');
      var nama_lengkap = $(this).data('nama_lengkap');
      var nama_kota_kabupaten = $(this).data('nama_kota_kabupaten');
      var nama_kecamatan = $(this).data('nama_kecamatan');
      var nama_desa_kelurahan = $(this).data('nama_desa_kelurahan');
      var alamat = $(this).data('alamat');
      var kodepos = $(this).data('kodepos');
      var no_handphone = $(this).data('no_handphone');
      var email = $(this).data('email');
      var nama_pekerjaan = $(this).data('nama_pekerjaan');
      var kartu_tanda_penduduk = $(this).data('kartu_tanda_penduduk');
      // var foto_ktp = $(this).data('foto_ktp');

      $('#id_pelanggan').text(id_pelanggan);
      $('#no_indihome').text(no_indihome);
      $('#no_telepon').text(no_telepon);
      $('#nama_lengkap').text(nama_lengkap);
      $('#nama_kota_kabupaten').text(nama_kota_kabupaten);
      $('#nama_kecamatan').text(nama_kecamatan);
      $('#nama_desa_kelurahan').text(nama_desa_kelurahan);
      $('#alamat').text(alamat);
      $('#kodepos').text(kodepos);
      $('#no_handphone').text(no_handphone);
      $('#email').text(email);
      $('#nama_pekerjaan').text(nama_pekerjaan);
      $('#kartu_tanda_penduduk').text(kartu_tanda_penduduk);
      // $('#foto_ktp').html(foto_ktp);

    })
  })
</script>
<script>
$(document).ready( function () {
    $("#tabeldata").DataTable({
      rowReorder: {
            selector: 'td:nth-child(2)'
        },
      responsive: true,
    });
  });
</script>

</body>
</html>