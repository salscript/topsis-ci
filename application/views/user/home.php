<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 id="headtitle">
        Halaman Utama
    </h1>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
        <div class="col-xs-12">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Akses</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tablehistory">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th>Aksi</th>
                                        <th>Eksekutor</th>
                                        <th>Tanggal Aksi</th>
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
    </div>
</section>
<script>
  const role = <?= json_encode($role); ?>;
  console.log(role);
</script>
<!-- /.content --> 