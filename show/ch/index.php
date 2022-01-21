<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$param[3]]);

$year = "2020";
$start = $year . "-09-01";
$end = $year . "-12-20";
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="description" content="Meta descriptions are HTML attributes that provide concise explanations of the contents of web pages. They should optimally be between 150-160 characters.">
	<meta name="author" content="SvenCreations">
	<!-- Touch icons for android and iOS (Bookmark icons) -->
	<link rel="shortcut icon" sizes="196x196" href="../demo/images/icons/icon-196x196.png">
	<link rel="apple-touch-icon" href="../demo/images/icons/touch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../demo/images/icons/touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../demo/images/icons/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../demo/images/icons/touch-icon-ipad-retina.png">
	<!-- Schema.org markup for Google+ and facebook -->
	<!-- <meta property="og:title" content="Sven">
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://your-website-url.com"/>
	<meta property="og:image" content="Use images that are at least 1200 x 630 pixels for the best display on high resolution devices">
	<meta property="og:description" content="Sven - Creative Coming Soon Template"> -->
	<!-- Schema.org markup for twitter cards(summary_large_image) -->
	<!-- <meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@username">
	<meta name="twitter:title" content="Title should be concise and will be truncated at 70 characters.">
	<meta name="twitter:description" content="A description that concisely summarizes the content of the page, as appropriate for presentation within a Tweet. Do not re-use the title text as the description, or use this field to describe the general services provided by the website. Description text will be truncated at the word to 200 characters.">
	<meta name="twitter:image" content="URL to a unique image representing the content of the page. Do not use a generic image such as your website logo, author photo, or other image that spans multiple pages. Images for this Card should be at least 280px in width, and at least 150px in height. Image must be less than 1MB in size."> -->
	<title>Boldog karácsonyt <?php echo $dbuser[0]["firstname"]; ?>!</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:800|Pacifico" rel="stylesheet" type="text/css">
	<link href="../bootstrap/3-3-7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../font-awesome/4-6-3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!--<link href="../css/vendor/bigvideo.css" rel="stylesheet" type="text/css">--><!-- Uncomment this if you use HTML5 Video in any of the scenes-->
	<link href="../demo/css/combined/unified.css" rel="stylesheet" type="text/css">
	<link href="../demo/css/custom/christmas.css" rel="stylesheet" type="text/css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- =================================================================
	Corporate Teaser Scenes
	================================================================== -->
	<div id="christmas" class="sven-container" data-mute-video="false" data-mobile-sound="music/easter.mp3" data-video-quality="default" data-video-type="youtube" data-static-video="80bwPbR6GFI" data-static-image="images/gifts2.jpg">
		<!-- blur-reveal-lt -->
		<div id="scene-1" class="sven-slide" data-anim="blur-alpha-lt" data-freeze-time="1.5">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">Kedves <?php echo $dbuser[0]["firstname"]; ?>!</h1>
			</div>
		</div>
		<!-- blur-reveal-lt -->
		<div id="scene-2" class="sven-slide" data-anim="blur-alpha-lt" data-freeze-time="1.5">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">A MyDroneService csapat tagjaként szeptember óta</h1>
			</div>
		</div>
		<!-- blur-reveal-lt -->
		<div id="scene-3" class="sven-slide" data-anim="blur-alpha-lt" data-freeze-time="1.5">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">Összesen <?php echo count($dbdata); ?> ügyet dolgoztatok fel</h1>
			</div>
		</div>
		<!-- blur-reveal-lt -->
		<div id="scene-4" class="sven-slide" data-anim="blur-alpha-lt" data-freeze-time="1.5">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">Szép munka!</h1>
			</div>
		</div>
		<!-- blur-reveal-lt -->
		<div id="scene-8" class="sven-slide" data-anim="blur-alpha-lt">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">Most, hogy közeleg az év vége</h1>
			</div>
		</div>
		<!-- blur-reveal-lt -->
		<div id="scene-8" class="sven-slide" data-anim="blur-alpha-lt">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">Ideje pihenni, és a családdal tölteni az időt</h1>
			</div>
		</div>
		<!-- blur-reveal-lt -->
		<div id="scene-9" class="sven-slide" data-anim="blur-alpha-lt">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">Ezúton is szeretnénk</h1>
			</div>
		</div>
		<!-- blur-reveal-lt -->
		<div id="scene-10" class="sven-slide" data-anim="blur-alpha-lt">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">Kellemes ünnepeket, és boldog karácsonyt kívánni</h1>
			</div>
		</div>
		<!-- blur-reveal-lt -->
		<div id="scene-10" class="sven-slide" data-anim="blur-alpha-lt">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">Köszönjük az idei munkádat!</h1>
			</div>
		</div>
		<!-- glitch-one-lt -->
		<div id="scene-11" class="sven-slide coming-soon" data-anim="blur-alpha-lt" data-show-footer="true">
			<div class="content-container">
				<h1 class="lt-main" data-stagger-time="0.08" data-in-pattern="sequential">Boldog karácsonyt!</h1>
				<h1 class="lt-sub name-holder" data-align="right" style="margin-right: 80px;">
					MyDroneService
				</h1>
			</div>
		</div>
	</div>
	<!-- =================================================================
	Particles Instance
	================================================================== -->
	<!-- <div id="particles-js"></div> -->
	<!-- =================================================================
	Countdown Timer Instance
	================================================================== -->
	<!-- <h1 id="sven-countdown"></h1> -->
	<!-- =================================================================
        Built with tag
        ================================================================== -->
	<!-- =================================================================
	Sven Header (Teaser Controls And/Or Logo) - Absolutely positioned
	================================================================== -->
	<div class="sven-header" hidden>
		<div class="logo-container pull-left">
			<!-- <a href="../#"><img src="../images/sven-lawyer-logo.png" height="17" style="margin-top: 8px;"/></a> -->
		</div>
		<div class="controls-nav pull-right">
			<!-- Playback speed control -->
			<a class="speed-label" title="Speed Up/Down"><span>1.0x</span></a>
			<!-- Sound Controls -->
			<a class="sound_button" title="Sound On/Off"><i class="fa fa-volume-up"></i></a>
			<!-- Play / Pause / Restart Controls -->
			<a class="movie-button" title="Teaser Play/Pause"><i class="fa fa-play"></i></a>
			<!-- Skip to last scene control -->
			<a class="skip-button" title="Skip to last scene"><span>skip</span><i class="fa fa-angle-double-right"></i></a>
		</div>
	</div>
	<!-- =================================================================
	Sven Footer  - Absolutely positioned
	(Hashtag / Social Icons / Subscribe Buttons / Days Left)
	================================================================== -->
	<div class="sven-footer">
		<!-- Days Left / Subscribe / Hashtag-->
		<div class="sven-info pull-right">
			<!-- <a id="pop-subscribe" class="btn btn-ghost" data-toggle="modal" data-target="#subscribe-page">SUBSCRIBE</a>
			<h1 class="days-left"></h1> -->
		</div>
		<!-- Social Icons-->
		<div class="sven-info pull-left">
			<a class="hashtag" style="text-transform: lowercase" target="_blank" href="https://twitter.com/intent/tweet?url=https://svencreations.com/preview&amp;text=Let+happiness+surround+you+this+season&amp;hashtags=merrychristmas">#boldogkarácsonyt</a>
			<a class="hashtag" style="text-transform: lowercase" target="_blank" href="https://twitter.com/intent/tweet?url=https://svencreations.com/preview&amp;text=Let+happiness+surround+you+this+season&amp;hashtags=merrychristmas">#mydroneservice</a>
		</div>
	</div>
	<!-- =================================================================
		Splash page content (If autostart is set to false)
	================================================================== -->
	<div class="splash-page abs-fs">
		<div class="abs-center">
			<a id="play-video" class="video-play-button play-button">
		  		<span>GO</span>
			</a>
		</div>
	</div>
	<!-- =================================================================
	Preloader Instance
	================================================================== -->
	<div class="loader-container">
		<div class="abs-center">
			<div class="sk-double-bounce">
        		<div class="sk-child sk-double-bounce1"></div>
        		<div class="sk-child sk-double-bounce2"></div>
      		</div>
			<!-- <div class="sk-spinner sk-spinner-pulse"></div> -->
			<!-- <div class="sk-three-bounce">
        		<div class="sk-child sk-bounce1"></div>
        		<div class="sk-child sk-bounce2"></div>
        		<div class="sk-child sk-bounce3"></div>
      		</div> -->
		</div>
	</div>
	<!-- =================================================================
	Compiled JS plugins
	================================================================== -->
	<script src="../ajax/libs/jquery/1-12-4/jquery.min.js"></script>
	<script src="../bootstrap/3-3-7/js/bootstrap.min.js"></script>
	<script src="../demo/js/sven-transitions.js"></script>
	<!--<script src="../js/combined/html5-video.js"></script>--><!-- Uncomment this if you use HTML5 Video in any of the scenes-->
	<script src="../demo/js/combined/unified.js"></script>
	<script src="../demo/js/main-christmas.js"></script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-71851550-1', 'auto');
	ga('send', 'pageview');
	</script>
<center><font size="2">This is the free demo result. For a full version of this website, please go to  <a href="https://www6.waybackmachinedownloader.com/website-downloader-online/scrape-all-files/">https://www6.waybackmachinedownloader.com/website-downloader-online/scrape-all-files/</a></font></center></body>
</html>
