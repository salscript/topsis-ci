<!-- Content Header (Page header) -->
<section class="content-header">
    <?php
        if ($_SESSION['role'] == 'ADMIN') {
    ?>
        <h1 id="headtitle">
            Halaman Utama
        </h1>
    <?php } else { ?>
        <h1 id="headtitle">
            Perhitungan Hasil Rangking
        </h1>
    <?php } ?>
</section>

<!-- Main content -->
<?php
    if ($_SESSION['role'] == 'ADMIN') {
?>
<section class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $json->member ?></h3>
                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="<?= base_url('users') ?>" class="small-box-footer">Lebih detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $json->periode ?></h3>
                    <p>Jumlah Periode</p>
                </div>
                <div class="icon">
                    <i class="ion ion-calendar"></i>
                </div>
                <a href="<?= base_url('Periode') ?>" class="small-box-footer">Lebih detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $json->alternatif ?></h3>
                    <p>Jumlah Alternatif</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= base_url('Alternatif') ?>" class="small-box-footer">Lebih detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
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
<?php
    } else if ($_SESSION['role'] == "SUPPLIER") {
?>
<section class="content">
    <p>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="perid2">Pilih Periode</label>
                <select class="form-control" id="perid2">
                    <?php
                        foreach ($listperiod as $key) {
                            $tgl_mulai = date('Y/m/d', strtotime($key->tgl_mulai)); // contoh: 2025/01
                            $tgl_selesai = date('Y/m/d', strtotime($key->tgl_selesai)); // contoh: 31
                            echo "<option value='{$key->id_tahun}'>{$tgl_mulai} s/d {$tgl_selesai}</option>";
                        ?>
                        <?php
                        }
                    ?>
                </select>
                <br>
                <button type="submit" id="carper2" class="btn btn-info btn-block">Cari</button>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
  </p>

</section>

<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <p id="ganti-supp">
                
            </p>
        </div>
    </div>
</section>
<?php } ?>

<script>
  const role = <?= json_encode($role); ?>;
  console.log(role);
</script>
<!-- /.content --> 