<?php  include "includes/database.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php


if (isset($_POST['submit'])) {
    // code...

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = [

        'username' => '',
        'email' => '',
        'password' => ''
    ];
   
   if (strlen($username) < 4) {
        $error['username'] = 'Username too short!!!';
   }
   
   if ($username = '') {
        $error['username'] = 'Username cannot be empty!!!';
   }

    if (username_exists($username)) {
        $error['username'] = 'Username already exist!!!';
   }

   if ($email = '') {
        $error['email'] = 'email cannot be empty!!!';
   }

    if (email_exists($email)) {
        $error['email'] = 'email already exist!!!';
   }

   if ($password = '') {
        $error['password'] = 'password cannot be empty!!!';
   }

   foreach ($error as $key => $value) {
       // code...
    if (empty($value)) {
        // code...
        register_user($username, $email, $password);

        login_user($username, $password)
    }
   }

}
?>






    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
