<!-- @format -->
<?php

include "editing.php";
include "../hooks/get_tag.php";
$user = array();
$user['userid'] = "jinpark";
$user['username'] = "jinchul";

$dir = "../asset/stickers";
$handle = opendir($dir);
$files = array();
while (($filename = readdir($handle)) !== false) {
  if ($filename == "." || $filename == "..") {
    continue;
  }
  if (is_file($dir . "/" . $filename)) {
    $files[] = $dir . "/" . $filename;
  }
}

closedir($handle);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Camagru_Upload</title>
  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/header.css" />
  <link rel="stylesheet" href="../css/upload.css" />
</head>

<body>
  <header>
    <div class="header_row first_col">
      <a href="/">logo</a>
    </div>
    <div class="header_row second_col">
      <span>Camagru</span>
    </div>
    <div class="header_row third_col">
      <div class="col_block">
        <div class="col_block">
          <a href="/">
            <button>GALLERY</button>
          </a>
        </div>
        <a href="/">
          <button>PROFILE</button>
        </a>
      </div>
      <div class="col_block">
        <a href="../member/logout.php">
          <button>LOG OUT</button>
        </a>
      </div>
    </div>
    <div class="header_row">
      <div class="dropdown">
        <button>
          <img src="../asset/burger_icon.svg" alt="burger" />
        </button>
        <div class="dropdown-content">
          <form method="post">
            <a href="/">PROFILE</a>
            <a href="../member/logout.php">LOGOUT</a>
          </form>
        </div>
      </div>
    </div>
  </header>
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
  <footer>
    Copyright &copy; Jin 2020 - All Rights Reserved
  </footer>
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