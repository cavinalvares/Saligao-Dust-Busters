<?php

namespace App\Controllers;

session_start();

class Admin extends BaseController
{

    public function index()
    {
        if(isset($_SESSION['username']) or isset($_COOKIE['session']))
        {
            if(isset($_COOKIE['session'])){
                $model = model(GarbageModel::class);
                $data['user'] = $model->checkcookie($_COOKIE['session']);
                if(!empty($data)){
                    $_SESSION['username'] = $data['user']['display_name'];
                    $_SESSION['mode'] = $data['user']['mode']; 
                    setcookie("session", $_COOKIE['session'], time()+(30*60), "/");
                }
            }
            if($_SESSION['mode'] == 1){
                $title_data['title'] = "Admin Options";
                return  view('dust_busters/nav', $title_data).
                        view('dust_busters/admin_option');
            }
        }
        else
            return view('dust_busters/initial');
            
    }

    public function news(){
        if(isset($_SESSION['username']) or isset($_COOKIE['session']))
        {
            if(isset($_COOKIE['session'])){
                $model = model(GarbageModel::class);
                $data['user'] = $model->checkcookie($_COOKIE['session']);
                if(!empty($data)){
                    $_SESSION['username'] = $data['user']['display_name'];
                    $_SESSION['mode'] = $data['user']['mode']; 
                    setcookie("session", $_COOKIE['session'], time()+(60*60), "/");
                }
            }
            if($_SESSION['mode'] == 1){
                $model = model(NewsModel::class);
                $data['all_news'] = $model->getNews();
                $title_data['title'] = "News";
                return  view('dust_busters/nav', $title_data).
                        view('dust_busters/admin_news', $data);
            }
        }
        else
            return view('dust_busters/initial');
    }

    public function add_news(){
        if(isset($_SESSION['username']) or isset($_COOKIE['session']))
        {
            if(isset($_COOKIE['session'])){
                $model = model(GarbageModel::class);
                $data['user'] = $model->checkcookie($_COOKIE['session']);
                if(!empty($data)){
                    $_SESSION['username'] = $data['user']['display_name'];
                    $_SESSION['mode'] = $data['user']['mode']; 
                    setcookie("session", $_COOKIE['session'], time()+(30*60), "/");
                }
            }
            if($_SESSION['mode'] == 1){
                $title_data['title'] = "Add News";
                return  view('dust_busters/nav', $title_data).
                        view('dust_busters/add_news');
            }
        }
        else
            return view('dust_busters/initial');
    }
    
    public function send(){
        $type = $_POST["ntitle"];
        $comp = $_POST["newsdetails"];
        $res = "0";
        $target_dir = "./images/News/";
        
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


      if ($uploadOk != 0 && $res == "0"){
        $model = model(NewsModel::class);
        
        $model->save([
            'img_name' => $target_file,
            'Title' => $type,
            'Description' => $comp,
        ]);   
      }

      
      echo $res;
    }

    public function news_delete(){
      $id = $_POST["delete_id"];

      $model = model(NewsModel::class);
      $data["news"] = $model->getNews($id);
      unlink($data["news"]["img_name"]);
      $model->deleteNews($id);

      echo "0";

    }

    public function news_edit(){

      $id = $_POST["id"];

      $model = model(NewsModel::class);
      $data['News'] = $model->getNews($id);
      $title_data['title'] = "Add News";
      return  view('dust_busters/nav', $title_data).
              view('dust_busters/edit_news', $data);
    }

    public function news_edit_send(){
      $id = $_POST["id"];
      $title = -1;
      $details = -1;
      $target_file = -1;
      $res = "0";

      if(isset($_POST['ntitle']))
        $title = $_POST['ntitle'];

      if(isset($_POST['newsdetails']))
        $details = $_POST['newsdetails'];

      if(isset($_FILES["img"]))
      {
        $target_dir = "./images/News/";
        
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
        $model = model(NewsModel::class);
        
        $model->editNews($id, $title, $details, $target_file);   
      }

      echo $res;
    }

    public function sug_comp(){
      $model = model(FormModel::class);
      $data['all_sug_comp'] = $model->getAll();
      $title_data['title'] = "All Suggestions/Complaints";
      return  view('dust_busters/nav', $title_data).
              view('dust_busters/admin_sug_comp', $data);
    }

    public function sug_comp_delete(){
      $id = $_POST["delete_id"];
      $model = model(FormModel::class);
      $data["form"] = $model->getAll($id);
      unlink($data["form"]["image_name"]);
      $model->deleteform($id);

      echo "0";
    }

    public function events(){
      $model = model(EventModel::class);
      $data['events'] = $model->getEvents(0);
      $title_data['title'] = "All Events";
      return  view('dust_busters/nav', $title_data).
              view('dust_busters/admin_events', $data);
    }

    public function event_delete(){
      $id = $_POST["delete_id"];
      $model = model(EventModel::class);
      $model->deleteevent($id);

      echo "0";
    }

    public function event_accept(){
      $id = $_POST["accept_id"];
      $model = model(EventModel::class);
      $model->acceptevent($id);

      echo "0";
    }
}