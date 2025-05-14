<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 id="headtitle">
    Daftar Periode
  </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body" id="isikonten">
            <?php
            if ($this->session->userdata('role') == 'ADMIN' || $this->session->userdata('role') == 'OPERTAOR'):
            ?>
    <a href="javascript:void(0)" class="btn btn-primary btn-block" id="periodadd">
        <i class="fa fa-plus-circle"></i> Tambah Periode
    </a>
<?php endif; ?>

            <p></p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tabelperiode">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Awal Periode</th>
                                <th>Akhir Periode</th>
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