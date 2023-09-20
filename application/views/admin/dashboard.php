<div class="row">
	<div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
		<div class="card">
			<div class="card-body p-3">
				<div class="row mb-3">
					<div class="col-8">
						<div class="numbers">
							<p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pegawai</p>
							<h5 class="font-weight-bolder"> <?= $pegawai ?>  Orang</h5>
						</div>
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
							<i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
		<div class="card">
			<div class="card-body p-3">
				<p class="text-sm text-uppercase font-weight-bold">Masuk Dashboard Presensi</p>
				<a href="<?= site_url('admin/dashboard/autoLogin') ?>" class="btn btn-sm btn-primary w-100 mb-0" target="__BLANK"><i class="fas fa-link me-2"></i> Masuk Dashboard Presensi</a>
			</div>
		</div>
	</div>
</div>