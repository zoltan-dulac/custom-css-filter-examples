<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>SVG filter with CSS variables example</title>
		<meta name="description" content="Testing SVG filter on an SVG file (not HTML)?">
		<meta name="author" content="Zoltan Hawryluk">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ultra" > 
		
		<style>
			html{
        height: 100%;
      }

      body{
        height: 100%;
        background: radial-gradient(ellipse at center, rgba(0,0,0,0) 40%,rgba(140,114,93,0.7) 100%),#FFECDF url('paper.jpg');
        background-size: cover;
        background-attachment: fixed;
        padding: 0;
        margin: 0;
      }

      ::selection {
        background: #73DCFF;
      }

      ::-moz-selection {
        background: #73DCFF;
      }

      svg{
        display: block;
        position: relative;
        width: 1050px;
        height: 200px;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        margin: 0 auto;
        overflow: hidden;
        background-size: cover;
      }

      .filtered{
        filter: url(#filter);
        -webkit-filter: url(#filter);
        fill: #9673FF;
        color: #9673FF;
        font-family: 'Alfa Slab One', cursive;
        text-transform: uppercase;
        font-size: 190px;
      }

		</style>

		<meta property="og:title" content="SVG filter with CSS variables example" />
		<meta property="og:description" content="Testing SVG filter on an SVG file (not HTML)?" />
		<meta property="og:image" content="social/filter-url-svg-only.jpg" />

		<meta name="twitter:card" content="photo">
		<meta name="twitter:title" content="Testing SVG filter on an SVG file (not HTML)?" />
		<meta name="twitter:image" content="social/filter-url-svg-only.jpg">

	</head>

	<body>
			 <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >

      <defs>
        <filter id="filter">
          <!-- COLOR -->
          <feFlood flood-color="#73DCFF" flood-opacity="0.75" result="COLOR-blu" />
          <feFlood flood-color="#9673FF" flood-opacity="0.4" result="COLOR-red" />
          <!-- COLOR END -->

          <!-- Texture -->
          <feTurbulence baseFrequency=".05" type="fractalNoise" numOctaves="3" seed="0" result="Texture_10" />
          <feColorMatrix type="matrix"
          values="0 0 0 0 0,
          0 0 0 0 0,
          0 0 0 0 0,
          0 0 0 -2.1 1.1" in="Texture_10"  result="Texture_20" />

          <feColorMatrix result="Texture_30" type="matrix"
          values="0 0 0 0 0,
          0 0 0 0 0,
          0 0 0 0 0,
          0 0 0 -1.7 1.8" in="Texture_10" />
          <!-- Texture -->

          <!-- FILL -->
          <feOffset dx="-3" dy="4" in="SourceAlpha" result="FILL_10"/>
          <feDisplacementMap scale="17" in="FILL_10" in2="Texture_10" result="FILL_20" />
          <feComposite operator="in" in="Texture_30" in2 = "FILL_20" result="FILL_40"/>
          <feComposite operator="in" in="COLOR-blu" in2="FILL_40" result="FILL_50" />
          <!-- FILL END-->

          <!-- OUTLINE -->
          <feMorphology operator="dilate" radius="3" in="SourceAlpha" result="OUTLINE_10" />
          <feComposite operator="out" in="OUTLINE_10" in2 = "SourceAlpha" result="OUTLINE_20" />
          <feDisplacementMap scale="7" in="OUTLINE_20" in2="Texture_10" result="OUTLINE_30" />
          <feComposite operator="arithmetic" k2="-1" k3="1" in="Texture_20" in2="OUTLINE_30" result="OUTLINE_40" />
          <!-- OUTLINE END-->

          <!-- BEVEL OUTLINE -->
          <feConvolveMatrix order="8,8" divisor="1"
            kernelMatrix="1 0 0 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 1 " in="SourceAlpha" result="BEVEL_10" />
          <feMorphology operator="dilate" radius="2" in="BEVEL_10" result="BEVEL_20" />
          <feComposite operator="out" in="BEVEL_20" in2="BEVEL_10" result="BEVEL_30"/>
          <feDisplacementMap scale="7" in="BEVEL_30" in2="Texture_10" result="BEVEL_40" />
          <feComposite operator="arithmetic" k2="-1" k3="1" in="Texture_20" in2="BEVEL_40" result="BEVEL_50" />
          <feOffset dx="-7" dy="-7" in="BEVEL_50" result="BEVEL_60"/>
          <feComposite operator="out" in="BEVEL_60" in2 = "OUTLINE_10" result="BEVEL_70" />
          <!-- BEVEL OUTLINE END -->

          <!-- BEVEL FILL -->
          <feOffset dx="-9" dy="-9" in="BEVEL_10" result="BEVEL-FILL_10"/>
          <feComposite operator="out" in="BEVEL-FILL_10" in2 = "OUTLINE_10" result="BEVEL-FILL_20" />
          <feDisplacementMap scale="17" in="BEVEL-FILL_20" in2="Texture_10" result="BEVEL-FILL_30" />
          <feComposite operator="in" in="COLOR-red" in2="BEVEL-FILL_30" result="BEVEL-FILL_50" /> <!-- -->
          <!-- BEVEL FILL END-->

          <feMerge  result="merge2">
           <feMergeNode in="BEVEL-FILL_50" />
           <feMergeNode in="BEVEL_70" />
           <feMergeNode in="FILL_50" />
            <feMergeNode in="OUTLINE_40" />
          </feMerge>
        </filter>
      </defs>

      <text class="filtered" x="20" y="140">Scratch!</text>
    </svg>
    
    <script src="js/filter-url.js"></script>
	</body>
</html>