<form id="upload">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Upload Foto Pegawai</h5>
                </div>
                <div class="card-body">
                    <label for="example-text-input" class="form-control-label">Pilih Pegawai <small><strong class="text-danger">*</strong></small></label>
                    <select class="form-control select2" name="id" id="id" required>
                        <option value=""> - Pilih Pegawai</option>
                        <?php foreach($pegawai->result() as $row){ ?>
                            <option value="<?= $row->id ?>"> <?= $row->nama ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success w-100"><i class="fas fa-save me-2"></i> SIMPAN</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-10">
                    <label class="form-control-label" for="videoSource">Sumber Kamera: </label>
                    <select class="form-control select2" id="videoSource"></select>
                </div>
                <div class="col-10 mt-2">
                    <div class="card shadow">
                        <video class="rounded" id="video" style="width: 100%" autoplay></video>
                        <canvas width="750" height="1000" id="canvas" style="display:none;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>