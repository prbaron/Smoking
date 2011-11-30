<!DOCTYPE html> 
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Smoking.js</title>
<!-- 	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/> -->
	<link rel="shortcut icon" href="img/favicon.jpg"/>
    <link rel="apple-touch-icon-precomposed" href="img/favicon.jpg"/> 
    <link rel="icon" type="image/png" href="img/favicon.jpg" />
    
    <meta name="author" content="Pierre Baron" />
    <meta name="description" content="Smoking.js is a jQuery solution to create beautiful forms elements." /> 
	<meta name="keywords" content="Pierre Baron, Smoking, Smoking.js" />
		
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/media-queries.css">
	<link rel="stylesheet" type="text/css" href="syntaxhighlighter/css/shCoreDefault.css" />

	<!--[if IE]>
		<link rel="stylesheet" media="screen" type="text/css" href="css/ie.css">
	<![endif]-->
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="js/tooltipsy.min.js"></script>
	<script type="text/javascript" src="js/smoking-1.0.0.js"></script>

	<script type="text/javascript" src="syntaxhighlighter/js/shCore.js"></script>
	<script type="text/javascript" src="syntaxhighlighter/js/shBrushCss.js"></script>
	<script type="text/javascript" src="syntaxhighlighter/js/shBrushPhp.js"></script>
	<script type="text/javascript" src="syntaxhighlighter/js/shBrushJScript.js"></script>
	
	<script type="text/javascript">
		// fonction initialisation
		$(function(){
			SyntaxHighlighter.all();
			$("#formExample").smoking();
			$(".tooltip").tooltipsy({offset:[0,5],show:function(a,b){b.css({top:parseInt(b[0].style.top.replace(/[a-z]/g,""))+10+"px",opacity:"0.0",display:"block"}).animate({top:parseInt(b[0].style.top.replace(/[a-z]/g,""))-10+"px",opacity:"1.0"},200)},hide:function(a,b){b.css({top:parseInt(b[0].style.top.replace(/[a-z]/g,""))+"px",opacity:"1.0",display:"block"}).animate({top:parseInt(b[0].style.top.replace(/[a-z]/g,""))+10+"px",opacity:"0.0"},100)}});
		});
	</script>
</head>
<body>
	<div id="top-header"></div>
	<div id="header-container">
		<div id="header" class="container_12">
			<div id="logo">
				<h1>Smoking.js</h1>
				<em>A jQuery plugin by <a href="http://prbaron.free.fr">Pierre Baron</a></em>
			</div> <!-- #logo -->

			<div id="download">
				<a href="js/smoking-1.0.0.min.js">DOWNLOAD - <?php	
				$file = "js/smoking-1.0.0.min.js";
				$taille = filesize($file);
				$taille = round($taille / 1024 * 100) / 100;
				echo $taille;

			?> Kb</a>
			</div>
		</div> <!-- .container_12 -->
	</div> <!-- #header -->
	
	<div id="corps" class="container_12">
		<div id="introducing" class="grid_12 first">
			<img src="img/bg-intro-top.jpg" alt="dash" />
			<h2>Introducing Smoking.js, a jQuery solution to create <br/>beautiful forms elements.</h2>
		</div> <!-- #introducing -->
		
		<div id="features" class="grid_12 first">
			<h2>Features</h2>
			<div class="grid_4 first">
				<h3>Easy to use</h3>
				<p>You are just three steps away from creating your best form ever!</p>
				<ol>
					<li>Create your form as usual</li>
					<li>Add smoking.js to your html file</li>
					<li>Fill in the smoking.css file</li>
				</ol>
			</div> <!-- .grid_4 -->
			<div class="grid_4">
				<h3>Mobile ready</h3>
				<p>Because mobile surfing is more and more important on the web, this script works perfectly on tablets and smarphones to create the best experience on mobile devices.</p>
			</div> <!-- .grid_4 -->
			<div class="grid_4">
				<h3>Customizable at will</h3>
				<p>Aren't you bored about scripts that forces you to use a common design?</p><br/>
				<p>This script create all the elements you need to design your own form. No compulsory styles, you creativity is your only limit.</p>
			</div> <!-- .grid_4 -->
		</div> <!-- #features -->
		
		<div id="example" class="grid_12 first">
			<h2>Example</h2>
		</div> <!-- #example -->
		
		<div id="installation" class="grid_12 first">
			<h2>Installation</h2>
			<p>First, create your form as usual.</p>
			<pre class="brush :php">
				&lt;div id="form"&gt;
					&lt;form method="post" action="#"&gt;
						&lt;fieldset&gt;
							&lt;label&gt;My name is &lt;/label&gt;
							&lt;input type="text" name="name"/&gt;
						&lt;/fieldset&gt;
						
						&lt;fieldset&gt;
							&lt;p&gt;I am :&lt;/p&gt;
							&lt;input type="radio" name="sex" value="male" id="male" checked="checked"/&gt; &lt;label for="male"&gt;Male&lt;/label&gt;&lt;br /&gt;
					       	&lt;input type="radio" name="sex" value="female" id="female" /&gt; &lt;label for="female"&gt;Female&lt;/label&gt;&lt;br /&gt;
					       	&lt;input type="radio" name="sex" value="I don't know" id="dontknow" disabled="disabled"/&gt; &lt;label for="dontknow"&gt;I don't know&lt;/label&gt;&lt;br /&gt;
						&lt;/fieldset&gt;
						&lt;fieldset&gt;
							&lt;p&gt;I live with :&lt;/p&gt;
							&lt;input type="checkbox" name="family[]" value="father" checked="checked"/&gt; my father&lt;br/&gt;
							&lt;input type="checkbox" name="family[]" value="mother" checked="checked"/&gt; my mother&lt;br/&gt;
							&lt;input type="checkbox" name="family[]" value="brother" /&gt; my brother&lt;br/&gt;
							&lt;input type="checkbox" name="family[]" value="sister"/&gt; my sister&lt;br/&gt;
							&lt;input type="checkbox" name="family[]" value="alien" disabled="disabled"/&gt; an alien called Roger&lt;br/&gt;
						&lt;/fieldset&gt;
						&lt;fieldset&gt;
							&lt;p&gt;I come from :&lt;/p&gt;
							&lt;select name="country" id="country"&gt;
				               &lt;option value="France"&gt;France&lt;/option&gt;
				               &lt;option value="Spain"&gt;Spain&lt;/option&gt;
				               &lt;option value="Italy"&gt;Italy&lt;/option&gt;
				               &lt;option value="United Kingdom"&gt;United Kingdom&lt;/option&gt;
					       	&lt;/select&gt;	
						&lt;/fieldset&gt;
						
						&lt;fieldset&gt;
							&lt;p&gt;I want to add a file : &lt;/p&gt;
							&lt;input type="file" /&gt;
						&lt;/fieldset&gt;
						&lt;input type="submit" value="Send infos" /&gt;
					&lt;/form&gt;
				&lt;/div&gt;
			</pre>
			<br/>
			<p>OK, now add these lines in your header.</p>
			<pre class="brush: js">
				&lt;script type="text/javascript" src="smoking-1.0.min.js"&gt;&lt;/script&gt;
				&lt;script type="text/javascript"&gt;
						$("#form").smoking();
				&lt;/script&gt;
			</pre>
			
			<br/>
			<p>Fill the css provided with the script and it works!</p>
		</div> <!-- installation -->
			
			
		<div id="documentation" class="grid_12 first">
			<h2>Documentation</h2>
			<ul>
				<li>
					<strong>activeCheckbox</strong>
					<p>Set to true to create elements to design your checkboxes.</p>
					<p class="documentation-default">Boolean : true (default) / false</p>
				</li>
				<li>
					<strong>activeFile</strong>
					<p>Set to true to create elements to design your file input.</p>
					<p class="documentation-default">Boolean : true (default) / false</p>
				</li>
				<li>
					<strong>activeRadio</strong>
					<p>Set to true to create elements to design your radios.</p>
					<p class="documentation-default">Boolean : true (default) / false</p>
				</li>
				<li>
					<strong>activeSelect</strong>
					<p>Set to true to create elements to design your select input.</p>
					<p class="documentation-default">Boolean : true (default) / false</p>
				</li>
				<li>
					<strong>fileButtonPosition</strong>	
					<p>Set the position of the file button</p>
					<p class="documentation-default">String : "top" / "left" (default) / "right" / "bottom"</p>
				</li>
				<li>
					<strong>fileButtonText</strong>
					<p>Set the text of the file button.</p>
					<p class="documentation-default">String : "Choose file"</p>
				</li>
				<li>
					<strong>fileText</strong>
					<p>Set the default text of the file input.</p>
					<p class="documentation-default">String : "No file Selected"</p>
				</li>				
			</ul>
		</div> <!-- #documentation -->
			
		<div id="works" class="grid_12 first">
			<h2>Other works</h2>
			
			<div class="grid_4 first">
				<a href="#"><img alt="" src="img/img-work.jpg" /></a>
				<span>pbForm by <em>Pierre Baron</em></span>
			</div> <!-- .grid_4 -->
			<div class="grid_4">
				<a href="#"><img alt="" src="img/img-work.jpg" /></a>
				<span>pbForm by <em>Pierre Baron</em></span>
			</div> <!-- .grid_4 -->
			<div class="grid_4">
				<a href="#"><img alt="" src="img/img-work.jpg" /></a>
				<span>pbForm by <em>Pierre Baron</em></span>
			</div> <!-- .grid_4 -->
		</div> <!-- #works -->
	</div> <!-- #corps -->
	
	<div id="top-footer"></div>
	<div id="footer-container">
		<div id="footer" class="container_12">
			<div class="grid_4 first">
				<h3>About me</h3>
				<p>I am a young Senior Engineer in Home automation and a passionate of web development.</p>
				<ul>
					<li><a href="mailto:prbaron22@gmail.com" class="tooltip" title="Email me!">Mail</a></li>				
					<li><a href="http://twitter.com/#!/prbaron" class="tooltip" title="Tweet me!">Twitter</a></li>
					<li><a href="https://plus.google.com/118186705508848671489/about" class="tooltip" title="Join me on Google+!">Google+</a></li>
					<li><a href="skype:prbaron22" class="tooltip" title="Chat with me!">Skype</a></li>
				</ul>
			</div> <!-- .grid_4 -->
			
			<div class="grid_4">
				<h3>Subscribe</h3>
				<p>Subscribe to the newsletter to stay tuned about the updates of the plugin!<p>
				<form action="test_subscribe.php" method="post" id="subscribe">
					<input type="email" placeholder="Subscribe to newsletter" name="email"/><br/>
					<input type="text" class="toSend" name="tosend" /><br/>
					<input type="submit" value="Subscribe"/>
				</form>
			</div> <!-- .grid_4 -->
			<div class="grid_4">
				<h3>Support me</h3>
				<p>Do you like this script? Perhaps you can buy me a chocolate drink!</p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="right">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="CE4HL77ZH9UHJ">
					<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
					<input type="submit" name="submit" value="Donate"/>
				</form>
			</div> <!-- .grid_4 -->
		</div> <!-- .container_12 -->
	</div> <!-- #footer -->
	
	<div id="copyright">
		<div class="container_12">
			<span>This work is licensed under a Creative Commons attribute 3.0 Unported License.</span>
			<span class="right"> 2011 - <?php echo Date("Y") ?>. Pierre Baron</span>
		</div> <!-- .container_12 -->	
	</div> <!-- #copyright -->
</div> <!-- #wrap -->

<!-- Google Analytics -->
	<script type="text/javascript">
  		var _gaq = _gaq || [];
  		_gaq.push(['_setAccount', 'UA-21369110-1']);
  		_gaq.push(['_trackPageview']);

  		(function() {
    		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  		})();
	</script>
</body>
</html>