<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en" style="zoom:85% !important">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="../assets/img/favicon.png">
		<title> <?= @$title ?> </title>
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
		<!-- Nucleo Icons -->
		<link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
		<!-- Font Awesome Icons -->
		<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
		<link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
		<!-- CSS Files -->
		<link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.0.4') ?>" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
		<link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	</head>
	<body class="g-sidenav-show   bg-gray-100">
		<style>
			.modal-backdrop{
				width: 100% !important;
				height: 100% !important;
			}
		</style>
		<div class="min-height-300 bg-warning position-absolute w-100"></div>
		<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
			<div class="sidenav-header">
				<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
				<a class="navbar-brand m-0 text-center" href="<?= site_url('admin/dashboard') ?>" target="_blank">
					<img src="<?= base_url('assets/img/logo.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
					<br>
					<span class="ms-1 font-weight-bold">DLH TANGSEL</span>
				</a>
			</div>
			<hr class="horizontal dark mt-0">
			<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>" href="<?= site_url('admin/dashboard') ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('admin/dashboard/autoLogin') ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-calendar text-danger text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Dashboard Presensi</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(2) == 'kepegawaian') ? 'active' : '' ?>" href="<?= site_url('admin/kepegawaian') ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-users text-warning text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Kepegawaian</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(2) == 'foto') ? 'active' : '' ?>" href="<?= site_url('admin/foto') ?>">
							<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="fas fa-camera text-primary text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Foto</span>
						</a>
					</li>
				</ul>
			</div>
		</aside>
		<main class="main-content position-relative border-radius-lg ">
			<!-- Navbar -->
			<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
				<?php if($this->session->flashdata('sukses')): ?>
					<div class="alert alert-success alert-dismissible rounded rounded-3 fade w-100 zindex-fixed show position-absolute border-0 text-white d-flex justify-content-between pe-3 align-items-center" role="alert" style="top: 15px;">
						<i class="fas fa-check-circle fa-lg me-3"></i>
						<div class="">
							<p class="font-weight-bold mb-0">Berhasil</p>
							<p class="font-weight-normal mb-0 font-12"><?= @$this->session->flashdata('sukses') ?></p>
						</div>
						<button type="button" class="btn btn-outline-light mb-0 ms-auto" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
					</div>
				<?php endif; ?>

				<?php if($this->session->flashdata('error')): ?>
					<div class="alert alert-danger alert-dismissible rounded rounded-3 fade w-100 zindex-fixed show position-absolute border-0 text-white d-flex justify-content-between pe-3 align-items-center" role="alert" style="top: 15px;">
						<i class="fas fa-times-circle fa-lg me-3"></i>
						<div class="">
							<p class="font-weight-bold mb-0">Gagal</p>
							<p class="font-weight-normal mb-0 font-12"><?= $this->session->flashdata('error') ?></p>
						</div>
						<button type="button" class="btn btn-outline-light mb-0 ms-auto" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
					</div>
				<?php endif; ?>
				<div class="container-fluid py-1 px-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
							<li class="breadcrumb-item text-sm">
								<a class="opacity-5 text-white" href="javascript:;">Pages</a>
							</li>
							<li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= $pages ?></li>
						</ol>
						<h6 class="font-weight-bolder text-white mb-0"><?= $pages ?></h6>
					</nav>
					<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
				
						<ul class="ms-md-auto navbar-nav  justify-content-end">
							<!-- Responsive Mobile Humber Menu -->
							<li class="nav-item d-xl-none ps-3 d-flex align-items-center me-4">
								<a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
									<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line bg-white"></i>
									<i class="sidenav-toggler-line bg-white"></i>
									<i class="sidenav-toggler-line bg-white"></i>
									</div>
								</a>
							</li>
							<li class="nav-item d-flex align-items-center">
								<a href="<?= site_url('auth/logout') ?>" class="nav-link text-white font-weight-bold px-0">
									<i class="fa fa-right-from-bracket me-sm-1"></i>
									<span class="d-sm-inline d-none"><strong>LOGOUT </span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="container-fluid py-4">