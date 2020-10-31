<!-- @format -->
<?php
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

$flag = false;

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
      <label for="up_image" id="pre_label">
        <input type="file" name="upimage" id="up_image" accept="image/*" /><br />
        <div id="preview">
          <!-- <a id="download" download="image.jpg" target="_blank">
            <img id="pre_img" src="https://dummyimage.com/406x256/ffffff/000333&text=Click+here+to+upload+image" width="300" alt="preview" />
          </a> -->
          <!-- <input type="image" id="pre_img" name="combimg" value="test" src="https://dummyimage.com/406x256/ffffff/000333&text=Click+here+to+upload+image" width="300" alt="preview" /> -->
          <img id="pre_img" src="https://dummyimage.com/406x256/ffffff/000333&text=Click+here+to+upload+image" width="300" alt="preview" />

        </div>
      </label>
      <input type="submit" id="submit_btn" value="UPLOAD" formaction="upload_ok.php" />
      <!-- <input type="button" id="submit_btn" value="FIX" onclick="changedCheck();" /> -->
    </form>
    <div class="side">
      <div class="stick_title">Choose your Sticker :D</div>
      <a class="sticker_list">
        <?php
        $i = 0;
        foreach ($files as $f) {
          echo "<button onclick='chosen_sticker(" . $i . ")';>";
          echo "<img class='li_img " . $i . "' id='getfile2' src='" . $f . "' alt='sticker'/>";
          echo "</button>";
          $i++;
        }
        ?>
      </a>
    </div>
  </div>


  <footer>
    Copyright &copy; Jin 2020 - All Rights Reserved
  </footer>
</body>
<script>
  var canvas = document.createElement("canvas");
  canvas.width = 500;
  canvas.height = 500;
  var context = canvas.getContext("2d");
  context.globalCompositeOperation = "source-over";

  var file = document.querySelector("#up_image");
  var file2 = document.querySelector("#getfile2");

  file.onchange = function() {
    var fileList = file.files;

    var reader = new FileReader();
    reader.readAsDataURL(fileList[0]);

    reader.onload = function() {
      var tempImage = new Image();
      tempImage.src = reader.result;
      tempImage.onload = function() {
        context.drawImage(this, 0, 0, 500, 500);
        var dataURI = canvas.toDataURL("image/jpeg");
        document.querySelector("#pre_img").src = dataURI;
        // document.querySelector("#download").href = dataURI;
      };
    };
  };

  const chosen_sticker = (index) => {
    const img = document.getElementsByClassName('li_img')[index];
    const uri = img.getAttribute('src')
    var tmpImage = new Image();
    tmpImage.src = uri;
    tmpImage.onload = function() {
      context.drawImage(this, 80, 180, 150, 150);
      var dataURI = canvas.toDataURL("image/jpeg");
      document.querySelector("#pre_img").src = dataURI;
      // document.querySelector("#download").href = dataURI;
    };
  };

  const changedCheck = () => {
    const img = document.getElementById('pre_img');
    const uri = img.getAttribute('src');
    const input = document.getElementById('up_image');
    const submitBtn = document.getElementById('submit_btn');

    // submitBtn.removeAttribute('onclick');
    // submitBtn.removeAttribute('value');
    input.setAttribute('value', uri);
    // submitBtn.setAttribute('value', "UPLOAD");
    // submitBtn.setAttribute('formaction', "upload_ok.php")
  }
</script>

</html>