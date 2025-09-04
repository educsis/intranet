<div class="row row-sm mg-t-20">
  <?php
  foreach ($noticias as $n) {
  ?>
    <div class="card bd-0 col-md-4" style="background-color: transparent; padding-top: 15px;">
      <div class="card-header card-header-default bg-default">
        <?= $n['titulo'] ?>
      </div><!-- card-header -->
      <div class="card-body bd bd-t-0 rounded-bottom bg-gray-200">
        <img src="<?= base_url('noticias-image/' . $n['archivo']) ?>" style="width: 100%;">
        <?php
        $noti = word_limiter($n['noticia'], 10);
        echo "<p>";
        echo $noti;
        echo "</p>";
        ?>

      </div><!-- card-body -->
      <div class="card-footer">
        <?= date('d-m-Y', strtotime($n['fecha'])) ?>
        <a href="<?= base_url('noticias/leer/' . $n['id']) ?>" style="text-align: right;" class="btn btn-default btn-xs">VER MAS</a>
      </div>
    </div><!-- card -->
  <?php
  }
  ?>
</div><!-- row -->