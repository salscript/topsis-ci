<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 id="headtitle">
    Daftar Sub Kriteria
  </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body" id="isikonten">
              
              <!-- Tombol Tambah Sub Kriteria -->
              <a href="javascript:void(0)" class="btn btn-primary btn-block" id="subKritAdd">
                <i class="fa fa-plus-circle"></i> Tambah Sub Kriteria
              </a>
              <p></p>
              
              <!-- Tabel Sub Kriteria -->
              <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="tabelSubKriteria">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Id Kriteria</th>
                              <th>Nama</th>
                              <th>Indikator</th>
                              <th>Bobot</th>
                              <th>Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
              </div>

            </div>
          </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!-- Modal Tambah Sub Kriteria -->
<div class="modal fade" id="modalSubKritAdd" tabindex="-1" role="dialog" aria-labelledby="modalSubKritAddLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formSubKritAdd">
        <div class="modal-header">
          <h4 class="modal-title" id="modalSubKritAddLabel">Tambah Sub Kriteria</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="idkri">ID Kriteria</label>
            <input type="text" class="form-control" id="idkri" name="idkri" required>
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
            <input type="number" class="form-control" id="bobot" name="bobot" required step="0.1" min="0">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- Script AJAX untuk Tambah Sub Kriteria -->
<script type="text/javascript">
$(document).ready(function(){

  // Tampilkan modal saat klik tombol tambah
  $('#subKritAdd').click(function(){
    $('#modalSubKritAdd').modal('show');
  });

  // Proses submit form
  $('#formSubKritAdd').submit(function(e){
    e.preventDefault();
    $.ajax({
      url: '<?= site_url('SubKriteria/addSubKriteria') ?>',
      type: 'POST',
      data: $(this).serialize(),
      success: function(response){
        alert('Sub Kriteria berhasil ditambahkan');
        $('#modalSubKritAdd').modal('hide');
        $('#formSubKritAdd')[0].reset();
        $('#tabelSubKriteria').DataTable().ajax.reload(); // Reload DataTables
      },
      error: function(xhr, status, error){
        alert('Gagal menambahkan Sub Kriteria: ' + xhr.responseText);
      }
    });
  });

  // Load data ke dalam tabel (kalau pakai DataTables)
  $('#tabelSubKriteria').DataTable({
    ajax: {
      url: "<?= site_url('SubKriteria/listSubKriteria') ?>",
      dataSrc: ''
    },
    columns: [
      { data: 'nomor' },
      { data: 'idkri' },
      { data: 'nama_sub' },
      { data: 'indikator' },
      { data: 'bobot' },
      {
        data: null,
        render: function(data, type, row){
          return `
            <button class="btn btn-warning btn-sm">Edit</button>
            <button class="btn btn-danger btn-sm">Hapus</button>
          `;
        }
      }
    ]
  });

});
</script>
