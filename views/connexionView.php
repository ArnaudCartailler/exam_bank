	<?php

include('includes/header.php');


?>

    <header class="flex">
		<p class="margin-right">Bienvenue sur l'application Comptes Bancaires</p>
	</header>

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="" method="post">
              <div class="form-label-group">
                <label for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
              </div>

              <div class="form-label-group">
                <label class="pt-3" for="inputPassword">Password</label>
                <input type="password" id="inputPassword" name="pass" class="form-control mb-3" placeholder="Password" required>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="signin" type="submit">Sign in</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign Up</h5>
            <form class="form-signin" action="" method="post">
              <div class="form-label-group">
                <label for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
              </div>
               <div class="form-label-group">
                <label class="pt-3" for="inputName">Your name</label>
                <input type="text" id="inputEmail" class="form-control" name="name" placeholder="Name" required autofocus>
              </div>

              <div class="form-label-group">
                <label class="pt-3" for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control mb-3" name="pass" placeholder="Password" required>
              </div>
              <div class="form-label-group mb-3">
                <label for="inputEmail">Verify Password</label>
                <input type="password" id="inputEmail" class="form-control" name="pass2" placeholder="Verify Email address" required autofocus>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="signup" type="submit">Sign up</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



    <?php

include('includes/footer.php');

 ?>
