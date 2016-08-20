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

		<link rel="stylesheet" href="css/Ultra/stylesheet.css" > 
		<link rel="stylesheet" href="css/filter-url.css" />
		
		<style>
			:root {
				/*
			   * Note that external SVG files cause problems in Safari and Chrome
			   * (the filter doesn't appear correctly -- i.e. grayscale)
			   */
			  
			  --test-filter: url(images/filter.svg#scratch-filter);
			}
			
			*{
				box-sizing: border-box;
			}
			
			svg {
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
				
				height: 1px;
				overflow: visible;
			}
			
			svg foreignObject {
				font-family: 'Ultra', serif;
				font-size: 50px;
				display: block;
				line-height: 1.2;
				margin: 0;
				padding-left: 0.5em;
				
				
				
				
				width: 100vw;
				
				
			}
			
			h1:hover {
				/* transform: translateZ(0) scale(2); */
			}
			
			
			
			@supports (-webkit-filter: var(--test-filter)) or (filter: var(--test-filter)) {
				.filtered {
					-webkit-filter: var(--test-filter);
					filter: var(--test-filter);
				}
				
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

	</head>

	<body>
			
			
	<svg>
	  <foreignObject class="filtered" width="100%" height="500"
	                   requiredExtensions="http://www.w3.org/1999/xhtml">
	    <body xmlns="http://www.w3.org/1999/xhtml">
	      <h1  >Nat King Cole</h1>
	    </body>
	  </foreignObject>
	</svg>
		
    
    
    
	</body>
</html>
