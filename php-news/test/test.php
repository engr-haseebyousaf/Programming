<?php
$zip = new ZipArchive;
if ($zip->open('test.zip') === TRUE) {
    $zip->extractTo('extracted_folder/');
    $zip->close();
    echo 'ZipArchive is enabled';
} else {
    echo 'ZipArchive is not enabled';
}
?>