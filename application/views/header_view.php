<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.png') ?>" />

  <title>Zona Pradera .::. Intranet</title>

  <!-- vendor css -->
  <link href="<?= base_url('assets/lib/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
  <link href="<?= base_url('assets/lib/Ionicons/css/ionicons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/jquery-toggles/toggles-full.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/highlightjs/github.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/select2/css/select2.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/spectrum/spectrum.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/datatables/jquery.dataTables.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/5.3.2/sweetalert2.min.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link href="<?= base_url('assets/lib/jquery-toggles/toggles-full.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/lib/summernote/summernote-bs4.css') ?>" rel="stylesheet">
  <!-- Amanda CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/amanda.css') ?>">
	<style>
			.dataTables_wrapper {
				overflow-x: auto;
			}
			table.dataTable {
				width: 100% !important;
			}
	</style>
</head>

<body>

  <div class="am-header">
    <div class="am-header-left">
      <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
      <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
      <a href="<?= base_url('inicio') ?>" class="am-logo"><img src="<?= base_url('assets/img/logo.png') ?>" style="width: 150px;"></a>
    </div><!-- am-header-left -->

  </div><!-- am-header -->

  <?= $this->load->view('sidebar', '', TRUE) ?>

  <div class="am-pagetitle">
    <h5 class="am-title"><?= $title ?></h5>
  </div><!-- am-pagetitle -->

  <div class="am-mainpanel">
    <div class="am-pagebody">
