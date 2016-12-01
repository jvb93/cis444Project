<?php include 'header.php';?>
<div class= "login-form col-md-4 col-md-offset-4">
<h1 id = "login-header"> Login </h1>
<form id = "myForm" action="verifyLogin.php" method="post" >
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="field" class="form-control" placeholder="Username" size ="20" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Password" size ="20" name="password">
  </div>
  <div class="form-group ">
  <button type="submit" class="btn btn-primary">Login</button>
  <a href="signUp.php" class="btn btn-primary">Sign Up</a>


</div>


</form>
</div>

<?php include 'footer.php'; ?>
