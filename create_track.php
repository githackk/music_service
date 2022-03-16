<?php
include_once "core/db.php";
include_once "header.php";


$errors = [];
if ($_POST) {
    $postFiltered = [];
    foreach ($_POST as $postKey => $postItem) {
        $postFiltered[$postKey] = htmlspecialchars($postItem);
    }

    if (!$_POST['name']) {
        $errors[] = 'name';
    }

    if (!$_POST['composer']) {
        $errors[] = 'composer';
    }

    if (!$_POST['genre']) {
        $errors[] = 'genre';
    }

    $file_name_img;
    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
    
        $expensions = array("jpeg", "jpg", "png");

        $file_name_img = $file_name;
    
        move_uploaded_file($file_tmp, "img/" . $file_name);
    }

    $file_name_music;
    if (isset($_FILES['music'])) {
        $errors = array();
        $file_name = $_FILES['music']['name'];
        $file_size = $_FILES['music']['size'];
        $file_tmp = $_FILES['music']['tmp_name'];
        $file_type = $_FILES['music']['type'];
    
        $expensions = array("mp3");

        $file_name_music = $file_name;
    
        move_uploaded_file($file_tmp, "music/" . $file_name);
    }

    $result = saveTrack($postFiltered['composer'], $postFiltered['name'], $postFiltered['genre'], $file_name_img, $file_name_music);
}
?>



<div class="col-sm-9">
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3 col-sm-5">
            <label for="exampleFormControlInput1" class="form-label">Исполнитель</label>
            <select name="composer" class="form-select">
                <?php
                $composers = getAllComposers();
                foreach ($composers as $key => $composer) { ?>
                    <option value="<?php echo $composer["id"] ?>"><?php echo $composer["alias"] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3 col-sm-5">
            <label for="name" class="form-label">Название</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>

        <div class="mb-3 col-sm-5">
            <label for="exampleFormControlInput1" class="form-label">Жанр</label>
            <select name="genre" class="form-select">
                <?php
                $genres = getAllGenre();
                foreach ($genres as $key => $genre) { ?>
                    <option value="<?php echo $genre["id"] ?>"><?php echo $genre["name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3 col-sm-5">
            <label for="exampleFormControlInput1" class="form-label">Загрузить обложку</label>
            <input type="file" name="image">
        </div>

        <div class="mb-3 col-sm-5">
            <label for="exampleFormControlInput1" class="form-label">Загрузить песню</label>
            <input type="file" name="music">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <?php if (isset($result)) { ?>
            <div class="alert alert-success" role="alert">
                Трек успешно загружен!
            </div>
        <?php } ?>
    </form>

</div>



<?php
include_once "footer.php"
?>