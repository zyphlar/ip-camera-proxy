<?php
/* IP Camera Proxy
 * PHP frontend to interface with cheap password-protected webcams and 
 * pull images for public display on a website
 * 
 * Copyright Will Bradley, 2012 (www.zyphon.com)
 * Distributed under a Creative Commons Attribution 3.0 license
 * http://creativecommons.org/licenses/by/3.0/
 *
 * To use, change EXAMPLE.COM, the port number, EXAMPLEUSER, & EXAMPLEPASSWORD
 * to their correct values for your setup. I use cheap Hootoo-brand cameras
 * for my setup, yours may be different regarding snapshot urls and auth
 * mechanisms. Then, host this on a PHP site and access it at 
 * /snapshot.php?camera=1
 * 
 */

if($_GET['camera'] == 1) 
{
	$rand = rand(1000,9999);
	$url = 'http://EXAMPLE.COM:80/snapshot.cgi?'.$rand;
	
	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl_handle,CURLOPT_URL,$url); 
	curl_setopt($curl_handle, CURLOPT_USERPWD, "EXAMPLEUSER:EXAMPLEPASSWORD");
	$buffer = curl_exec($curl_handle);
	curl_close($curl_handle);
	
	if (empty($buffer))
	{
	    print "";
	}
	elseif($buffer == "Can not get image.")
	{
	    print "Can not get image.";
	}
	else
	{
	    header("Content-Type: image/jpeg");
	    print $buffer;
	}
}
elseif($_GET['camera'] == 2) 
{
	$rand = rand(1000,9999);
	$url = 'http://EXAMPLE.COM:81/snapshot.cgi?'.$rand;
	
	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl_handle,CURLOPT_URL,$url); 
	curl_setopt($curl_handle, CURLOPT_USERPWD, "EXAMPLEUSER:EXAMPLEPASSWORD");
	$buffer = curl_exec($curl_handle);
	curl_close($curl_handle);
	
	if (empty($buffer))
	{
	    print "";
	}
	elseif($buffer == "Can not get image.")
	{
	    print "Can not get image.";
	}
	else
	{
	    header("Content-Type: image/jpeg");
	    print $buffer;
	}
}
elseif($_GET['camera'] == 3) 
{
	$rand = rand(1000,9999);
	$url = 'http://EXAMPLE.COM:82/snapshot.cgi?'.$rand;
	
	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl_handle,CURLOPT_URL,$url); 
	curl_setopt($curl_handle, CURLOPT_USERPWD, "EXAMPLEUSER:EXAMPLEPASSWORD");
	$buffer = curl_exec($curl_handle);
	curl_close($curl_handle);
	
	if (empty($buffer))
	{
	    print "";
	}
	elseif($buffer == "Can not get image.")
	{
	    print "Can not get image.";
	}
	else
	{
	    header("Content-Type: image/jpeg");
	    print $buffer;
	}
}
elseif($_GET['camera'] == 9)
{
	# Used to separate multipart
	$boundary = "IPCamBoundary";
	
	# We start with the standard headers. PHP allows us this much
	header("Cache-Control: no-cache");
	header("Cache-Control: private");
	header("Pragma: no-cache");
	header("Content-type: image/jpeg");
	
	# From here out, we no longer expect to be able to use the header() function
	print "--$boundary\n";
	
	# Set this so PHP doesn't timeout during a long stream
	set_time_limit(0);
	
	# Disable Apache and PHP's compression of output to the client
	@apache_setenv('no-gzip', 1);
	@ini_set('zlib.output_compression', 0);
	
	# Set implicit flush, and flush all current buffers
	@ini_set('implicit_flush', 1);
	for ($i = 0; $i < ob_get_level(); $i++)
	    ob_end_flush();
	ob_implicit_flush(1);
	
	# The loop, producing one jpeg frame per iteration
//	while (true) {
	   
	
	    # Your function to get one jpeg image
		$rand = rand(1000,9999);
		$url = 'http://EXAMPLE.COM:81/GetData.cgi?'.$rand;
		
		$curl_handle=curl_init();
		curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl_handle,CURLOPT_URL,$url); 
		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);
		
		if (!empty($buffer))
		{
			# Per-image header, note the two new-lines
	  		print "Content-type: image/jpeg\n\n";
			print $buffer;
		}
		else {
			print "Content-type: text/html\n\n";
			print "No image.";
		}
	
	    # The separator
	    print "--$boundary\n";
//	}


	
}
else {
	print "Error: No camera requested.";
}


?>
