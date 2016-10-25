<?php include 'header.php';?>
<div class= "login-form col-md-4 col-md-offset-4">
<h1 id = "login-header"> Login </h1>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="field" class="form-control" placeholder="Username" size ="20">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="field" class="form-control" placeholder="Password" size ="20">
  </div>
  <div class=" form-group ">
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="button" class="btn btn-primary"      onclick="window.location.href='registration.php'">Sign Up</button>
  <button type="button" class="btn btn-primary">Forgot Password</button>

</div>


</form>
</div>

<?php include 'footer.php'; ?>
