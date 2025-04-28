<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></button>
  <h4 class="modal-title">Tambah Alternatif</h4>
</div>
<div class="modal-body">
  <div class="box-body">
    <form id="addal" class="form-horizontal" method="post">
      <div class="form-group">
        <label for="ket" class="col-sm-2 control-label">Keterangan</label>
        <div class="col-sm-10">
          <input type="text" name="ket" class="form-control" id="ket" placeholder="Isi Nama Objek" required>
        </div>
      </div>
      <div class="form-group">
  <label for="per" class="col-sm-2 control-label">Periode</label>
  <div class="col-sm-10">
    <select name="id_tahun" id="per" class="form-control" required>
      <?php
        foreach ($periode as $key) {
          $tgl_mulai = date("Y/m", strtotime($key->tgl_mulai));  // contoh: 2025/01
          $tgl_selesai = date("d", strtotime($key->tgl_selesai)); // contoh: 31
          echo "<option value='{$key->id_tahun}'>{$tgl_mulai}-{$tgl_selesai}</option>";
        }
      ?>
    </select>
  </div>
</div>

      <div class="form-group">
        <label for="stat" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
          <select name="status" id="stat" class="form-control" required>
            <?php
              $role=array('Non-Aktif','Aktif');
              foreach ($role as $key=>$value) {
                  ?>
                  <option value="<?=$key?>"><?=$value?></option>
                <?php
              }
            ?>
          </select>
        </div>
      </div>
    <p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td>Kriteria</td>
              <td>Nilai</td>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($kriteria as $key) {
                // echo $key->ketkri.' '.$key->nilai.'<br>';
                ?>
                  <tr>
                    <td>
                      <?=$key->ketkri?>
                      <input type="hidden" name="idkrit<?= $key->idkri ?>" class="form-control" id="idkrit<?= $key->idkri ?>" value=<?= $key->idkri ?>>
                    </td>
                    <td>
                      <select name="subkrit<?= $key->idkri ?>" id="subkrit<?= $key->idkri ?>" class="form-control select2bs4 font-weight-normal text-sm" required>
                        <option value="0" selected disabled>Select an option</option>
                          <?php foreach ($subkriteria as $row) { ?>
                            <?php if ($row->idkri === $key->idkri) { ?>
                              <option value="<?= $row->bobot ?>">
                                <?= $row->nama_sub ?>
                              </option>
                            <?php } ?>
                          <?php } ?>
                      </select>
                    </td>
                  </tr>
                <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" value="Tambah Alternatif">
        <button class="btn btn-default btn-block" data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
</div>