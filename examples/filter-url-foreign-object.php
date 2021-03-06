<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		<!-- 
			This is the winner!
		-->

		<title>SVG filter with CSS variables example</title>
		<meta name="description" content="Why does the CSS filter that links to an external SVG file become grayscale in Chrome when the exact same SVG code on the HTML file renders correctly?">
		<meta name="author" content="Zoltan Hawryluk">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">

		<link rel="stylesheet" href="css/reset.css" > 
		<link rel="stylesheet" href="css/Ultra/stylesheet.css" > 
		<link rel="stylesheet" href="css/filter-url.css" />
		
		<style>
			<?php
				include 'css/embedded-svg.css';
				include 'css/basic.css';
				include 'css/px-font-height.css';
				include 'css/filter.css';
				include 'css/hover.css';
				include 'css/fix-retina-bug-ios.css';
			?>
		
			svg {
				border: solid 1px red;
				/*
				 * This is *so* important -- this will not work in Safari unless you 
				 * put this in.
				 */
				transform: translateZ(0);
				
				
				/*
				 * You must also put a width to ensure there are no reflow issues 
				 * when the viewport resizes in Safari.  Don't use viewport units for 
				 * mobile.
				 */
				width: 100%;
				
				/*
				 * This must be in place so the HTML text inside the svg is totally 
				 * visible, no matter what the viewport size.
				 */
				
				overflow: visible;
			}
			
			
			
			
			/*
			 * This solution also works in iOS Safari (Yes!) and has no retina issues
			 * in OSX Safari (W00t!)
			 */
		</style>

		<meta property="og:title" content="SVG filter with CSS variables example" />
		<meta property="og:description" content="Why does the CSS filter that links to an external SVG file become grayscale in Chrome when the exact same SVG code on the HTML file renders correctly?" />
		<meta property="og:image" content="social/filter-url.jpg" />

		<meta name="twitter:card" content="photo">
		<meta name="twitter:title" content="Why does the CSS filter that links to an external SVG file become grayscale in Chrome when the exact same SVG code on the HTML file renders correctly?" />
		<meta name="twitter:image" content="social/filter-url.jpg">
		
		<script src="js/filter-url.js"></script>

	</head>

	<body>
			<?php
				include 'images/filter.svg';
			?>
			
	<svg width="100%" height="100%">
		<!-- 
			Do not use requiredExtensions="http://www.w3.org/1999/xhtml" in the
			foreignObject element. It messes up Chrome.
			
			http://stackoverflow.com/questions/17693278/foreignobject-displayblock-not-working-in-chrome
		-->
	  <foreignObject  width="100%" height="100%">
	    <body xmlns="http://www.w3.org/1999/xhtml">
	      <h1 class="filtered scratch-filter">Nat King Cole</h1>
	    </body>
	  </foreignObject>
	</svg>
		
	<p>
		This is an example of using a SVG filter on HTML elements.  The HTML
		is surrounded with an SVG <code>foreignElement</code> tag.  This ensures
		that the filter is applied correctly in both mobile and desktop Safari,
		which has a lot of issues applying SVG filters on plain HTML elements.
	</p>
	</body>
</html>
