<?php

namespace App\Controllers;

session_start();

class SugComp extends BaseController
{

    public function index(){
        if(isset($_SESSION['username']))
        {

            //$model = model(NewsModel::class);
            //$data['all_news'] = $model->getNews();
            $title_data['title'] = "Sugestions/Complaints";
            return  view('dust_busters/nav', $title_data).
                    view('dust_busters/sug_comp');
        }
        else
            return view('dust_busters/initial');
    }

    public function send(){
      
        $name = $_SESSION["username"];
        $type = $_POST["itype"];
        $comp = $_POST["txtcomplain"];
        $res = "0";
        $target_file = "";

        if(isset($_FILES["img"])){
        $target_dir = "./images/form/";
        
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $res = "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
$i = 0;
while(file_exists($target_dir.$i.".".$imageFileType)) {
  $i = $i + 1;
}

$target_file = $target_dir.$i.".".$imageFileType;



// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $res == "0") {
  $res = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0 && $res == "0") {
  $res = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
     } else {
      $res = "Sorry, there was an error uploading your file.";
  }
}

        }
      if ($res == "0"){
        $model = model(FormModel::class);
        
        $model->save([
            'Username' => $name,
            'type' => $type,
            'details' => $comp,
            'image_name' => $target_file,
        ]);   
      }

      
      echo $res;
    }
}