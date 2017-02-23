<?PHP            
// reference: https://processwire.com/talk/topic/13643-combine-css-files-with-php/
/* 
    EyeDentifys CSS File combiner. v1.0
    
    Array of essential files - update as needed.
    We do this to ensure the order of how the files are combined.
    You can have as many CSS module files here as you want.
    
    Remember that the combined file is compiled in the order they
    are placed in the array.
    
    Remember to check all the paths so they reflect your setup before use.
    And also, the combined file is overwritten without notice when you re-combine.
*/
$cssModules[] = 'module_global.css';
$cssModules[] = 'module_table.css';
$cssModules[] = 'module_forms.css';
$cssModules[] = 'module_layout.css';


/* init vars */
$str = '';
$moduleCount = 0;
$errorCount = 0;
$listFiles = '';

/* add a string with the latest update time and date to the top of the combined file */
$dateStr = date('Y-m-d H:i:s');
$str .= '/* Combined file last updated at ' . $dateStr . ' */' . PHP_EOL;

/* go through modules and concatenate them in a string var */
foreach($cssModules AS $key => $module){

    /* check if the file exist */
    if(file_exists('css/modules/' . $module)){

        /* read file data */
        $str .= file_get_contents('css/modules/' . $module);

        /* add module count - used for output in template */
        $moduleCount++;

        /* add the file to list */
        $listFiles[] = '[' . $module . ']';

    } else {

        /* if the file do not exist add it to the "do not exist" list */
        $listFiles[] = 'Error - file [' . $module . '] do not exist!';
        
        /* increment error count */
        $errorCount++;
    }
}

/* render the combined css */
echo('<h2>Combined CSS</h2><pre class="code-view-pre">' . $str . '</pre>');

/* list combined files */
echo('<h2>Combined files</h2>');
echo('<ul class="unstyled-list">');
    foreach($listFiles AS $key => $file) {
        echo('<li>' . $file . '</li>');
    }
echo('</ul>');
echo('<p>Number of file errors <strong>' . $errorCount . '</strong> st.</p>');

/* the file name defaults */
$combinedFileName = 'css/combined_styles.css';
$backupFileName = 'css/backups/backup_styles_' . date("Y-m-d_H-i-s") . '.css';

/* backup the old combined file before updating it */
copy($combinedFileName, $backupFileName);
echo('<p>Backup created to file: <strong>' . $backupFileName . '</strong></p>');

/* create update the combined css file */
file_put_contents($combinedFileName, $str);
echo('<p>Combined css file: <strong>' . $combinedFileName . '</strong> updated!</p>');

echo('<p><strong>' . $moduleCount . '</strong> files combined.</p>');
?>
