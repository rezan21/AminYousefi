<!-- Development and Design by Reza N -->
<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'mail@aminyousefi.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-140999279-1"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'UA-140999279-1');
    </script>

    <meta
      name="description"
      content="Amin Yousefi Contact Page. For Sales, CV
    Information and more contact Amin Yousefi @ email: mail@aminyousefi.com,
    phone: +98 935 385 8517"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact | Amin Yousefi</title>
    <link rel="icon" type="image/jpg" href="resources/logos/favicon.jpg" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="queries.css" />

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
      integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Barlow+Condensed:200&display=swap"
      rel="stylesheet"
    />
  </head>

  <body id="home">
    <div class="mobile-menu">
      <!-- Top bar = line logo + hamburger icon -->
      <div>
        <a href="index.html"
          ><img
            id="line_logo"
            src="resources/logos/line_logo_w.png"
            alt="Amin Yousefi line_logo"
        /></a>
        <a class="js--nav hamburger" href="#"
          ><img src="menu.png" width="50px" alt="menu"
        /></a>
      </div>

      <nav class="second-menu js--main-nav">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="countryside.html">Countryside</a></li>
          <li><a href="untitled_photographs.html">Untitled Photographs</a></li>
          <li><a href="inverse.html">Inverse</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="cv.html">CV</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </div>
    <!-- mobile-menu ENDS  -->

    <div id="page-container">
      <div id="content-wrap">
        <!-- Normal menu  -->
        <div class="left_home">
          <!-- first element -->
          <div class="big-logo">
            <a href="index.html" title="Go To Home Page"
              ><img
                id="logo"
                src="resources/logos/LOGO.png"
                alt="AminYousefi Logo"
            /></a>
          </div>

          <!--  second element-->
          <div class="lists">
            <ul class="first_ul">
              <li><a href="index.html">Home</a></li>
              <li><a href="countryside.html">Countryside</a></li>
              <li>
                <a href="untitled_photographs.html">Untitled Photographs</a>
              </li>
              <li><a href="inverse.html">Inverse</a></li>
            </ul>
            <ul class="second_ul">
              <li><a href="about.html">About</a></li>
              <li><a href="cv.html">CV</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div>
        </div>
        <!-- Normal Menu ENDS  -->

        <ul id="social_media">
          <li>
            <a
              href="https://twitter.com/awinology"
              title="Follow me on Twitter"
              target="_blank"
              ><i class="fab fa-twitter-square"></i
            ></a>
          </li>
          <li>
            <a
              href="https://instagram.com/awinology"
              title="Follow me on Instagram"
              target="_blank"
              ><i class="fab fa-instagram"></i
            ></a>
          </li>
          <li>
            <a
              href="https://www.linkedin.com/in/awin/"
              title="Find me on LinkedIn"
              target="_blank"
              ><i class="fab fa-linkedin"></i
            ></a>
          </li>
          <li>
            <a
              href="https://www.facebook.com/aWinologys/"
              title="Find me on Facebook"
              target="_blank"
              ><i class="fab fa-facebook"></i
            ></a>
          </li>
        </ul>
        <!-- left_home ENDS  -->

        <div id="contact" class="right_home">
          <div class="showcase">
            <div class="map">
<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>


      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                  <label>Name</label>
		      <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
	      	<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                </div>
                <div class="form-group">
                  <label>Message</label>
                  <textarea
                    style="resize:none"
                    name="message"
                    class="form-control textarea"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                </div>
                <br />
                <!-- <button type="submit" name="submit" class="btn btn-primary">Submit</button> -->

                <div class="myDlBtn">
                  <span id="dl_btn" class="btn dl_button_on_cv btn-on-contact">
                    <button
                      name="submit"
                      class="btn-inner"
                      style="font-weight:100 !important ;color : #1b1b1b !important ;   font-family: 'Open Sans Condensed', sans-serif !important ;
                      "
                    >
                      Submit
                    </button>
                  </span>
                </div>
            </div>

            <div class="home_contact">
              <h1>Contact</h1>
              <div class="contact_info">
                <p class="contact_text">
                  For Sales, CV Information and more please contact me
                </p>
                <p>No.116, Khansary Alley, Sangtarashha St, Esfahan, Iran</p>
                <a
                  style="display: inline;"
                  href="tel:+989353858517"
                  title="Call"
                  >+98 935 385 8517</a
                >
                <br />
                <a
                  style="display: inline;"
                  href="mailto:mail@aminyousefi.com"
                  title="Email"
                  >mail@aminyousefi.com</a
                >
              </div>
            </div>
          </div>
        </div>
        <!-- right_home ENDS -->
      </div>
      <!-- #content-wrap ENDS -->

      <footer id="footer" class="footer-contact">
        Designed by
        <a
          title="Developer LinkedIn"
          target="_blank"
          href="https://www.linkedin.com/in/rezanaghshineh"
          >Reza</a
        >
        | All rights reserved © 2019
      </footer>
    </div>
    <!-- #page-container ENDS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>