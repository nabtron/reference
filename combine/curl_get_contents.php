<?php

// how about we make it check if this don't work then go for file_get_contents

function curl_get_contents($url) {
       // Initiate the curl session
 $ch = curl_init();
      // Set the URL
 curl_setopt($ch, CURLOPT_URL, $url);
     // Removes the headers from the output
 curl_setopt($ch, CURLOPT_HEADER, 0);
     // Return the output instead of displaying it directly
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // Execute the curl session
 $output = curl_exec($ch);
    // Close the curl session
 curl_close($ch);
    // Return the output as a variable
 return $output;
}

$output = curl_get_contents('http://www.knowledgecornor.com/');
echo $output;
?>
