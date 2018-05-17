<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
    DISPOSISI SURAT
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
            <th>ID DISPOSISI</th>
            <th>ID SURAT</th>
            <th>ID PEGAWAI PENGIRIM</th>
            <th>ID PEGAWAI PENERIMA</th>
            <th>TGL DISPOSISI</th>
            <th>KETERANGAN</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 0;
            foreach ($data_disposisi_surat as $disposisi) {
              echo '
              <tr>
                <td>'.++$no.'</td>
                <td>'.$disposisi->id_disposisi.'</td>
                <td>'.$disposisi->id_surat.'</td>
                <td>'.$disposisi->id_pegawai_pengirim.'</td>
                <td>'.$disposisi->id_pegawai_penerima.'</td>
                <td>'.$disposisi->tgl_disposisi.'</td>
                <td>'.$disposisi->keterangan.'</td>
                <td>
                  <a href="'.base_url('/uploads/'.$disposisi->file_surat).'" class="btn btn-info btn-sm" target="_blank">Lihat</a>
                  <a href="'.base_url('index.php/surat/disposisisurat/'.$disposisi->id_disposisi).'" class="btn btn-primary btn-sm">Disposisi</a>
                  <a href="'.base_url('index.php/surat/hapus_disposisi/'.$disposisi->id_disposisi).'" class="btn btn-danger btn-sm">Hapus</a>

                </td>
              </tr>
              ';
            }
          ?>
          
          
        </tbody>
      </table>
    </div>
  </div>
  <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add">TAMBAH DISPOSISI</a>
</div>
</section>

<!-- MODAL TAMBAH SURAT -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo base_url('index.php/surat/tambah_disposisi');?>" method="post" enctype="multipart/form-data">
        <div>
          <h4 class="modal-title" id="modal_addLabel">Tambah Disposisi</h4>
        </div>
        <div class="modal-body">
          <div>
            <label>ID SURAT</label>
            <input type="text" name="id_surat" id="id_surat" class="form-control" required>
          </div>
          <div>
            <label>ID PEGAWAI PENGIRIM</label>
            <input type="text" name="id_pegawai_penerima" id="id_pegawai_penerima" class="form-control" required>
          </div>
          <div>
            <label>ID PEGAWAI PENERIMA</label>
            <input type="text" name="id_pegawai_pengirim" id="id_pegawai_pengirim" class="form-control" required>
          </div>
          <div>
            <label>TGL DISPOSISI</label>
            <input type="date" name="tgl_disposisi" id="tgl_disposisi" class="form-control" required>
          </div>
          <div>
            <label>KETERANGAN</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" required>
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

