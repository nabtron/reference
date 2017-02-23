<?php

//reference: https://www.sanwebe.com/2013/09/combine-js-or-css-files-with-php

function combine_my_files($array_files, $destination_dir, $dest_file_name){

    if(!is_file($destination_dir . $dest_file_name)){ //continue only if file doesn't exist
        $content = "";
        foreach ($array_files as $file){ //loop through array list
            $content .= file_get_contents($file); //read each file
        }

        //You can use some sort of minifier here 
        //minify_my_js($content);

        $new_file = fopen($destination_dir . $dest_file_name, "w" ); //open file for writing
        fwrite($new_file , $content); //write to destination
        fclose($new_file); 
        return '<script src="'. $destination_dir . $dest_file_name.'"></script>'; //output combined file
    }else{ 
        //use stored file
        return '<script src="'. $destination_dir . $dest_file_name.'"></script>'; //output combine file
    }
}

$files = array(
            'http://example/files/sample_js_file_1.js',
            'http://example/files/sample_js_file_2.js',
            'http://example/files/beautyquote_functions.js',
            'http://example/files/crop.js',
            'http://example/files/jquery.autosize.min.js',
            );
            
echo combine_my_files($files, 'minified_files/', md5("my_mini_file").".js");
