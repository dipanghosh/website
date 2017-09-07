<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'comments'];
    $required = ['name', 'comments', 'email'];
    $to = 'Dipan Ghosh <dipandeoghar@gmail.com>';
    $headers = [];
    //$headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    //$authorized = '-fdavid@example.com';
    require './includes/process_mail.php';
    if ($mailSent) {
        header('Location: thanks.html');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Contact Page for Dipan Ghosh">
<meta name="author" content="Dipan Ghosh">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Dipan Ghosh, Dipan, Ghosh">
<link rel="icon" type="image/png" href="./images/favicon.ico">
<!-- Be sure to change this up! -->
<title>Dipan's Web: Contact</title>

<!-- Bootstrap -->
<link href="./css/bootstrap.css" rel="stylesheet">
<!-- Custom CSS -->
<link rel="stylesheet" href="./css/custom.css" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- text-danger: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default " role = "navigation">
		<div class="container-fluid container"> 
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span id="mobileMenu" class="white"> Menu </span> <span class="glyphicon glyphicon-chevron-down white"></span> </button>
						<a class="navbar-brand" href="http://thedesignerd.in"><img src="./images/brand.svg" alt="" id="navbrand"></a></div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="defaultNavbar1">
						<ul class="nav navbar-nav">
								<li class="active"><a href="#"><img src="./images/home-icon.svg" alt="">Home<span class="sr-only">(current)</span></a></li>
								<li><a href="work.html"><img src="./images/work-icon.svg" alt="">Work</a></li>
								<li><a href="photos.html"><img src="./images/photos-icon.svg" alt="">Photos</a></li>
								<li><a href="designs.html"><img src="./images/designs-icon.svg" alt="">Designs</a></li>
								<li><a href="meandus.html"><img src="./images/meandus-icon.svg" alt="">Me and Us</a></li>
								<li><a href="blog.html"><img src="./images/blog-icon.svg" alt="">Blog</a></li>
						</ul>
				</div>
				<!-- /.navbar-collapse --> 
		</div>
		<!-- /.container-fluid --> 
</nav>
<main class="container">
<?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
<p class="text-danger">Sorry, your mail couldn't be sent.</p>
<?php elseif ($errors || $missing) : ?>
<p class="text-danger">Please fix the item(s) indicated</p>
<?php endif; ?>
    <div class="col-lg-6 col-sm-12">
    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">  
    <label for="inputName">Your name
    <?php if ($missing && in_array('name', $missing)) : ?>
        <span class="text-danger">Please enter your name</span>
    <?php endif; ?>
    </label>
    <input id="inputName" class="form-control" name="name" type="text" <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($name) . '"';
        }
        ?> >
    
    <label for="inputEMail">Your Email
    <?php if ($missing && in_array('email', $missing)) : ?>
            <span class="text-danger">Please enter your email address</span>
        <?php elseif (isset($errors['email'])) : ?>
            <span class="text-danger">Invalid email address</span>
    <?php endif; ?>
    </label>
    <input id = "inputEMail" class="form-control" name="email" type="text" <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($email) . '"';
        }
        ?>
        >
    
    <label for="inputMsg">Your Message
    <?php if ($missing && in_array('name', $missing)) : ?>
        <span class="text-danger">You forgot to add a message!</span>
    <?php endif; ?>
    </label>
    <textarea id="inputMsg" class="form-control" name="comments" rows="7" cols="30"><?php
          if ($errors || $missing) {
              echo htmlentities($comments);
          }
          ?></textarea>
    
    <input  class="btn btn-default submitbtn" type="submit" name="send" id="send" value="Send Email">
    </form>
    </div>
<address class="col-lg-6 col-sm-12 text-center">
<h2>Permanent Address</h2>
	Thuba, Taki<br>
	North 24 Parganas<br>
	West Bengal, India<br>
	PIN - 743429<br>
<h2>Current Address</h2>
	Room no v307<br>
	18 Emanuelstraße<br>
	80796 München<br>
	Deutchland<br>
<h2>Email Address</h2>
<p id="email1"></p>
<p id="email2"></p>
</address>
</main>
<footer class="row container-fluid">
		<div class="container">
				<figure class="text-center col-md-offset-0 col-md-3"> <img src="./images/brand-footer.svg" alt="" id="footerbrand"> </figure>
				<div class="text-center col-md-offset-0 col-md-3 footercontact col-lg-5">
						<div class="text-center row"> <a href="https://www.facebook.com/dipan.ghosh.10" class="sb facebook">Facebook</a> <a href="https://twitter.com/ThisisDipan" class="sb twitter">Twitter</a> <a href="https://plus.google.com/+DipanGhosh" class="sb google">Linkedin</a> <a href="https://www.youtube.com/channel/UCuVznyH32OZUQZnJrYxAwFw" class="sb youtube">Youtube</a> <a href="https://www.linkedin.com/in/dipan-ghosh-17842257/https://www.linkedin.com/in/dipan-ghosh-17842257/" class="sb linkedin">LinkedIn</a> </div>
						<a href="contact.php" class="white">
<button class="btn btn-info text-center" id = "contactbtn">
						Contact me
						</button></a>
				</div>
				<div class="text-center col-md-offset-0 col-md-3 col-lg-1">
						<a href="sitemap.html" ><button class="btn btn-default" id="sitemapbtn">
						Sitemap
						</button></a>
				</div>
				<nav class="text-center col-md-offset-0 col-md-3">
						<ul class="row" id="footermenulist">
								<li class="col-md-3 white footermenu">Home</li>
								<li class="col-md-3 white footermenu"><a href="work.html">Work</a></li>
								<li class="col-md-3 white footermenu"><a href="photos.html">Photos</a></li>
								<li class="col-md-3 white footermenu"><a href="designs.html">Designs</a></li>
								<li class="col-md-3 white footermenu"><a href="meandus.html">Me and Us</a></li>
								<li class="col-md-3 white footermenu"><a href="blog.html">Blog</a></li>
						</ul>
				</nav>
		</div>
		<div class="text-center col-md-offset-0 col-md-12 black">
				<p class="small grey">© 2017 Dipan Ghosh ALL RIGHTS RESERVED </p>
		</div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="./js/jquery-1.11.3.min.js"></script> 

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="./js/bootstrap.js"></script> 
<!-- SVGeezy fallback for SVGs being used--> 
<script src="./js/svgeezy.min.js"></script> 
<script>svgeezy.init('nocheck', 'png');</script> 
<!-- Google Analyics Tracking code--> 
<script type="text/javascript">
	$("document").ready(function(){
		//console.log("Page has loaded!")
		$("#email1").text("dipandeoghar[at]gmail.com")
		$("#email2").text("dipan.ghosh[at]helmholtz-muenchen.de")
	});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91898116-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
