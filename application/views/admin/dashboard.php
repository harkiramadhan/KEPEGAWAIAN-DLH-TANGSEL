<div class="row">
	<div class="col-lg-3 mb-4">
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
							<i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 mb-4">
		<div class="card">
			<div class="card-body p-3">
				<div class="row mb-3">
					<div class="col-8">
						<div class="numbers">
							<p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pegawai Aktif</p>
							<h5 class="font-weight-bolder"> <?= $pegawai_aktif ?>  Orang</h5>
						</div>
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-success shadow-success text-center rounded-circle">
							<i class="fas fa-user-shield text-lg opacity-10" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 mb-4">
		<div class="card">
			<div class="card-body p-3">
				<div class="row mb-3">
					<div class="col-8">
						<div class="numbers">
							<p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pegawai Non Aktif</p>
							<h5 class="font-weight-bolder"> <?= $pegawai_nonaktif ?>  Orang</h5>
						</div>
					</div>
					<div class="col-4 text-end">
						<div class="icon icon-shape bg-danger shadow-danger text-center rounded-circle">
							<i class="fas fa-user-large-slash text-lg opacity-10" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 mb-4">
		<div class="card">
			<div class="card-body p-3">
				<p class="text-sm text-uppercase font-weight-bold">Masuk Dashboard Presensi</p>
				<a href="<?= site_url('admin/dashboard/autoLogin') ?>" class="btn btn-sm btn-primary w-100 mb-0" target="__BLANK"><i class="fas fa-link me-2"></i> Masuk Dashboard Presensi</a>
			</div>
		</div>
	</div>
	<div class="col-lg-12 mb-lg-0 mb-4 mt-4">
		<div class="card z-index-2 h-100">
			<div class="card-header pb-0 pt-3 bg-transparent">
				<h6 class="text-capitalize">Pegawai</h6>
			</div>
			<div class="card-body p-3">
				<div class="chart">
					<canvas id="chart-line" class="chart-canvas" height="400" style="display: block; box-sizing: border-box; height: 400px;"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>