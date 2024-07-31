<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EasyNet IBC | Sign Up</title>
  <link rel="shortcut icon" type="image/png" href="_images/_logos/easynet_icon.png" />
  <link href="_styles/style.css" rel="stylesheet" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <header>
    <div id="left">
      <a href="index.html"><img src="_images/_logos/easynet.png" id="logo" width="120px" title="EasyNet Homepage" /></a>
    </div>
    <input type="checkbox" id="check">
    <div id="middle">
      <nav>
        <ul id="nav_content">
          <li id="nav_link">
            <a href="index.html" id="nav_text">Home</a>
          </li>
          <li id="nav_link">
            <a href="about.html" id="nav_text">About Us</a>
          </li>
          <li id="nav_link">
            <a href="products.html" id="nav_text">Products</a>
            <div class="dropdown">
              <div class="dropdown-content">
                <div class="row">
                  <h4><a href="products2.html">Hardware</a></h4>
                  <ul class="mega-link">
                    <li>Servers</li>
                    <li>Desktops</li>
                    <li>Monitors</li>
                    <li>Fax Machines</li>
                    <li>Computer Components</li>
                    <li>Projectors</li>
                  </ul>
                </div>
                <div class="row">
                  <h4><a href="products2.html">Software</a></h4>
                  <ul class="mega-link">
                    <li>Microsoft</li>
                    <li>Symantec</li>
                    <li>CorelDraw</li>
                    <li>Adobe</li>
                  </ul>
                </div>
                <div class="row">
                  <h4><a href="products2.html">Accessories</a></h4>
                  <ul class="mega-link">
                    <li>Printer Cartridge</li>
                    <li>Headsets</li>
                    <li>Controllers</li>
                  </ul>
                </div>
                <div class="row">
                  <h4><a href="products2.html">Combos</a></h4>
                  <ul class="mega-link">
                    <li>Gaming</li>
                    <li>Keyboard and Mouse</li>
                    <li>Sound System</li>
                  </ul>
                </div>
                <div class="row">
                  <h4><a href="products2.html">All</a></h4>
                  <ul class="mega-link">
                    <li>Asus</li>
                    <li>Acer</li>
                    <li>Apple</li>
                    <li>Dell</li>
                    <li>Hisense</li>
                    <li>Hp</li>
                    <li>Lenovo</li>
                    <li>Microsoft</li>
                    <li>Samsung</li>
                  </ul>
                </div>
              </div>
          </li>
          <li id="nav_link">
            <a href="client.html" id="nav_text">Partners and Clients</a>
          </li>
          <li id="nav_link">
            <a href="contact.html" id="nav_text">Contact Us</a>
          </li>
        </ul>
      </nav>
    </div>

    <div id="right">
      <p>
        <a href="register.html" id="loginlinks">Sign Up</a> /
        <a href="login.html" id="loginlinks">Log In</a>
      </p>
      <div id="right-item">
        <a href="favourites.html"><img id="icons_heart" src="_images/_icons/heart.png" width="30px" /></a>
        <a href="checkout.html"><img id="icons_bag" src="_images/_icons/bag.png" width="30px" /></a>
      </div>
      <label for="check" class="menu">
        <i class="bx bx-menu" id="menu_icon"></i>
        <i class="bx bx-x" id="close_icon"></i>
      </label>
    </div>
  </header>

  <main class="login2">
    <h1 id="register_heading">Sign Up</h1>

    <form action="signup.php" method="post" class="form-box">
      <!-- Personal Info -->

      <div id="signup_container">

        <div id="signup_left">
          <h4>First Name</h4>
          <input type="text" name="first_name" placeholder="First Name" class="signup_box" required />
          <h4>Last Name</h4>
          <input type="text" name="lastname" class="signup_box" placeholder="Last Name" required />
          <h4>Phone number</h4>
          <input type="text" name="phone_number" placeholder="Phone Number" class="signup_box" required />
        </div>

        <!-- Sign Up -->
        <div id="signup_right">
          <h4> Email address</h4>
          <input type="email" name="email" placeholder="Email Address" class="signup_box" required />
          <h4>Password</h4>
          <input type="password" name="password" placeholder="Password" class="signup_box" required />
          <h4>Confirm password</h4>
          <input type="password" name="confirm_password" placeholder="Confirm Password" class="signup_box" required />
          <div>
            <button type="submit" class="signup_button">Sign Up</button>
          </div>
        </div>
      </div>
    </form>
  </main>
</body>

</html>