<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Sneaker Stash Online</title>
</head>
<body>
<!--#00bc22-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="#">
    <img src="images/logo.png" alt="sneaker stash logo" class="logo-nav">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>

<!--cart navbar-->
<div id="cart-nav">
      <p>Cart</p>
  </div>

<div class="container1">
    <div class="contact-info">
        <br>
        <h2>Contact Us</h2><br>
        <p>
            <h6>Location: </h6> Sneaker Stash Store, 101 Shortmarket Street, Cape Town, South Africa, 8000 <br>
                                 021-559-7740 <br>
            <h6>Email: </h6> admin@sneakerstash.co.za <br>
            <h6>Tel: </h6> 065 544 7075 <b>(Online order queries)</b>- Reece <br>
        </p>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <div class="directions">
        <h3>Visit us Instore</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3310.8391787123473!2d18.413798315616596!3d-33.91953842912615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc67662b7f7dab%3A0xeaa6b193be496994!2s101%20Shortmarket%20St%2C%20Schotsche%20Kloof%2C%20Cape%20Town%2C%208001!5e0!3m2!1sen!2sza!4v1590527226543!5m2!1sen!2sza" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" id="map"></iframe>
        
        <div class="direction-info">
            <h4>Cape Town</h4><br>
            <u><h5>101 Shortmarket Street, CPT, 8000</h5></u><br>
            <h5>021 559 7740 <br>
                admin@sneakerstash.co.za</h5>
            <h3> Store Hours</h3> <br>
            <h5>MONDAY - FRIDAY: <B>9am - 5pm</B> <br>
            SATURDAYS & SUNDAYS: <b>10am - 3pm</b> <br>
            PUBLIC HOLIDAYS: <b>closed</b></h5>
        </div>
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">

        <h4><i>All queries can be submitted using the form below.</i></h4>

    <form id="frmContact" action="" method="post">
        <div id="mail-status"></div>
            <div class="contact-row column-right">
                <label style="padding-top: 20px;">Name</label> <span
                    id="userName-info" class="info"></span><br /> <input
                    type="text" name="userName" id="userName"
                    class="demoInputBox">
            </div>
            <div class="contact-row column-right">
                <label>Email</label> <span id="userEmail-info" class="info"></span><br />
                <input type="text" name="userEmail" id="userEmail"
                    class="demoInputBox">
            </div>
            <div class="contact-row">
                <label>Phone</label> <span id="subject-info" class="info"></span><br />
                <input type="text" name="subject" id="subject"
                    class="demoInputBox">
            </div>
            <div>
                <label>Message</label> <span id="content-info" class="info"></span><br />
                <textarea name="content" id="content" class="demoInputBox"
                    rows="3"></textarea>
            </div>
            <div>
                <input type="submit" value="Send" class="btnAction" />
            </div>
        </form>
        <div id="loader-icon" style="display: none;">
            <img src="LoaderIcon.gif" />
        </div>

</div>

<br>

<div class="foot">
      <div class="foot-info">
        <p>Copyright@ 2020 Sneaker Stash - All rights Reserved 
      </div>
      <div class="col">
        <p>
            Follow us
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
        </p>
      </div>
    </div>
  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>