<?php require "html/top.php" ?>
<?php include  "headercomponent/header.php" ?>

<div class="col-6 text-center " style="margin-left: 30%; margin-top: 20px;">
<form method="post" action="authentication/auth-register.php">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="useremail" >
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" name="password" >
  </div>
  <div class="mb-3">
    <label  class="form-label">Enter key if you are Admin</label>
    <input type="password" class="form-control" name="adminkey">
  </div>
  
  <button type="submit" class="btn btn-primary" name="register">Sign Up</button>
</form>
</div>
<a class="btn btn-success" style="width:30%; margin-left: 40%; margin-top: 20px;" href="login.php">Already have an Account!! click here for login</a>

<?php require "footercomponent/footer.php" ?>
<?php require "html/bottom.php" ?>