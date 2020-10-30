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
          <img id="pre_img" src="https://dummyimage.com/406x256/ffffff/000333&text=Click+here+to+upload+image" width="300" alt="preview" />
        </div>
      </label>
      <input type="submit" id="submit_btn" name="submit" value="Upload" formaction="upload_ok.php" />
    </form>
    <div class="side">
      <div class="stick_title">Choose your Sticker :D</div>
      <div class="sticker_list">
        <?php foreach ($files as $f) {
          echo "<img class='li_img' id='getfile2' src='" . $f . "' alt='sticker'/>";
        }
        ?>
      </div>
      <button class="sticker_btn">CHOOSE</button>
    </div>
  </div>


  <footer>
    Copyright &copy; Jin 2020 - All Rights Reserved
  </footer>
</body>
<script>
  var canvas = document.createElement("canvas");
  //캔버스 크기 설정
  canvas.width = 500; //가로 100px
  canvas.height = 500; //세로 100px
  var context = canvas.getContext("2d");
  context.globalCompositeOperation = "source-over";

  var file = document.querySelector("#up_image");
  var file2 = document.querySelector("#getfile2");

  file.onchange = function() {
    var fileList = $file.files;

    // 읽기
    var reader = new FileReader();
    reader.readAsDataURL(fileList[0]);

    //로드 한 후
    reader.onload = function() {
      //썸네일 이미지 생성
      var tempImage = new Image(); //drawImage 메서드에 넣기 위해 이미지 객체화
      tempImage.src = reader.result; //data-uri를 이미지 객체에 주입
      tempImage.onload = function() {
        //이미지를 캔버스에 그리기
        context.drawImage(this, 0, 0, 500, 500);

        //캔버스에 그린 이미지를 다시 data-uri 형태로 변환
        var dataURI = canvas.toDataURL("image/jpeg");

        //썸네일 이미지 보여주기
        document.querySelector("#pre_img").src = dataURI;

        //썸네일 이미지를 다운로드할 수 있도록 링크 설정
        document.querySelector("#download").href = dataURI;
      };
    };
  };

  console.log(file2);

  // console.log(file2);

  // $file2.onchange = function() {
  //   var fileList = $file2.files;

  //   // 읽기
  //   var reader = new FileReader();
  //   reader.readAsDataURL(fileList[0]);

  //   //로드 한 후
  //   reader.onload = function() {
  //     //썸네일 이미지 생성
  //     var tempImage = new Image(); //drawImage 메서드에 넣기 위해 이미지 객체화
  //     tempImage.src = reader.result; //data-uri를 이미지 객체에 주입
  //     tempImage.onload = function() {
  //       //모드 변경
  //       //context.globalCompositeOperation = "darker";
  //       //이미지를 캔버스에 그리기
  //       context.drawImage(this, 0, 0, 500, 500);

  //       //캔버스에 그린 이미지를 다시 data-uri 형태로 변환
  //       var dataURI = canvas.toDataURL("image/jpeg");

  //       //썸네일 이미지 보여주기
  //       document.querySelector("#pre_img").src = dataURI;

  //       //썸네일 이미지를 다운로드할 수 있도록 링크 설정
  //       document.querySelector("#download").href = dataURI;
  //     };
  //   };
  // };
</script>

</html>