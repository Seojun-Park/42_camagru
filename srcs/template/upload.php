<!-- @format -->

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
    <form enctype="multipart/form-data" action="upload_ok.php" method="post">
      <label for="image">imagename:</label>
      <input type="file" name="upimage" id="up_image" /><br />
      <input type="submit" name="submit" value="Submit" />
    </form>
  </div>
  <footer>
    Copyright &copy; Jin 2020 - All Rights Reserved
  </footer>
</body>

</html>