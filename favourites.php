<?php

session_start();
include "DBConn.php";
if (!isset($_SESSION['user_id'])) {
  // If the user is not logged in, redirect to the login page or show an appropriate message
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EasyNet IBC | Contact Us</title>
  <link rel="shortcut icon" type="image/png" href="_images/_logos/easynet_icon.png" />
  <link href="_styles/font-awesome.css" rel="stylesheet" />
  <link href="_styles/style.css" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="_javascript/products.js" async></script>
</head>

<body>
  <header>
    <div id="left">
      <a href="index.php"><img src="_images/_logos/easynet.png" id="logo" width="120px" title="EasyNet Homepage" /></a>
    </div>
    <input type="checkbox" id="check" />
    <div id="middle">
      <nav>
        <ul id="nav_content">
          <li id="nav_link">
            <a href="index.php" id="nav_text">Home</a>
          </li>
          <li id="nav_link">
            <a href="about.php" id="nav_text">About Us</a>
          </li>
          <li id="nav_link">
            <a href="products.php" id="nav_text">Products</a>
            <div class="dropdown">
              <div class="dropdown-content">
                <div class="row">
                  <h4><a href="products2.php?category=Hardware">Hardware</a></h4>
                  <ul class="mega-link">
                    <?php
                    $category = 'Hardware';
                    $sql = "SELECT DISTINCT prod_manufacturer FROM products WHERE prod_type = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $category);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                      $manufacturer = htmlspecialchars($row['prod_manufacturer']);
                      echo "<li><a href='products2.php?category=$category&manufacturer=" . urlencode($manufacturer) . "'>$manufacturer</a></li>";
                    }
                    ?>
                  </ul>
                </div>
                <div class="row">
                  <h4><a href="products2.php?category=Software">Software</a></h4>
                  <ul class="mega-link">
                    <?php
                    $category = 'Software';
                    $sql = "SELECT DISTINCT prod_manufacturer FROM products WHERE prod_type = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $category);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                      $manufacturer = htmlspecialchars($row['prod_manufacturer']);
                      echo "<li><a href='products2.php?category=$category&manufacturer=" . urlencode($manufacturer) . "'>$manufacturer</a></li>";
                    }
                    ?>
                  </ul>
                </div>
                <div class="row">
                  <h4><a href="products2.php?category=Accessories">Accessories</a></h4>
                  <ul class="mega-link">
                    <?php
                    $category = 'Accessories';
                    $sql = "SELECT DISTINCT prod_manufacturer FROM products WHERE prod_type = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $category);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                      $manufacturer = htmlspecialchars($row['prod_manufacturer']);
                      echo "<li><a href='products2.php?category=$category&manufacturer=" . urlencode($manufacturer) . "'>$manufacturer</a></li>";
                    }
                    ?>
                  </ul>
                </div>
                <div class="row">
                  <h4><a href="products2.php?category=all">All</a></h4>
                  <ul class="mega-link">
                    <?php
                    $sql = "SELECT DISTINCT prod_manufacturer FROM products LIMIT 10";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                      $manufacturer = htmlspecialchars($row['prod_manufacturer']);
                      echo "<li><a href='products2.php?manufacturer=" . urlencode($manufacturer) . "'>$manufacturer</a></li>";
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li id="nav_link">
            <a href="client.php" id="nav_text">Partners and Clients</a>
          </li>
          <li id="nav_link">
            <a href="contact.php" id="nav_text">Contact Us</a>
          </li>
        </ul>
      </nav>
    </div>

    <div id="right">
      <?php

      if (isset($_SESSION['user_id'])) {
        // The user is logged in, fetch their first name
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT first_name FROM users WHERE user_ID='$user_id'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
          $row = mysqli_fetch_assoc($result);
          $first_name = htmlspecialchars($row['first_name']);
          echo "<p id='welcomemess'>Welcome, $first_name! <a href='manageaccount.php' id='logoutlink'>Manage Account</a></p>";
        } else {
          // Handle the case where the user is not found, if necessary
          echo "<p>Error: User not found.</p>";
        }
      } else {
        // The user is not logged in, show the Sign Up / Log In links
        echo '<p>
      <a href="register.php" id="loginlinks">Sign Up</a> /
      <a href="login.php" id="loginlinks">Log In</a>
    </p>';
      }
      ?>
      <div id="right-item">
        <a href="favourites.php"><img id="icons_heart" src="_images/_icons/heart.png" width="30px" /></a>
        <a href="checkout.php"><img id="icons_bag" src="_images/_icons/bag.png" width="30px" /></a>
      </div>
      <label for="check" class="menu">
        <i class="bx bx-menu" id="menu_icon"></i>
        <i class="bx bx-x" id="close_icon"></i>
      </label>
    </div>
  </header>
  <main>
    <div class="favourites">
      <div class="favourites_heading">
        <h1>Favourites</h1>
      </div>
      <hr id="checkout_lines" />
    </div>

    <div id="fav_boxes">
      <?php
      $result = $conn->query("SELECT * FROM favourite WHERE user_ID = " . $_SESSION['user_id']);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='checkbox1'>";
          echo "<a href='prodinfo.php?prod_id=" . $row['prod_ID'] . "'><img src='_images/_products/" . $row['prod_image'] . "' width='150px' /></a>";
          echo "<a href='prodinfo.php?prod_id=" . $row['prod_ID'] . "'><p>" . $row['prod_name'] . "</p></a>";
          echo "<p class='prod_prices'><b>R" . number_format($row['prod_price'], 2) . "</b></p>";
          echo "<div id='check_quantity'>";
          echo "<button type='button' class='add_to_cart' data-prod-id='" . $row['prod_ID'] . "' data-prod-name='" . $row['prod_name'] . "' data-prod-price='" . $row['prod_price'] . "' data-prod-image='" . $row['prod_image'] . "' id='boxbutton'>Add to Cart</button>";
          echo "<button type='button' class='remove_from_favourite' onclick='removeFromCart(" . $row['prod_ID'] . ")' id='remove_fav' >Remove from Favourites</button>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<p>No favourites yet.</p>";
      }
      ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      function removeFromCart(prod_ID) {
        if (confirm('Are you sure you want to remove this item from your favourites?')) {
          // User clicked OK, proceed with the AJAX request
          $.ajax({
            url: 'remove_fav.php',
            method: 'POST',
            data: {
              prod_ID: prod_ID
            },
            success: function(response) {
              location.reload(); // Reload the page to reflect changes in the cart
            }
          });
        } else {
          // User clicked Cancel, do nothing or add any additional handling here if needed
          console.log('Item not removed from the cart.');
        }
      }
    </script>
  </main>
  <footer id="contact_footer">
    <div class="social-media-icons">
      <a href="https://www.facccebook.com/" target="_blank"> <i class='bx bxl-facebook-circle'>
          <p>Facebook</p>
        </i>
      </a>
      <a href="https://www.innnstagram.com/" target="_blank"> <i class='bx bxl-instagram'>
          <p>Instagram</p>
        </i>
      </a>
      <a href="https://www.linkkkedin.com/feed/?trk=guest_homepage-basic_google-one-tap-submit" target="_blank"><i class='bx bxl-linkedin-square'>
          <p>LinkedIn</p>
        </i>
      </a>
    </div>
    <hr id="foot_line" />
    <p id="footer_text">
      Copyright &copy; 2024 EasyNet In Business Communications
    </p>
  </footer>
</body>

</html>