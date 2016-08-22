<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>SVG filter with CSS variables example</title>
		<meta name="description" content="Why does the CSS filter that links to an external SVG file become grayscale in Chrome when the exact same SVG code on the HTML file renders correctly?">
		<meta name="author" content="Zoltan Hawryluk">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">

		<link rel="stylesheet" href="css/Ultra/stylesheet.css" > 
		<link rel="stylesheet" href="css/filter-url.css" />
		
		<style>
			<?php
				include 'css/embedded-svg.css';
				include 'css/basic.css';
				include 'css/px-font-height.css';
				include 'css/filter.css';
				include 'css/hover.css';
				include 'css/turn-off-in-ios.css';
				include 'css/fix-retina-bug-ios.css';
			?>
		</style>

		<meta property="og:title" content="SVG filter with CSS variables example" />
		<meta property="og:description" content="Why does the CSS filter that links to an external SVG file become grayscale in Chrome when the exact same SVG code on the HTML file renders correctly?" />
		<meta property="og:image" content="social/filter-url.jpg" />

		<meta name="twitter:card" content="photo">
		<meta name="twitter:title" content="Why does the CSS filter that links to an external SVG file become grayscale in Chrome when the exact same SVG code on the HTML file renders correctly?" />
		<meta name="twitter:image" content="social/filter-url.jpg">

	</head>

	<body>
			<?php
				include 'images/filter.svg';
			?>
		
    <h1 class="filtered scratch-filter">Nat King Cole</h1>
    
    <p>The text at the top is rendered using a filter coming from an SVG 
    	embedded in the HTML document.  The second version is rendered using
    	a standalone SVG file.  Both have exactly the same code but in Chrome, 
    	the bottom one is rendered in grayscale.</p>
    	
    <p>In Safari 9.1, the filtered text doesn't appear unless you reduce the window
    	size to around 504 pixels <strong>and you reload the page (!?!??)</strong></p>
    	
    <h1 class="filtered blur">Nat King Cole</h1>
    
    <h1 class="filtered splash">Nat King Cole</h1>
    
	</body>
</html>
