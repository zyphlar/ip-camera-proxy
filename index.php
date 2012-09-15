<?php 
/* IP Camera Proxy
 * PHP frontend to interface with cheap password-protected webcams and 
 * pull images for public display on a website
 * 
 * Copyright Will Bradley, 2012 (www.zyphon.com)
 * Distributed under a Creative Commons Attribution 3.0 license
 * http://creativecommons.org/licenses/by/3.0/
 *
 * See the snapshot.php file or README for setup instructions.
 * 
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
  <script type="text/javascript">
    function refresh() {
      document.getElementById("livestream1").src = "snapshot.php?camera=1&"+Math.round(Math.random()*1000000);
      document.getElementById("livestream2").src = "snapshot.php?camera=2&"+Math.round(Math.random()*1000000);
      document.getElementById("livestream3").src = "snapshot.php?camera=3&"+Math.round(Math.random()*1000000);
    }
    function pageLoad() {
      setInterval ( "refresh()", 30000 );
    }
  </script>
  <style type="text/css">
    body { background-color: #2C2C29; color: #2C2C29; font-family: Tahoma; font-size: 11px; margin: 0; padding: 0; }

    #wrapper { width: 1024px; margin: 0 auto; }
    #top { height:116px; margin: 0 0 0 5px; }
    #content { background-color: #fff; padding: 1em 0 1em 1em; font-size: 1.2em; }

    .caption {
      background-color: #F3F3F3;
      border: 1px solid #DDD;
      padding: 3px;
      margin: 0 0 20px 1px;
      width: 320px;
      display: inline-block;
    }
    
    .footer {
      clear: both;
    }

    h1,h2,h3,h4 {
      font-family: Helvetica, Georgia;
      font-size: 24px;
      letter-spacing: -1px;
      margin: 0px 0px 10px;
      border-bottom: 1px solid #DCDCDB;
    }
    h2 { font-size: 22px; }
    h3 { font-size: 20px; }
    h4 { font-size: 18px; }
  </style>
</head>

<body onLoad="pageLoad()">
<div id="wrapper">

  <div id="content">
    <h2>Live Webcams</h2>

    <div class="caption">
      <img id="livestream1" src="snapshot.php?camera=1" width="320" height="240" />
    </div>

    <div class="caption">
      <img id="livestream2" src="snapshot.php?camera=2" width="320" height="240" />
    </div>

    <div class="caption">
      <img id="livestream3" src="snapshot.php?camera=3" width="320" height="240" />
    </div>

  </div>
</div>
</body>
</html>
