<!-- @format -->
<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/css/header.css" />
</head>

<body>
  <header>
    <div class="header_row first_col">
      <a href="/page/main.php">logo</a>
    </div>
    <div class="header_row second_col">
      <form method="post" class="search_form">
        <input type="text" id="searchbar" placeholder="Search user" />
        <button type="submit" id="searchbutton" name="search">
          <span class="glyphicon glyphicon-search"></span>
        </button>
      </form>
    </div>
    <div class="header_row third_col">
      <div class="col_block">
        <a href="profile/profile.php?id=<?php echo $_SESSION['userid'] ?>">
          <button>profile</button>
        </a>
      </div>
      <div class="col_block">
        <a href="/member/logout.php">
          <button>log out</button>
        </a>
      </div>
    </div>
    <div class="header_row">
      <div class="dropdown">
        <button>
          <span class="glyphicon glyphicon-align-justify"></span>
        </button>
        <div class="dropdown-content">
          <form method="post">
            <a href="profile/profile.php?id=<?php echo $_SESSION['userid'] ?>">profile</a>
            <a href="/member/logout.php">logout</a>
          </form>
        </div>
      </div>
    </div>
  </header>
</body>

</html>