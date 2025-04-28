<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahSubKriteria">
  + Tambah Sub Kriteria
</button>
<!-- Modal Tambah Sub Kriteria -->
<div class="modal fade" id="modalTambahSubKriteria" tabindex="-1" role="dialog" aria-labelledby="modalTambahSubKriteriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= site_url('SubKriteria/addSubKriteria') ?>" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahSubKriteriaLabel">Tambah Sub Kriteria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          
          <div class="form-group">
            <label for="idkri">Kriteria</label>
            <select class="form-control" id="idkri" name="idkri" required>
              <option value="">-- Pilih Kriteria --</option>
              <?php foreach($kriteria as $kri): ?>
                <option value="<?= $kri->idkri ?>"><?= $kri->ketkri ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="nama_sub">Nama Sub Kriteria</label>
            <input type="text" class="form-control" id="nama_sub" name="nama_sub" required>
          </div>

          <div class="form-group">
            <label for="indikator">Indikator</label>
            <input type="text" class="form-control" id="indikator" name="indikator" required>
          </div>

          <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="number" class="form-control" id="bobot" name="bobot" step="0.1" min="0" required>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </div>
    </form>
  </div>
</div>
