<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Rush</title>
  <link rel="stylesheet" href="styles/auth.css" />
  <link rel="stylesheet" href="styles/text.css" />
</head>

<body>
  <div class="container">
    <div class="authCont">
      <span id="authTitle">Sign Up</span>
      <div class="signupBox">
        <form method="POST" action="signup_action.php" class="signupform">
          <div class="boxRow">
            <label for="ID" id="inputLabel">ID</label>
            <input id="inputBox" name="id" type="text" />
          </div>
          <div class="boxRow">
            <label for="Password" id="inputLabel">Password</label>
            <input id="inputBox" name="pw" type="password" />
          </div>
          <div class="boxRow">
            <label for="name" id="inputLabel">Name</label>
            <input id="nameBox" name="name" type="text" />
            <input id="nameBox" name="familyname" type="text" />
          </div>
          <div class="boxRow">
            <label for="email" id="inputLabel">Email</label>
            <input id="inputBox" name="email" type="email" placeholder="example@example.com" />
          </div>
          <div class="monthForRow">
            <label for="birth_month" id="inputLabel">Date of Birth</label>
            <select name="month" id="monthSelect">
              <option value="jan">January</option>
              <option value="feb">Febuary</option>
              <option value="mar">March</option>
              <option value="apr">April</option>
              <option value="may">May</option>
              <option value="jun">June</option>
              <option value="jul">July</option>
              <option value="aug">August</option>
              <option value="sep">September</option>
              <option value="oct">October</option>
              <option value="nov">November</option>
              <option value="dec">December</option>
            </select>
            <select name="date" id="dateSelect">
              <?php
              for ($i = 1; $i < 32; $i++) {
                echo "<option value=" . $i . ">" . $i . "</option>";
              }
              ?>
            </select>
          </div>
          <div>
            <label class="checkBox" for="available">
              <input id="available" name="available" type="checkbox" value="is-available" />
              <span>I'm actually not an Robot</span>
            </label>
          </div>
          <div>
            <button type="submit" name="submit" value="OK">Sign up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>