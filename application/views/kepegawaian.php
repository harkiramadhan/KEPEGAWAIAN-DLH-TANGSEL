<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0"><strong><?= $pegawai->nama ?></strong></h5>
                </div>
            </div>
            <div class="card-body">
                <p class="text-uppercase text-sm">Informasi Pegawai</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama</label>
                            <input class="form-control" type="text" name="nama" value="<?= $pegawai->nama ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="ms-0">Jenis Kelamin<small class="text-warning ms-1">*</small></label>
                        <div class="d-flex">
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="radio" id="customRadio1" value="L" name="jenis_kelamin" <?= ($pegawai->jenis_kelamin == 'L') ? 'checked' : '' ?> required>
                                <label class="custom-control-label font-weight-normal" for="customRadio1">Laki - laki</label>
                            </div>
                            <div class="form-check ms-3">
                                <input class="form-check-input" type="radio" id="customRadio2" value="P" name="jenis_kelamin" <?= ($pegawai->jenis_kelamin == 'P') ? 'checked' : '' ?> required>
                                <label class="custom-control-label font-weight-normal" for="customRadio2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Email</label>
                            <input class="form-control" type="email" name="email" value="<?= $pegawai->email ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">First name</label>
                            <input class="form-control" type="text" value="Jesse">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Last name</label>
                            <input class="form-control" type="text" value="Lucky">
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Contact Information</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Address</label>
                            <input class="form-control" type="text" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">City</label>
                            <input class="form-control" type="text" value="New York">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Country</label>
                            <input class="form-control" type="text" value="United States">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Postal code</label>
                            <input class="form-control" type="text" value="437300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-4">
        <div class="card card-profile">
            <img src="<?= base_url('assets/img/bg-profile.jpg') ?>" alt="Image placeholder" class="card-img-top">
        </div>
    </div> -->
    <div class="col-md-4">
        <div class="card shadow-1 mb-3 position-sticky top-1">
            <div class="card-body">
                <div class="mb-3">
                    <label>PAS FOTO 4*6</label>
                    <img id="image-preview" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/img/logo.png') ?>" style="width: 100%;">
                    <input class="form-control form-control-lg" name="foto" type="file" id="image-source" onchange="previewImage();">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mt-3">
        <button type="button" class="btn btn-sm btn-success w-100"><i class="fas fa-save me-2"></i>SIMPAN DATA</button>
    </div>
</div>