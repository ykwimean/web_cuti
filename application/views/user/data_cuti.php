<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors();  ?>
            </div>
            <?php endif; ?>

            <?php echo $this->session->flashdata('message'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Alasan</th>
                        <th scope="col">Tanggal diajukan</th>
                        <th scope="col">Mulai</th>
                        <th scope="col">Berakhir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php $i = 1; ?>
                    <?php foreach ($pegawai as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $p['nama_lengkap']; ?></td>
                        <td><?= $p['alasan']; ?></td>
                        <td><?= $p['tgl_diajukan']; ?></td>
                        <td><?= $p['mulai']; ?></td>
                        <td><?= $p['berakhir']; ?></td>
                        <td>
                            <a href="#" class="badge badge-warning">Ubah</a>
                            <a href="#" class="badge badge-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?> -->
                </tbody>
            </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->