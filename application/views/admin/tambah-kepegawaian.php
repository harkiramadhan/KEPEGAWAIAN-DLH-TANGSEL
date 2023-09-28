<form action="<?= site_url('admin/kepegawaian/create') ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-9 mt-3">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0"><strong>TAMBAH PEGAWAI</strong></h5>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Informasi Pegawai</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">NIP</label>
                                <input class="form-control <?= ($this->session->flashdata('error_nip') == TRUE) ? 'is-invalid' : '' ?>" type="number" name="nip" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="nama" value="<?= $this->session->flashdata('nama') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tempat Lahir <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="kd_lokasi_lahir" value="<?= $this->session->flashdata('kd_lokasi_lahir') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Lahir <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="date" name="tgl_lahir1" value="<?= $this->session->flashdata('tgl_lahir1') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="ms-0">Jenis Kelamin <small><strong class="text-danger">*</strong></small></label>
                            <div class="d-flex">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" id="customRadio1" value="L" name="jenis_kelamin" <?= ($this->session->flashdata('jenis_kelamin') == 'L') ? 'checked' : '' ?>>
                                    <label class="custom-control-label font-weight-normal" for="customRadio1">Laki - laki</label>
                                </div>
                                <div class="form-check ms-3">
                                    <input class="form-check-input" type="radio" id="customRadio2" value="P" name="jenis_kelamin" <?= ($this->session->flashdata('jenis_kelamin') == 'P') ? 'checked' : '' ?>>
                                    <label class="custom-control-label font-weight-normal" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="email" name="email" value="<?= $this->session->flashdata('email') ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Alamat <small><strong class="text-danger">*</strong></small></label>
                                <textarea name="alamat" class="form-control" id="" cols="10" rows="5"><?= $this->session->flashdata('alamat') ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">KTP</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor KTP <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="number" name="NOKTP" value="<?= $this->session->flashdata('NOKTP') ?>">
                            </div>

                            <img id="image-preview-KTP" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto KTP <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" name="DOC_KTP" id="image-source-KTP" onchange="previewImageKTP();">
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">REKENING</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor Rekening <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="number" name="NOREK" value="<?= $this->session->flashdata('NOREK') ?>">
                            </div>

                            <img id="image-preview-REK" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto Rekening <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" id="image-source-REK" name="DOC_REK" onchange="previewImageREK();">
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">BPJS KESEHATAN</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor BPJS KESEHATAN<small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="number" name="NOBPJS" value="<?= $this->session->flashdata('NOBPJS') ?>">
                            </div>

                            <img id="image-preview-BPJS" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto BPJS KESEHATAN<small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" id="image-source-BPJS" name="DOC_BPJS" onchange="previewImageBPJS();">
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">BPJS KETENAGAKERJAAN</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor BPJS KETENAGAKERJAAN<small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="number" name="NOBPJSNAKER" value="<?= $this->session->flashdata('NOBPJSNAKER') ?>">
                            </div>

                            <img id="image-preview-BPJS-Naker" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto BPJS KETENAGAKERJAAN<small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" id="image-source-BPJS-Naker" name="DOC_BPJSNAKER" onchange="previewImageBPJSNaker();">
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">NPWP</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor NPWP <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="number" name="NPWP" value="<?= $this->session->flashdata('NPWP') ?>">
                            </div>

                            <img id="image-preview-NPWP" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto NPWP</label>
                                <input class="form-control" type="file" id="image-source-NPWP" name="DOC_NPWP" onchange="previewImageNPWP();">
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">
                    <div class="row">
                        <p class="text-uppercase text-sm mb-n2">PENDIDIKAN</p>
                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Ijasah <small><strong class="text-danger">*) PDF</strong></small></label>
                                <input class="form-control" type="file" name="DOC_IJASAH">
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jenjang Pendidikan <small><strong class="text-danger">*</strong></small></label>
                                <select class="form-control" name="JENJANG" id="">
                                    <option value=""> - Pilih Jenjang Pendidikan</option>
                                    <option <?= ($this->session->flashdata('JENJANG') == 'SD') ? 'selected' : '' ?> value="SD"> SD</option>
                                    <option <?= ($this->session->flashdata('JENJANG') == 'SMP') ? 'selected' : '' ?> value="SMP"> SMP</option>
                                    <option <?= ($this->session->flashdata('JENJANG') == 'SMA') ? 'selected' : '' ?> value="SMA"> SMA</option>
                                    <optgroup label="DIPLOMA">
                                        <option <?= ($this->session->flashdata('JENJANG') == 'D1') ? 'selected' : '' ?> value="D1"> D1</option>
                                        <option <?= ($this->session->flashdata('JENJANG') == 'D2') ? 'selected' : '' ?> value="D2"> D2</option>
                                        <option <?= ($this->session->flashdata('JENJANG') == 'D3') ? 'selected' : '' ?> value="D3"> D3</option>
                                        <option <?= ($this->session->flashdata('JENJANG') == 'D4') ? 'selected' : '' ?> value="D4"> D4</option>
                                    </optgroup>
                                    <optgroup label="SARJANA">
                                        <option <?= ($this->session->flashdata('JENJANG') == 'S1') ? 'selected' : '' ?> value="S1"> S1</option>
                                        <option <?= ($this->session->flashdata('JENJANG') == 'S2') ? 'selected' : '' ?> value="S2"> S2</option>
                                        <option <?= ($this->session->flashdata('JENJANG') == 'S3') ? 'selected' : '' ?> value="S3"> S3</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jurusan <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="JURUSAN" value="<?= $this->session->flashdata('JURUSAN') ?>">
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
                        <img id="image-preview" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                        <input class="form-control form-control-lg" name="FOTO" type="file" id="image-source" onchange="previewImage();">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 mt-3">
            <button type="submit" class="btn btn-success w-100"><i class="fas fa-save me-2"></i>SIMPAN DATA</button>
        </div>
    </div>
</form>