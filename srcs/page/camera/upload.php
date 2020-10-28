<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hook/func_view.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Camagru_Upload</title>
    <link rel="stylesheet" href="/css/upload.css" />
</head>

<body>
    <?php echo view('../header.php'); ?>
    <div class="wrapper">
        <form enctype="multipart/form-data" action="upload_ok.php" method="post">
            <label for="image">imagename:</label>
            <input type="file" name="upimage" id="up_image" /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
    </div>
    <?php echo view('../footer.php'); ?>
</body>

</html>