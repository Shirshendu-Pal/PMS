<?php require "head.php" ?>
    <?php require  "headline.php" ?>
    <?php require  "../headercomponent/adminNavbar.php" ?>

    <form action="auth-quiz.php" method="post">
        <input type="text" name="desc" placeholder="enter quiz name" >
    <input type="text" name="quiz" placeholder="enter quiz link" width="100px">
    <button class="btn btn-primary" class="submit" name="sub">submit</button>
    </form>

    <?php

$userid = $_SESSION["sessionID"];

$sql = "SELECT `qid`, `author`, `link`,`description` FROM `quiz`";

$result = mysqli_query($conn, $sql);



?>


<table class="table">
<thead>
<tr>
  <th scope="col">SN.</th>
  <th scope="col">Author</th>
  <th scope="col">Name of the Quiz</th>
  <th scope="col">Quiz link</th>
  <th scope="col">Delete</th>

 
  
  

</tr>
</thead>
<tbody>
  <?php

 $counter = 1;
if ($result->num_rows > 0) {

while ($row=$result->fetch_assoc()) {
  



echo    '<tr>
        <td>'.$counter.'</td>
        <td>'.$row["author"].'</td>
        <td>'.$row["description"].'</td>
        <td> <a href='.$row["link"].' target="blank">'.$row["link"].'</a> </td>
        
        <td><a href="deletequiz.php?qid='.$row["qid"].'" class="btn btn-danger">Delete</a></td>
        
        
        
        </tr>';

        $counter++; 

}
}
  ?>


</tbody>
</table>



    <?php require "bottom.php" ?>