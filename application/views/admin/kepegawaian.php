<div class="row">
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-0">
				<h6>Daftar Pegawai</h6>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-3">
					<table class="table align-items-center mb-0" id="table">
						<thead>
							<tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="1px">NO</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="1px">NIP</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">NO. REK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">NO. BPJS</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">NO. NPWP</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">NO. KTP</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">SK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">IJASAH</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">HONOR</th>
								<th class="text-secondary opacity-7"></th>
							</tr>
						</thead>
						<tbody>
                            <?php $no=1; foreach($pegawai->result() as $row){ ?>
							<tr>
                                <td class="text-center"><?= $no++ ?>. </td>
                                <td class="text-center"><?= $row->nip ?></td>
								<td>
									<div class="d-flex px-2 py-1">
										<div>
											<img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
										</div>
										<div class="d-flex flex-column justify-content-center">
											<h6 class="mb-0 text-sm"><?= $row->nama ?></h6>
										</div>
									</div>
								</td>
								<td>admin@dlh.com</td>
								<td class="align-middle text-center text-sm">
                                    <button class="btn btn-sm btn-success w-100"><i class="fas fa-check me-2"></i> 0110215041</button>
								</td>
                                <td class="align-middle text-center text-sm">
									<button class="btn btn-sm btn-success w-100"><i class="fas fa-check me-2"></i> 0110215041</button>
								</td>
                                <td class="align-middle text-center text-sm">
									<button class="btn btn-sm btn-success w-100"><i class="fas fa-check me-2"></i> 0110215041</button>
								</td>
                                <td class="align-middle text-center text-sm">
									<button class="btn btn-sm btn-success w-100"><i class="fas fa-check me-2"></i> 0110215041</button>
								</td>
                                <td class="align-middle text-center text-sm">
									<button class="btn btn-sm btn-success w-100"><i class="fas fa-check"></i></button>
								</td>
                                <td class="align-middle text-center text-sm">
									<button class="btn btn-sm btn-success w-100"><i class="fas fa-check"></i></button>
								</td>
								<td class="align-middle text-center">Rp. 20.000.000</td>
								<td class="align-middle">
									<a href="<?= site_url('admin/kepegawaian/' . $row->nip . '/detail') ?>" class="btn btn-sm btn-info w-100" data-toggle="tooltip" data-original-title="Edit user"> <i class="fas fa-eye"></i> </a>
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