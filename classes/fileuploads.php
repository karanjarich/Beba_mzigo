<?php
$target_dir="classes/"
$target_file=$target_dir.
basename($_FILES(["fileToUpload"]["name"]);
$uploadOk=1;
$imageFileType=pathinfo($target_file,Pathinfo_extension);
//check if video file is a actual video or fake video
    if(isset($_POST["submit"]))
	{
		$check=getimagesize($_files["fileToUpload"]["tmp_name"]);
		   if($check!==false)
		   {
			   echo"File is a image-".$check["mime"].".";
			   $uploadOK=1;
		   }
		   else
		   {
			   echo"file is not an image";
			   $uploadOK=0;
		   }
	}
	//check if file already exists
	 if(files_exists($target_file))
	 {
		 echo"Sorry, file already exists";
		 $uploadOk=0;
	 }
	 // check file size
	 if($_FILES[""][""]>500000)
	 {
		 echo"Sorry, file to large";
		 $uploadOk=0;
	 }
	 // allow certain formats 
	 if($)
?>