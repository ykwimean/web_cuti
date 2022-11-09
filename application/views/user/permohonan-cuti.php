<!-- Begin Page Content -->
<div class="container-lg">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="container-lg">

        <?php echo $this->session->flashdata('message'); ?>

        <form action="<?= base_url('user/data_cuti'); ?>" method="POST">
            <div class="form-group">
                <label for="alasan">Alasan</label>
                <textarea class="form-control" id="alasan" rows="3" name="alasan" required></textarea>
            </div>
            <div class="form-group">
                <label for="perihal_cuti">Perihal Cuti</label>
                <input type="text" class="form-control" id="perihal_cuti" aria-describedby="perihal_cuti"
                    name="perihal_cuti" required>
            </div>
            <div class="form-group">
                <label for="mulai">Mulai Cuti</label>
                <input type="date" class="form-control" id="mulai" aria-describedby="mulai" name="mulai" required>
            </div>
            <div class="form-group">
                <label for="berakhir">Berakhir Cuti</label>
                <input type="date" class="form-control" id="berakhir" aria-describedby="berakhir" name="berakhir"
                    required>

            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div><!-- /.container-fluid -->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->