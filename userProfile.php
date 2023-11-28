<!DOCTYPE html>

<html style= "background-image: url('https://img.freepik.com/premium-photo/nostalgic-background-with-old-books-wooden-shelf-ray-light_795881-9356.jpg')" >
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="Ahlea, Angie">
    <title> Profile </title>
    <script src="userProfile.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="design.css">
  </head>

  <body style= "background-color: rgba(0, 0, 0, 0.6)">
        
    <?php
      include("menuBar.php")
    ?>

    <div class="tab">
      <button class="tablinks" type="button" onclick="showBooks('CheckedOut')">Checked Out</button>
      <button class="tablinks" type="button" onclick="showBooks('WaitList')">Waitlist</button>
      <button class="tablinks" type="button" onclick="showBooks('Wishlist')">Wishlist</button>
    </div>
          
    <div id="CheckedOut" class="tabcontent">
      <div id="currentTab">
        Welcome to your User Profile! <br><br>
        Use this page to view books you currently have checked, books you are on the waitlist for, and books on your wishlist.
      </div>
    </div>
  </body>
</html>