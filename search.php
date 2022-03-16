<?php
include_once "core/db.php";
include_once "header.php";
?>

<div class="col-sm-9">
    <?php $count=countSearch($_GET["search_string"])?>
    <h4>Количество результатов: <?php echo $count["count"] ?></h4>
  <div class="row mx-1">
    <?php
    $tracks = searchTrack($_GET["search_string"]);
    foreach ($tracks as $key => $track) { ?>
      <div class="card col-sm-4 mx-2 my-2" style="width: 18rem;">
        <?php if (isset($track["img"])) { ?>
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
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php
include_once "footer.php"
?>