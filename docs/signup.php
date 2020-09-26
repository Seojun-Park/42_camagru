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
      <div class="signupBox">
        <span id="authTitle">Sign Up</span>
        <form method="POST" action="signup_action.php" class="authform">
          <div>
            <label for="ID">ID</label>
            <input id="id" name="id" type="text" />
          </div>
          <div>
            <label for="Password">Password</label>
            <input id="pw" name="pw" type="password" />
          </div>
          <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" />
          </div>
          <div>
            <label for="familyname">Family Name</label>
            <input id="name" name="familyname" type="text" />
          </div>
          <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="example@example.com" />
          </div>
          <div class="monthForRow">
            <label for="birth_month">Date of Birth</label>
            <select name="month">
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
            <select name="date">
              <?php
              for ($i = 1; $i < 32; $i++) {
                echo "<option value=" . $i . ">" . $i . "</option>";
              }
              ?>
            </select>
          </div>
          <div>
            <fieldset class="legacyFormRow">
              <input id="gender" name="gender" type="radio" value="Male" />
              <label for="gender" class="radioLabel">Male</label>
              <input id="gender" name="gender" type="radio" value="female" />
              <label for="gender" class="radioLabel">Female</label>
            </fieldset>
          </div>
          <div>
            <label class="checkBox" for="available">
              <input id="available" name="available" type="checkbox" value="is-available" />
              <span>I'm actually not an Robot</span>
            </label>
          </div>
          <div>
            <button type="submit" name="OK">Sign up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>