
<?php
// connecting to the database
$servername = "localhost";
$username = "root";
$password ="";
$database = "NoteApp";

// create a connection
$conn =  mysqli_connect($servername,$username,$password,$database);
$insert = false;
$update = false;
$delete = false;

// for delete operation

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `note` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
 
  // if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //   if(isset($_POST['snoEdit'])){
  //     // update the record
  //     $sno = $_POST['snoEdit'];
  //     $Title = $_POST['edittitle'];
  //     $Desc = $_POST['editdis'];

  //     // sql update

  //     $sql = "UPDATE `note` SET `Title` = '$Title', `Dis` = '$Desc' WHERE `note`.`sno` = $sno";
  //     $result = mysqli_query($conn,$sql);
  //     if($result){
  //       $update = true;
  //       echo "Updated successfully";
  //     }
  //     else{
  //       echo "We could not updated the data";
  //     }
  //   }
  // }
  //   else{
 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $Title = $_POST['title'];
      $Desc = $_POST['description'];
    
      $sql = "INSERT INTO `note` ( `Title`, `Dis`) VALUES ( '$Title', '$Desc')";
      $result = mysqli_query($conn,$sql);
  
     if($result){
      $insert = true;
    }
    else{
      echo "we could not insert the data";
    }
  }
//}
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
  <body>

  
<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/learning/NoteApp.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Note Title</label>
              <input type="text" class="form-control" id="edittitle" name="edittitle" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" id="editdis" name="editdis" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Simple Notes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <li><hr class="dropdown-divider"></li>
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
<?php
   if($insert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Inserted successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
?>
<?php
if(!$conn){
    die("Sorry can't connect to the database".mysqli_connect_error());
}
//else{
//     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
//         <strong></strong>Your connection is successfully established.
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//       </div>';
// }
?>

    <div class="container mt-5 p-5">
        <h2>Write your Note</h2>

        <form action="/learning/NoteApp.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="title" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" id="descriptionEdit" name="description" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
    </div>

    <div class="container p-5">
     
        <table class="table" id ="myTable">
  <thead>
    <tr>
      <th scope="col">SL. NO.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Timestamp</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
            $sql =  "SELECT* FROM `note`";
            $result = mysqli_query($conn,$sql);
            $sno = 0;
            while($row = mysqli_fetch_assoc($result)){
              
              $sno += 1;
                echo "   <tr>
                <th scope='row'>". $sno ."</th>
                <td>". $row ['Title'] ."</td>
                <td>".$row ['Dis'] ."</td>
                <td>".$row ['Timestamp'] ."</td>
                <td>  <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
            
              </tr>";
                // echo $row['SL.No.'] ." " . $row['Title']. $row['Dis'].$row['Timestamp'];

               //
                
               }
               
            
        ?>
  </tbody>
</table>
    </div>

  <!-- scripts -->
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- Datatables -->
  <script src ="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" ></script>
 <!-- Initializint Data tables -->
 <script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );
 </script>
<script>
  edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        edittitle.value = title;
        editdis.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editmodal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/learning/NoteApp.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
</script>
  </body>
</html>