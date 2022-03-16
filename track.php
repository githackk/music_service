<?php
include "header.php";
include_once "core/db.php";

if (isset($_GET["id"])) {
    $track = getTrack($_GET["id"]);


    if (isset($_GET["delete"])) {
        $filepathm=$track["music"];
        $filepathi=$track["img"];
        unlink($filepathm);
        unlink($filepathi);
        $deleteRes = deleteTrack($track["id"]);
    }
?>

    <?php if (isset($deleteRes)) { ?>
        <div class="alert alert-danger" role="alert">
            Трек успешно удален!
        </div>
        <a href="main.php" class="btn btn-primary">К списку</a>
    <?php } else { ?>
        <div class="col-sm-9">
            <div class="row mx-1">
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
                        <div class="row">
                            <form method="get" class="col-sm-6">
                                <input type="hidden" name="delete" value="Y" />
                                <input type="hidden" name="id" value="<?php echo $track["id"] ?>" />
                                <button class="btn btn-danger">Удалить</button>
                            </form>
                            <form method="get" class="col-sm-6" action="edit.php">
                                <input type="hidden" name="edit" value="Y" />
                                <input type="hidden" name="id" value="<?php echo $track["id"] ?>" />
                                <button class="btn btn-warning">Изменить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


<?php
}

include "footer.php";
?>