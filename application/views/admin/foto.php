<form id="upload">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Upload Foto Pegawai</h5>
                </div>
                <div class="card-body">
                    <label for="example-text-input" class="form-control-label">Pilih Pegawai <small><strong class="text-danger">*</strong></small></label>
                    <select class="form-control select2" name="nip" id="nip" required>
                        <option value=""> - Pilih Pegawai</option>
                        <?php foreach($pegawai->result() as $row){ ?>
                            <option value="<?= $row->nip ?>"> <?= $row->nama ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success w-100"><i class="fas fa-save me-2"></i> SIMPAN</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="mt-3" id="my_camera"></div>
        </div>
    </div>
</form>