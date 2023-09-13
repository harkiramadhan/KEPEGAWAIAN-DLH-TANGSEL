<form action="<?= site_url('kepegawaian/update') ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-9 mt-3">
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
                                <label for="example-text-input" class="form-control-label">NIP</label>
                                <input class="form-control" type="number" name="nip" value="<?= $pegawai->nip ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="nama" value="<?= $pegawai->nama ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="ms-0">Jenis Kelamin <small><strong class="text-danger">*</strong></small></label>
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
                                <label for="example-text-input" class="form-control-label">Email <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="email" name="email" value="<?= $pegawai->email ?>" required>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="horizontal dark">

                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">KTP</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor KTP <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="number" name="NOKTP" value="<?= $pegawai->NOKTP ?>" required>
                            </div>

                            <?php if($pegawai->DOC_KTP): ?>
                                <img id="image-preview-KTP" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->DOC_KTP) ?>" style="width: 100%;">
                            <?php else: ?>
                                <img id="image-preview-KTP" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto KTP <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" name="DOC_KTP" id="image-source-KTP" onchange="previewImageKTP();" <?= ($pegawai->DOC_KTP) ? '' : 'required' ?>>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">REKENING</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor Rekening <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="number" name="NOREK" value="<?= $pegawai->NOREK ?>" required>
                            </div>

                            <?php if($pegawai->DOC_REK): ?>
                                <img id="image-preview-REK" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->DOC_REK) ?>" style="width: 100%;">
                            <?php else: ?>
                                <img id="image-preview-REK" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto Rekening <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" id="image-source-REK" name="DOC_REK" onchange="previewImageREK();" <?= ($pegawai->DOC_REK) ? '' : 'required' ?>>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">BPJS</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor BPJS <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="number" name="NOBPJS" value="<?= $pegawai->NOBPJS ?>" required>
                            </div>

                            <?php if($pegawai->DOC_BPJS): ?>
                                <img id="image-preview-BPJS" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->DOC_BPJS) ?>" style="width: 100%;">
                            <?php else: ?>
                                <img id="image-preview-BPJS" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto BPJS <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" id="image-source-BPJS" name="DOC_BPJS" onchange="previewImageBPJS();" <?= ($pegawai->DOC_BPJS) ? '' : 'required' ?>>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">NPWP</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor NPWP <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="number" name="NPWP" value="<?= $pegawai->NPWP ?>" required>
                            </div>

                            <?php if($pegawai->DOC_NPWP): ?>
                                <img id="image-preview-NPWP" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->DOC_NPWP) ?>" style="width: 100%;">
                            <?php else: ?>
                                <img id="image-preview-NPWP" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto NPWP</label>
                                <input class="form-control" type="file" id="image-source-NPWP" name="DOC_NPWP" onchange="previewImageNPWP();" <?= ($pegawai->DOC_NPWP) ? '' : 'required' ?>>
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">

                    <div class="row">
                        <p class="text-uppercase text-sm mb-n2">DOKUMEN</p>
                        <div class="col-md-4 mt-3">
                            <?php if($pegawai->DOC_SK): ?>
                                <div class="ratio ratio-4x3">
                                    <embed type="application/pdf" src="<?= base_url('assets/doc/' . $pegawai->DOC_SK) ?>" width="600" height="400"></embed>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">SK <small><strong class="text-danger">*) PDF</strong></small></label>
                                <input class="form-control" type="file" name="DOC_SK" value="<?= $pegawai->DOC_SK ?>" <?= ($pegawai->DOC_SK) ? '' : 'required' ?>>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <?php if($pegawai->DOC_HONOR): ?>
                                <div class="ratio ratio-4x3">
                                    <embed type="application/pdf" src="<?= base_url('assets/doc/' . $pegawai->DOC_HONOR) ?>" width="600" height="400"></embed>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Honor <small><strong class="text-danger">*) PDF</strong></small></label>
                                <input class="form-control" type="file" name="DOC_HONOR" value="<?= $pegawai->DOC_HONOR ?>" <?= ($pegawai->DOC_HONOR) ? '' : 'required' ?>>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <?php if($pegawai->DOC_IJASAH): ?>
                                <div class="ratio ratio-4x3">
                                    <embed type="application/pdf" src="<?= base_url('assets/doc/' . $pegawai->DOC_IJASAH) ?>" width="600" height="400"></embed>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Ijasah <small><strong class="text-danger">*) PDF</strong></small></label>
                                <input class="form-control" type="file" name="DOC_IJASAH" value="<?= $pegawai->DOC_IJASAH ?>" <?= ($pegawai->DOC_IJASAH) ? '' : 'required' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card shadow-1 mb-3 position-sticky top-1">
                <div class="card-body">
                    <div class="mb-3">
                        <label>PAS FOTO 4*6 <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></label>
                        <?php if($pegawai->FOTO): ?>
                            <img id="image-preview" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->FOTO) ?>" style="width: 100%;">
                        <?php else: ?>
                            <img id="image-preview" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                        <?php endif; ?>

                        <input class="form-control form-control-lg" name="FOTO" type="file" id="image-source" onchange="previewImage();" <?= ($pegawai->FOTO) ? '' : 'required' ?>>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 mt-3">
            <button type="submit" class="btn btn-success w-100"><i class="fas fa-save me-2"></i>SIMPAN DATA</button>
        </div>
    </div>
</form>