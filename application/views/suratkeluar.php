<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Surat Keluar
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th>NO</th>
            <th>NO. SURAT</th>
            <th>PENERIMA</th>
            <th>TGL.KIRIM</th>
            <th>PERIHAL</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 0;
            foreach ($data_surat_keluar as $surat_keluar) {
              echo '
              <tr>
                <td>'.++$no.'</td>
                <td>'.$surat_keluar->nomor_surat.'</td>
                <td>'.$surat_keluar->penerima.'</td>
                <td>'.$surat_keluar->tgl_kirim.'</td>
                <td>'.$surat_keluar->perihal.'</td>
                <td>
                  <a href="'.base_url('/uploads/'.$surat_keluar->file_surat).'" class="btn btn-info btn-sm" target="_blank">Lihat</a>
                  <a href="'.base_url('index.php/surat/hapus_surat_keluar/'.$surat_keluar->id_suratkeluar).'" class="btn btn-danger btn-sm">Hapus</a>

                </td>
              </tr>
              ';
            }
          ?>
          
          
        </tbody>
      </table>
    </div>
  </div>
  <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add">TAMBAH SURAT</a>
</div>
</section>


<!-- MODAL TAMBAH SURAT -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo base_url('index.php/surat/tambah_surat_keluar');?>" method="post" enctype="multipart/form-data">
        <div>
          <h4 class="modal-title" id="modal_addLabel">Tambah Surat Keluar</h4>
        </div>
        <div class="modal-body">
          <div>
            <label>Nomor Surat</label>
            <input type="text" name="no_surat" id="no_surat" class="form-control" required>
          </div>
          <div>
            <label>Tgl.Kirim</label>
            <input type="date" name="tgl_kirim" id="tgl_kirim" class="form-control" required>
          </div>
          <div>
            <label>Penerima</label>
            <input type="text" name="penerima" id="penerima" class="form-control" required>
          </div>
          <div>
            <label>Perihal</label>
            <input type="text" name="perihal" id="perihal" class="form-control" required>
          </div>
          <div>
            <label>Unggah Surat (*.pdf)</label>
            <input type="file" name="file_surat" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
          </div>
      </form>
    </div>
  </div>
</div>
