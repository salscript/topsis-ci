<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></button>
  <h4 class="modal-title">Add Sub Kriteria</h4>
</div>
<div class="modal-body">
  <div class="box-body">
    <form id="addsk" class="form-horizontal" method="post">
      <div class="form-group">
        <label for="idkri" class="col-sm-3 ">Kriteria</label>
        <div class="col-sm-9">
          <select name="idkri" id="idkri" class="form-control">
            <option value="0" selected disabled>Select an option</option>
              <?php foreach ($kriteria as $row) { ?>
                <option value="<?= $row->idkri ?>">
                  <?= $row->ketkri ?>
                </option>
              <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="nama_sub" class="col-sm-3 ">Nama Sub Kriteria</label>
        <div class="col-sm-9">
          <input type="text" name="nama_sub" class="form-control" id="nama_sub" required>
        </div>
      </div>
      <div class="form-group">
        <label for="indikator" class="col-sm-3 ">Indikator</label>
        <div class="col-sm-9">
          <textarea name="indikator" id="indikator" class="form-control" required></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="bobot" class="col-sm-3 ">Bobot</label>
        <div class="col-sm-9">
          <input type="number" name="bobot" class="form-control" id="bobot" required>
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary pull-right" value="Tambah Data">
      </div>
    </form>
  </div>
</div>