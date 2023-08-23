<?php
if(isset($_SESSION['loggedin'])){

  $login = true; 
}
else{
  $login = false;
}
echo 

'<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="/learning/NoteApp.php">Home</a>
  </li>';
if(!$login){

echo 
  '<li class="nav-item">
    <a class="nav-link" href="/learning/signup.php">Signup</a>
  </li>
  <li class="nav-item">
  <a class="nav-link disabled" href="/learning/login.php">Login</a>
</li>
</ul>';

}
  if($login){
  echo  
  '<li class="nav-item">
    <a class="nav-link" href="/learning/logout.php">logout</a>
  </li>';

  }

?>