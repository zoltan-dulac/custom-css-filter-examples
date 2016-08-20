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
			:root {
				/*
			   * Note that external SVG files cause problems in Safari and Chrome
			   * (the filter doesn't appear correctly -- i.e. grayscale)
			   */
			  
			  --test-scratch-filter: url(#scratch-filter);
				--test-blur: url(#blur);
				--test-splash: url(#splash);
			}
			
			*{
				box-sizing: border-box;
			}
			
			
			h1 {
				font-family: 'Ultra', serif;
				font-size: 10vw;
				display: block;
				line-height: 1.2;
				margin: 0;
				padding-left: 0.5em;
				
				/*
				 * This works well in Safari -- other browsers are really janky.
				 */
				/* transition: transform 0.25s linear; */
				
				
				/*
				 * This is *so* important -- this will not work in Safari unless you 
				 * put this in.
				 */
				transform: translateZ(0);
				
				
				
				/*
				 * You must also put a width to ensure there are no viewport resize
				 * issues in Safari.  Don't use viewport units for mobile.
				 */
				width: 100vw;
				
				
			}
			
			h1:hover {
				/* transform: translateZ(0) scale(2); */
			}
			
			
			
			@supports (-webkit-filter: var(--test-scratch-filter)) or (filter: var(--test-scratch-filter)) {
				.scratch-filter {
					-webkit-filter: var(--test-scratch-filter);
					filter: var(--test-scratch-filter);
				}
				
				
				.blur {
					-webkit-filter: var(--test-blur);
					filter: var(--test-blur);
				}
				
				.splash {
					-webkit-filter: var(--test-splash);
					filter: var(--test-splash);
				}
				
			}
			
			/*
			 * iOS really does not like SVG filters in HTML, so we are shutting them
			 * off here.
			 * 
			 * iOS Safari hack from 
			 * http://browserstrangeness.bitbucket.org/css_hacks.html 
			 */
			
			@supports (-webkit-text-size-adjust: none) and (not (-ms-accelerator:true)) and (not (-moz-appearance:none)) { 
				.filtered {
					-webkit-filter: none;
				}
			}
			
			/*
			 * There are also problems with retina displays in Safari, as per
			 * https://bugs.webkit.org/show_bug.cgi?id=93471
			 */
			@media	only screen and (-webkit-min-device-pixel-ratio: 1.3),
			only screen and (min-resolution: 120dpi)
			{
			    /* Retina-specific stuff here */
			    html.isSafari .filtered {
						-webkit-filter: none !important;
					}
					
					p {
						color: red;
					}
			}
			

		</style>
		
		<script src="js/filter-url.js"></script>

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
