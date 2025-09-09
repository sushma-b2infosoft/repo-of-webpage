<?php
//echo readfile("readmi.text");
//$file="readmi.text";
// if(file_exists($file)){
//     echo readfile ("readmi.text");
//     //copy($file,"newfile.text");
//     //rename("newfile.text","oldfile.text") ;
//     //unlink("oldfile.text");
//     //delete("oldfile.text");
// }else{
//     echo "file does not exist";
// }

//mkdir("textfiles");
// if(file_exists(("textfiles"))) {
//     //mkdir("textfiles");
//     rmdir("textfiles");

// }else{
//     echo"Folder already exist";
// }
//echo filesize($file);


//  what is file handling in php? 
// why we use ?use cases of this
//reading a file with
//writing to a file with
//chacking if file exists
// deleting file 
// appending data to a file? 
// file upload basis using html form(enctype="multipart/formdata");
// 
//&&&&&&&&&&&&&&& 
//  handling uploaded files with $_files 
// chacking files type size and extension,
// moving uploaded files,
// upload directory premission?
//////////////////////
/////Mini file upload projects
//create a file upload form
//upload image or document files
//validate file size and type
//store uploaded file in a folder
//display uploaded file in a folder 
// show error success message 
//Optional:save file info(name,path,type)into a text file
//  or array


//&&&&& how we can read a file****************

$file= fopen("readmi.text","a+");
//echo fread($file,filesize("10"));
//echo fgetc($file);
//echo fgetc($file);
// echo"<br>".fgets($file);
// echo ftell($file);
// fseek($file,20);
// echo ftell($file);
// echo "<br>".fpassthru($file);

// rewind($file);

// echo"<br>".fgets($file);
// echo"<ul>";
// while(! feof($file)){
// $line=fgets($file);
// echo "<li>".$line."</li>";

// }
// echo"</ul>";
//echo fgetc($file);
//print_r(file("readmi.text"));
//********** how we can write a file

//fwrite($file,"\n here is a new line ");


?> 
