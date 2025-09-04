<!-- your content goes here -->
<div class="card pd-20 pd-sm-40">
  <div class="row mg-b-20">
    <div class="col-md mg-t-20 mg-md-t-0">
      <h3><?= $noticia[0]['titulo'] ?></h3>
      <img src="<?= base_url('noticias-image/' . $noticia[0]['archivo']) ?>" style="width: 100%;">
      <hr>
      <?= $noticia[0]['noticia'] ?>
      <hr>
      <small><?= date('d-m-Y', strtotime($noticia[0]['fecha'])) ?></small>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- card -->