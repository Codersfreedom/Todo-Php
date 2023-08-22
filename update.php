<?php
include 'server.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM `note` WHERE sno = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$title = $row['Title'];
$desc = $row['Dis'];




  if(isset($_POST['update'])){
    // update the record
   
    $title = $_POST['editTitle'];
    $Desc = $_POST['descriptionEdit'];

    // sql update

    $sql = "UPDATE `note` SET `sno` = $id,`Title` = '$title', `Dis` = '$Desc' WHERE `note`.`sno` = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        $update = true;
 
      header('location:NoteApp.php');
    }
    else{
      echo "We could not updated the data";
    }
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>NoteApp</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


</head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Simple Notes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <body>
    
      
      
      <div class="container mt-5 p-5">
          <h2>Write your Note</h2>
          
          <form  method="POST">
              <div class="modal-body">
                  <input type="hidden" name="snoEdit" id="snoEdit">
                  <div class="form-group">
                      <label for="editTitle">Note Title</label>
                      <input type="text" class="form-control" id="editTitle" name="editTitle" value ="<?php echo $title; ?>" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="form-group">
                        <label for="descriptionEdit">Note Description</label>
                        <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit" value ="<?php echo $desc; ?>" aria-describedby="emailHelp">
                       
                    </div>
                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name = "update">Update</button>
                </div>
            </form>
        </div>
    </body>