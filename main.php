<?php
include "header.php";
include_once "core/db.php"
?>

<div class="col-sm-9">
  <div class="row mx-1">
    <?php
    $tracks = getAllTracks();
    foreach ($tracks as $key => $track) { ?>
      <div class="card col-sm-4 mx-2 my-2" style="width: 18rem;">
        <?php if (isset($track["img"]) && $track["img"]) { ?>
          <img src="<?php echo $track["img"] ?>" class="card-img-top" alt="...">
        <?php } else { ?>
          Нет картинки
        <?php } ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo $track["composer"] ?></h5>
          <p class="card-text"><?php echo $track["name"] ?></p>
          <div class="mx-auto">
            <audio src="<?php echo $track["music"] ?>" controls style="width: 100%;"></audio>
          </div>
          <a href="track.php?id=<?php echo $track["id"];?>" class="btn btn-primary">Открыть</a>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php
include "footer.php";
?>