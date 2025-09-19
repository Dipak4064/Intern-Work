<?php
$myfile = fopen("sample.txt", "w") or die("unable to create the file.");
$txt = "hello i am dipak tamang \n";
fwrite($myfile, $txt);
$txt = "hello i am dipa";
fwrite($myfile, $txt);
?>