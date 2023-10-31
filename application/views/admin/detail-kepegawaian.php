<form action="<?= site_url('admin/kepegawaian/update/' . $pegawai->id) ?>" method="post" enctype="multipart/form-data">
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
                                <input class="form-control" type="text" name="nip" value="<?= $pegawai->nip ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="nama" value="<?= $pegawai->nama ?>" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="ms-0">Status <small><strong class="text-danger">*</strong></small></label>
                            <div class="d-flex">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" id="customRadio1" value="1" name="status" <?= ($pegawai->status == 1) ? 'checked' : '' ?> >
                                    <label class="custom-control-label font-weight-normal" for="customRadio1">AKTIF</label>
                                </div>
                                <div class="form-check ms-3">
                                    <input class="form-check-input" type="radio" id="customRadio2" value="0" name="status" <?= ($pegawai->status == 0) ? 'checked' : '' ?> >
                                    <label class="custom-control-label font-weight-normal" for="customRadio2">NON AKTIF</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tempat Lahir <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="kd_lokasi_lahir" value="<?= $pegawai->kd_lokasi_lahir ?>" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Lahir <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="date" name="tgl_lahir1" value="<?= $pegawai->tgl_lahir1 ?>" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="ms-0">Jenis Kelamin <small><strong class="text-danger">*</strong></small></label>
                            <div class="d-flex">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" id="customRadio1" value="L" name="jenis_kelamin" <?= ($pegawai->jenis_kelamin == 'L') ? 'checked' : '' ?> >
                                    <label class="custom-control-label font-weight-normal" for="customRadio1">Laki - laki</label>
                                </div>
                                <div class="form-check ms-3">
                                    <input class="form-check-input" type="radio" id="customRadio2" value="P" name="jenis_kelamin" <?= ($pegawai->jenis_kelamin == 'P') ? 'checked' : '' ?> >
                                    <label class="custom-control-label font-weight-normal" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="email" name="email" value="<?= $pegawai->email ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Alamat <small><strong class="text-danger">*</strong></small></label>
                                <textarea name="alamat" class="form-control" id="" cols="10" rows="5"><?= $pegawai->alamat ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">KTP</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor KTP <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="NOKTP" value="<?= $pegawai->NOKTP ?>" >
                            </div>

                            <?php if($pegawai->DOC_KTP): ?>
                                <img id="image-preview-KTP" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->DOC_KTP) ?>" style="width: 100%;">
                                <a href="<?= base_url('assets/doc/' . $pegawai->DOC_KTP) ?>" class="btn btn-sm btn-primary w-100" download><i class="fas fa-download me-2"></i> Download</a>
                            <?php else: ?>
                                <img id="image-preview-KTP" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto KTP <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" name="DOC_KTP" id="image-source-KTP" onchange="previewImageKTP();" <?= ($pegawai->DOC_KTP) ? '' : '' ?>>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">REKENING</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor Rekening <small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="NOREK" value="<?= $pegawai->NOREK ?>" >
                            </div>

                            <?php if($pegawai->DOC_REK): ?>
                                <img id="image-preview-REK" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->DOC_REK) ?>" style="width: 100%;">
                                <a href="<?= base_url('assets/doc/' . $pegawai->DOC_REK) ?>" class="btn btn-sm btn-primary w-100" download><i class="fas fa-download me-2"></i> Download</a>
                            <?php else: ?>
                                <img id="image-preview-REK" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto Rekening <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" id="image-source-REK" name="DOC_REK" onchange="previewImageREK();" <?= ($pegawai->DOC_REK) ? '' : '' ?>>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">BPJS KESEHATAN</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor BPJS KESEHATAN<small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="NOBPJS" value="<?= $pegawai->NOBPJS ?>" >
                            </div>

                            <?php if($pegawai->DOC_BPJS): ?>
                                <img id="image-preview-BPJS" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->DOC_BPJS) ?>" style="width: 100%;">
                                <a href="<?= base_url('assets/doc/' . $pegawai->DOC_BPJS) ?>" class="btn btn-sm btn-primary w-100" download><i class="fas fa-download me-2"></i> Download</a>
                            <?php else: ?>
                                <img id="image-preview-BPJS" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto BPJS KESEHATAN<small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" id="image-source-BPJS" name="DOC_BPJS" onchange="previewImageBPJS();" <?= ($pegawai->DOC_BPJS) ? '' : '' ?>>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">BPJS KETENAGAKERJAAN</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor BPJS KETENAGAKERJAAN<small><strong class="text-danger">*</strong></small></label>
                                <input class="form-control" type="text" name="NOBPJSNAKER" value="<?= $pegawai->NOBPJSNAKER ?>" >
                            </div>

                            <?php if($pegawai->DOC_BPJSNAKER): ?>
                                <img id="image-preview-BPJS-Naker" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->DOC_BPJSNAKER) ?>" style="width: 100%;">
                                <a href="<?= base_url('assets/doc/' . $pegawai->DOC_BPJSNAKER) ?>" class="btn btn-sm btn-primary w-100" download><i class="fas fa-download me-2"></i> Download</a>
                            <?php else: ?>
                                <img id="image-preview-BPJS-Naker" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto BPJS KETENAGAKERJAAN<small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="file" id="image-source-BPJS-Naker" name="DOC_BPJSNAKER" onchange="previewImageBPJSNaker();" <?= ($pegawai->DOC_BPJSNAKER) ? '' : '' ?>>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p class="text-uppercase text-sm mb-1">NPWP</p>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor NPWP <small><strong class="text-danger">*) PNG/JPG/JPEG</strong></small></label>
                                <input class="form-control" type="text" name="NPWP" value="<?= $pegawai->NPWP ?>" >
                            </div>

                            <?php if($pegawai->DOC_NPWP): ?>
                                <img id="image-preview-NPWP" alt="image preview" class="rounded border mb-3" src="<?= base_url('assets/doc/' . $pegawai->DOC_NPWP) ?>" style="width: 100%;">
                                <a href="<?= base_url('assets/doc/' . $pegawai->DOC_NPWP) ?>" class="btn btn-sm btn-primary w-100" download><i class="fas fa-download me-2"></i> Download</a>
                            <?php else: ?>
                                <img id="image-preview-NPWP" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto NPWP</label>
                                <input class="form-control" type="file" id="image-source-NPWP" name="DOC_NPWP" onchange="previewImageNPWP();" <?= ($pegawai->DOC_NPWP) ? '' : '' ?>>
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-9">
                                <p class="text-uppercase text-sm mb-n2">PENDIDIKAN</p>
                            </div>
                            <div class="col-lg-3 pe-0 me-0">
                                <button type="button" class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modal-add-riwayat-pendidikan"><i class="fas fa-plus me-3"></i> RIWAYAT PENDIDIKAN</button>
                            </div>
                        </div>

                        <div class="table-responsive p-3">
                            <table class="table align-items-center mb-0" id="table2">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" width="1px">NO</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">JENJANG</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" width="1px">JURUSAN</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" width="1px">IJASAH</th>
                                        <th class="text-secondary opacity-7" width="1px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nos=1; foreach($pendidikan->result() as $row){ ?>
                                        <tr>
                                            <td class="text-center"><?= $nos++ ?>. </td>
                                            <td><?= $row->JENJANG ?></td>
                                            <td><?= $row->JURUSAN ?></td>
                                            <td>
                                                <?php if($row->DOC_IJASAH): ?>
                                                    <button type="button" class="btn btn-sm btn-primary w-100 mb-0 btn-lihat-document" data-document="<?= base_url('assets/doc/' . $row->DOC_IJASAH) ?>"><i class="fas fa-eye me-2"></i> LIHAT IJASAH</button></td>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-sm btn-danger w-100 mb-0"><i class="fas fa-times"></i></button></td>
                                                <?php endif; ?>
                                            <td>
                                                <a href="<?= site_url('admin/kepegawaian/removeRiwayatPendidikan/' . $row->id) ?>" class="btn btn-sm btn-danger w-100 mb-0"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-9">
                                <p class="text-uppercase text-sm mb-n2">KEPEGAWAIAN</p>
                            </div>
                            <div class="col-lg-3 pe-0 me-0">
                                <button type="button" class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modal-add-riwayat"><i class="fas fa-plus me-3"></i> RIWAYAT JABATAN</button>
                            </div>
                        </div>
                        
                        <div class="table-responsive p-3">
                            <table class="table align-items-center mb-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" width="1px">NO</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">JABATAN</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" width="1px">Tanggal</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" width="1px">SK</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="1px">HONOR</th>
                                        <th class="text-secondary opacity-7" width="1px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($riwayat->result() as $row){ ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>. </td>
                                            <td><?= $row->jabatan ?></td>
                                            <td><button type="button" class="btn btn-sm btn-primary w-100 mb-0 btn-lihat-document" data-document="<?= base_url('assets/doc/' . $row->DOC_SK) ?>"><?= ($row->DOC_SK) ? '<i class="fas fa-eye me-2"></i> LIHAT DOKUMEN' : '' ?></button></td>
                                            <td><?= date('d/m/Y', strtotime($row->tanggal)) ?></td>
                                            <td>Rp. <?= number_format($row->HONOR,0,',','.') ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/kepegawaian/removeRiwayatJabatan/' . $row->id) ?>" class="btn btn-sm btn-danger w-100 mb-0"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
                            <a href="<?= base_url('assets/doc/' . $pegawai->FOTO) ?>" class="btn btn-sm btn-primary w-100" download><i class="fas fa-download me-2"></i> Download</a>
                        <?php else: ?>
                            <img id="image-preview" alt="image preview" class="rounded border mb-3 d-none" src="#" style="width: 100%;">
                        <?php endif; ?>

                        <input class="form-control form-control-lg" name="FOTO" type="file" id="image-source" onchange="previewImage();" <?= ($pegawai->FOTO) ? '' : '' ?>>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 mt-3">
            <button type="submit" class="btn btn-success w-100"><i class="fas fa-save me-2"></i>SIMPAN DATA</button>
        </div>
    </div>
</form>

<div class="modal fade" id="modal-add-riwayat" tabindex="-1" role="dialog" aria-labelledby="modal-add-riwayat" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-add-riwayat">Tambah Riwayat Kepegawaian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin/kepegawaian/addRiwayatJabatan') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_pegawai" value="<?= $pegawai->id ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jabatan <small><strong class="text-danger">*</strong></small></label>
                        <select name="id_jabatan" id="" class="form-control" required>
                            <option value=""> - Pilih Jabatan</option>
                            <?php foreach($jabatan->result() as $j){ ?>
                                <option value="<?= $j->id ?>"> <?= $j->jabatan ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">SK <small><strong class="text-danger">*</strong></small></label>
                        <input type="file" name="DOC_SK" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Honor <small><strong class="text-danger">*</strong></small></label>
                        <input type="text" id="rupiah" name="HONOR" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal <small><strong class="text-danger">*</strong></small></label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>

                </div>
                <div class="row p-3">
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-sm btn-danger w-100" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>BATAL</button>
                    </div>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-sm btn-success w-100"><i class="fas fa-plus me-2"></i> TAMBAHKAN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-riwayat-pendidikan" tabindex="-1" role="dialog" aria-labelledby="modal-add-riwayat" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-add-riwayat">Tambah Riwayat Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin/kepegawaian/addRiwayatPendidikan') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_pegawai" value="<?= $pegawai->id ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Ijasah <small><strong class="text-danger">*</strong></small></label>
                        <input type="file" name="DOC_IJASAH" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jenjang Pendidikan <small><strong class="text-danger">*</strong></small></label>
                        <select class="form-control" name="JENJANG" id="">
                            <option value=""> - Pilih Jenjang Pendidikan</option>
                            <option value="SD"> SD</option>
                            <option value="SMP"> SMP</option>
                            <option value="SMA"> SMA</option>
                            <optgroup label="DIPLOMA">
                                <option value="D1"> D1</option>
                                <option value="D2"> D2</option>
                                <option value="D3"> D3</option>
                                <option value="D4"> D4</option>
                            </optgroup>
                            <optgroup label="SARJANA">
                                <option value="S1"> S1</option>
                                <option value="S2"> S2</option>
                                <option value="S3"> S3</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jurusan <small><strong class="text-danger">*</strong></small></label>
                        <input class="form-control" type="text" name="JURUSAN">
                    </div>

                </div>
                <div class="row p-3">
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-sm btn-danger w-100" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>BATAL</button>
                    </div>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-sm btn-success w-100"><i class="fas fa-plus me-2"></i> TAMBAHKAN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-doc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DOKUMEN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-4x3 data-pdf">
                    
                </div>      
            </div>
            <div class="row p-3">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-sm btn-danger w-100" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>TUTUP</button>
                </div>
            </div>
        </div>
    </div>
</div>