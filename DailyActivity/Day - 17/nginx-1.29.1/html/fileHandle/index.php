<?php
// echo readfile("sample.txt");
$myfile = fopen("sample.txt", "r") or die("unable to open");
while(!feof($myfile)){
    echo fgetc($myfile);
}
fclose($myfile);    
?>