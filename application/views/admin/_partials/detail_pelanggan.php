<div class="container-fluid">
    <div class="row">
        <div class="col-md">
        <?php foreach($ViewP as $pelanggans){ ?>
        ID: <?php echo $pelanggans->id_pelanggan ?> <br>
        No. Indihome: <?php echo $pelanggans->no_indihome ?> <br>
        No Telepon: <?php echo $pelanggans->no_telepon ?><br>
        Nama: <?php echo $pelanggans->nama_lengkap ?><br>
        Kota Kabupaten: <?php echo $pelanggans->nama_kota_kabupaten ?><br>
        Kecamatan:<?php echo $pelanggans->nama_kecamatan ?> <br>
        Desa Kelurahan: <?php echo $pelanggans->nama_desa_kelurahan ?><br>
        Alamat: <?php echo $pelanggans->alamat ?><br>
        Kode POS: <?php echo $pelanggans->kodepos ?><br>
        No Handphone: <?php echo $pelanggans->no_handphone ?><br>
        Email: <?php echo $pelanggans->email ?><br>
        Pekerjaan: <?php echo $pelanggans->nama_pekerjaan ?><br>
      <?php } ?> 
        </div>
    </div>
</div>