<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></button>
  <h4 class="modal-title">Add Periode</h4>
</div>
<div class="modal-body">
  <div class="box-body">
    <form id="addp" class="form-horizontal" method="post">
      <div class="form-group">
        <label for="awal" class="col-sm-2 control-label">Tanggal Awal</label>
        <div class="col-sm-10">
          <input type="date" name="tglawal" class="form-control" id="awal" required>
        </div>
      </div>
      <div class="form-group">
        <label for="akhir" class="col-sm-2 control-label">Tanggal Akhir</label>
        <div class="col-sm-10">
          <input type="date" name="tglakhir" class="form-control" id="akhir" required>
        </div>
      </div>
     
      <div class="form-group">
        <button class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary pull-right" id="updateusn" value="Tambah Data">
      </div>
    </form>
  </div>
</div>