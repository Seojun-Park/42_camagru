<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/hooks/func_view.php";

$sql = mq("select * from member where id ='" . $_SESSION['userid'] . "'");
$user = $sql->fetch_array();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Camagru_Upload</title>
    <link rel="stylesheet" href="/css/upload.css" />
</head>

<body>
    <div class="header">
        <?php echo view('../header.php'); ?>
    </div>
    <div class="wrapper">
        <form enctype="multipart/form-data" method="post" class="form_view">
            <label for="up_image">
                <input type="file" name="upimage" id="up_image" accept="image/*" /><br />
                <div id="preview">
                    <img id="img" src="https://dummyimage.com/406x256/ffffff/000333&text=Click+here+to+upload+image" alt="temp" />
                </div>
            </label>
            <input type="submit" id="submit_btn" name="submit" value="Upload" formaction="upload_ok.php" />
        </form>
        <div class="side">
            <div class="stick_title">Choose your Sticker :D</div>
            <ul class="sticker_list">
                <?php foreach ($files as $f) {
                    echo "<li class='li_img'>";
                    echo "<img id='sticker_img' src='" . $f . "' alt='sticker' />";
                    echo "</li>";
                }
                ?>
            </ul>
            <button class="sticker_btn">CHOOSE</button>
        </div>
    </div>
</body>
<script>
    const reader = new FileReader();
    const fileInput = document.getElementById("up_image");
    const img = document.getElementById("img");
    let file;

    reader.onload = e => {
        img.src = e.target.result;
    }

    fileInput.addEventListener('change', e => {
        const f = e.target.files[0];
        file = f;
        reader.readAsDataURL(f);
    })
</script>

</html>