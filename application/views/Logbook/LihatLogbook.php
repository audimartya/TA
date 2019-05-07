<script type="text/javascript">
  $(document).ready(function() {
      $('#logbook').DataTable();
  } );
</script> 
 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">LOGBOOK PANGKALAN </h4>
                                <div align="right">            
                                  <a href="<?php echo site_url('Logbook/export_excel/') ?>">
                                                  <button type="button" class="btn btn-primary btn-rounded btn-sm" type="submit">EXPORT EXCEL</button>
                                              </a>
                                  </div>
                                  <div align="left">
                                    <select name="bulan">
                                       <a href="<?php echo site_url('Logbook/get_bulan/') ?>">
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="12">November</option>
                                    <option value="12">Desember</option>
                                  </a>
                                    </select>
                                    <input type="submit" name="btn" value="Cari">
                            
                            </div>
                          
<h1>Table Baru</h1>

<?php
$jumlah_hari = 1;

$semua_pembeli = $this->db->query("SELECT * FROM distribusi2 GROUP BY nama_pembeli, jenis_pembeli, alamat_pembeli, keterangan, jumlah_gas")->result_array();
?>
<table class="table">
  <thead>
    <tr>
      <th>Nama Pembeli</th>
      <th>Jenis Pembeli</th>
      <th>Alamat Pembeli</th>
      <th>Keterangan</th>
      <?php for($jumlah_hari=1; $jumlah_hari < 32; $jumlah_hari++) { ?>
      <th><?php echo $jumlah_hari; ?></th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($semua_pembeli as $pembeli) { ?>
    <tr>
      <td><?php echo $pembeli['nama_pembeli']; ?></td>
      <td><?php echo $pembeli['jenis_pembeli']; ?></td>
      <td><?php echo $pembeli['alamat_pembeli']; ?></td>
      <td><?php echo $pembeli['keterangan']; ?></td>
      <?php for($jumlah_hari=1; $jumlah_hari < 32; $jumlah_hari++) { ?>
     <th><?php echo $this->LogbookModel->getData($pembeli['jumlah_gas'], $month, $jumlah_hari); ?></th>
      <?php } ?>
    </tr>
    
    <?php } ?>

   <!--  <tr>
      <?php foreach($semua_pembeli as $pembeli) { ?>
      <td></td>
      <td></td>
      <td><th>STOCK TOTAL</th></td>
      <th><?php echo $this->LogbookModel->getTotal($pembeli['id_member'], $month, $jumlah_hari); ?></th>
      <?php } ?>

    </tr> -->
  </tbody>
</table>


                          </div>
                        </div>
                    </div>


                  <div class="col-md-12"></div>


                </div>
            </div>
        </div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#tabelpelanggan').DataTable();
  });

  $('#notif').slideDown('slow').delay(3000).slideUp('slow');
</script>
