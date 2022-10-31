<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tracking Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php if ($this->session->flashdata('sukses')) : ?>
        <script>
            swal.fire({
                title: 'Data Berhasil Di Proses!!',
                text: "<?php echo $this->session->flashdata('berhasil'); ?>",
                type: 'success'
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')) : ?>
        <script>
            swal.fire({
                title: 'Oops!!',
                text: "<?php echo $this->session->flashdata('error'); ?>",
                type: 'error'
            });
        </script>
    <?php endif; ?>

    <!-- Main content -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- /.card -->
                    <div class="col-md-12">
                        <div class="card card-danger collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Form Pengepakan</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        Input &nbsp;<i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?= base_url('traking') ?>" method="post">
                                    <div class="row col-md-12">
                                        <!-- checkbox -->
                                        <table class="table table-bordered">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <tr>
                                                    <td>
                                                        <div class="col-10 mr-sm-10">
                                                            <input type="text" class="form-control" required autocomplete="off" name='no_pengepakan' placeholder="Masukkan No. Pengepakan">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox my-1 mr-sm-3 col-3">
                                                            <input type="checkbox" class="custom-control-input custom-control-input-danger custom-control-input-outline" name="picking" id="check-1" value="<?php echo date("d-m-Y H:i:s"); ?>">
                                                            <label class=" custom-control-label" for="check-1">Picking</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox my-1 mr-sm-3 col-3">
                                                            <input type="checkbox" class="custom-control-input custom-control-input-warning custom-control-input-outline" name="packing" id="check-2" value="<?php echo date("d-m-Y H:i:s"); ?>">
                                                            <label class=" custom-control-label" for="check-2">Packing</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox my-1 mr-sm-3 col-3">
                                                            <input type="checkbox" class="custom-control-input custom-control-input-success custom-control-input-outline" name="kirim" id="check-3" value="<?php echo date("d-m-Y H:i:s"); ?>">
                                                            <label class=" custom-control-label" for="check-3">Kirim</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type=" submit" class="btn btn-outline-success btn-sm text-center"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-check-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                                </svg> &nbsp; Proses</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </div>
                                        </table>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </section>
    <br>
    <!-- tabel data -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- /.card -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Data Pengepakan</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pengepakan</th>
                                        <th>Picking</th>
                                        <th>Packing</th>
                                        <th>Kirim</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
</div>
</section>