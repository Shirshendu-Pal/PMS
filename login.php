<?php require "html/top.php" ?>
<?php include  "headercomponent/header.php" ?>

<div class="col-6 text-center " style="margin-left: 30%; margin-top: 20px;">

<form method="post" action="authentication/auth-login.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary" >Login</button>
</form>

</div>
<a class="btn btn-success" style="width:30%; margin-left: 40%; margin-top: 20px;" href="register.php">click here for signup</a>

<?php require "footercomponent/footer.php" ?>
<?php require "html/bottom.php" ?>