<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-8">
						<h6>Daftar Pegawai</h6>
					</div>
					<div class="col-lg-4 btn-group btn-group-sm">
						<a href="<?= site_url('admin/kepegawaian/export') ?>" class="btn btn-success w-100 me-2"><i class="fas fa-download me-2"></i> Pegawai</a>
						<a href="<?= site_url('admin/kepegawaian/tambah') ?>" class="btn btn-primary w-100"><i class="fas fa-plus me-2"></i> Pegawai</a>
					</div>
				</div>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="row px-4">
					<div class="col-lg-4"></div>
					<div class="col-lg-4"></div>
					<div class="col-lg-2">
						<input type="text" class="form-control form-control-sm" id="search-data" placeholder="Cari Pegawai / NIP / Jabatan ...">
					</div>
					<div class="col-lg-2">
						<input type="text" class="form-control form-control-sm" id="search-norek" placeholder="Cari No Rekening ...">
					</div>
				</div>
				<div class="table-responsive p-3">
					<table class="table align-items-center mb-0" id="table">
						<thead>
							<tr>
								<th class="text-secondary opacity-7" width="1px"></th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">STATUS</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">NO. REK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">NO. BPJS KES</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">NO. BPJS NAKER</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">NO. NPWP</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">NO. KTP</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" width="1px">HONOR</th>
							</tr>
						</thead>
						<tbody>
                            <?php $no=1; foreach($pegawai->result() as $row){ ?>
							<tr>
								<td class="align-middle">
									<a href="<?= site_url('admin/kepegawaian/' . $row->id . '/detail') ?>" class="btn btn-sm btn-info w-100 mb-0" data-toggle="tooltip" data-original-title="Edit user"> <i class="fas fa-eye"></i> </a>
								</td>
								<td>
									<div class="d-flex px-2 py-1">
										<div>
											<?php if($row->FOTO): ?>
												<img src="<?= base_url('assets/doc/' . $row->FOTO) ?>" class="avatar avatar-sm me-3" alt="<?= $row->nama ?>">
											<?php else: ?>
												<img src="<?= base_url('assets/img/placeholder-image-png.png') ?>" class="avatar avatar-sm me-3" alt="<?= $row->nama ?>">
											<?php endif; ?>
										</div>
										<div class="d-flex flex-column justify-content-center">
											<h6 class="mb-0 text-sm"><?= $row->nama ?></h6>
											<p class="text-xs text-secondary mb-0">NIP : <strong><?= $row->nip ?></strong></p>
											<p class="text-xs text-secondary mb-0"><strong><?= $row->jabatan ?></strong></p>
										</div>
									</div>
								</td>
								<td class="align-middle text-center text-sm">
									<button class="btn btn-sm <?= ($row->status == 1) ? 'btn-success' : 'btn-danger' ?> w-100 mb-0"><?= ($row->status == 1) ? 'AKTIF' : 'NON AKTIF' ?></button>
								</td>
								<td class="align-middle text-center text-sm">
                                    <button class="btn btn-sm <?= ($row->DOC_REK) ? 'btn-success' : 'btn-danger' ?> w-100 mb-0"><i class="fas <?= ($row->DOC_REK) ? 'fa-check' : 'fa-times' ?> me-2"></i> <?= $row->NOREK ?></button>
								</td>
                                <td class="align-middle text-center text-sm">
									<button class="btn btn-sm <?= ($row->DOC_BPJS) ? 'btn-success' : 'btn-danger' ?> w-100 mb-0"><i class="fas <?= ($row->DOC_BPJS) ? 'fa-check' : 'fa-times' ?> me-2"></i> <?= $row->NOBPJS ?></button>
								</td>
								<td class="align-middle text-center text-sm">
									<button class="btn btn-sm <?= ($row->DOC_BPJSNAKER) ? 'btn-success' : 'btn-danger' ?> w-100 mb-0"><i class="fas <?= ($row->DOC_BPJSNAKER) ? 'fa-check' : 'fa-times' ?> me-2"></i> <?= $row->NOBPJSNAKER ?></button>
								</td>
                                <td class="align-middle text-center text-sm">
									<button class="btn btn-sm <?= ($row->DOC_NPWP) ? 'btn-success' : 'btn-danger' ?> w-100 mb-0"><i class="fas <?= ($row->DOC_NPWP) ? 'fa-check' : 'fa-times' ?> me-2"></i> <?= $row->NPWP ?></button>
								</td>
                                <td class="align-middle text-center text-sm">
									<button class="btn btn-sm <?= ($row->DOC_KTP) ? 'btn-success' : 'btn-danger' ?> w-100 mb-0"><i class="fas <?= ($row->DOC_KTP) ? 'fa-check' : 'fa-times' ?> me-2"></i><?= $row->NOKTP ?></button>
								</td>
                                <td class="align-middle text-center text-sm">
									<button class="btn btn-sm <?= ($row->DOC_HONOR) ? 'btn-success' : 'btn-danger' ?> w-100 mb-0"><i class="fas <?= ($row->DOC_HONOR) ? 'fa-check' : 'fa-times' ?>"></i></button>
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