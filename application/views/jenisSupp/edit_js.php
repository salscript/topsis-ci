<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></button>
  <h4 class="modal-title">Edit Jenis Supplier</h4>
</div>
<div class="modal-body">
  <div class="box-body">
    <form id="editk" class="form-horizontal" method="post">
      <div class="form-group">
        <input type="hidden" name="idjs" value="<?= $datajs->id ?>">
        <label for="nama" class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" name="nama" class="form-control" id="nama" value="<?= $datajs->nama ?>" required>
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary pull-right" value="Update Data">
      </div>
    </form>
  </div>
</div>