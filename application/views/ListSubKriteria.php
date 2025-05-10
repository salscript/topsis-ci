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
            <?php
            // $role = $this->session->userdata('role');
            if ($this->session->userdata('role') == 'ADMIN' || $this->session->userdata('role') == 'OPERTAOR'):
            ?>
                <a href="javascript:void(0)" class="btn btn-primary btn-block" id="subKritAdd">
                    <i class="fa fa-plus-circle"></i> Tambah Sub Kriteria
                </a>
            <?php endif; ?>
            
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
                              <?php 
                                if($_SESSION['role'] != 'SUPPLIER') {
                              ?>
                                <th>Opsi</th>
                              <?php 
                                }
                              ?>
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
<script>
  const role = <?= json_encode($role); ?>;
  console.log(role);
</script>
<!-- /.content -->
