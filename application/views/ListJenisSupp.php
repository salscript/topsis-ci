<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 id="headtitle">
    Daftar Jenis Supplier
  </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body" id="isikonten">
              <a href="javascript:void(0)" class="btn btn-primary btn-block" id="jenisSuppAdd"><i class="fa fa-plus-circle"></i> Tambah Jenis Supplier</a>
            <p></p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tabelJenisSupp">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
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
<script>
  const role = <?= json_encode($role); ?>;
  console.log(role);
</script>
<!-- /.content -->