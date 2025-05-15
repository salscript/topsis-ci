<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 id="headtitle">
        Quick Menu
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Profil</h3>
                </div>
                <div class="box-body">
                    <form method="post" id="gantifoto" enctype="multipart/form-data">
                        <input type="hidden" name="iduser" class="form-control" id="idus" value="<?= $this->session->id ?>" readonly>
                        <table class="table">
                            <tr>
                                <td>Username</td>
                                <td><b><?= $this->session->user ?></b></td>
                            </tr>
                            <tr>
                                <td>Hak Akses</td>
                                <td><b><?= $this->session->role ?></b></td>
                            </tr>
                            <tr>
                            <td> <img class="attachment-img form-control" id="priv2" src="<?= base_url("assets/images/".$this->session->foto) ?>" style="width:128px;height:128px" alt="Image Preview">
                                </td>
                                <td><label for="foto">Foto</label>
                                    <input type="file" name="foto2" id="foto2" class="form-control"></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary pull-right">Update Foto</button>
                    </form>
                </div>
            </div>
        </div>
        
</section>
<!-- /.content --> 