<?php  include "includes/database.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
// if (isset($_POST['register'])) {
    // code...

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = [

        'username' => '',
        'email' => '',
        'password' => ''
    ];

    if (empty($username)) {
        $error['username'] = '<h4 style="color:red;">Username cannot be empty!!!</h4>';
   }
   
   elseif (strlen($username) < 3) {
        $error['username'] = '<h4 style="color:red;">Username too short!!!</h4>';
   }

     elseif (username_exists($username)) {
        $error['username'] = '<h4 style="color:red;">Username already exist!!!</h4>';
   }

   // else{

   //      $error['username'] = '<h4 style="color:green;">Username Accepted!!!</h4>';
   // }

    if (empty($email)) {
        $error['email'] = '<h4 style="color:red;">email cannot be empty!!!</h4>';
   }

     elseif (email_exists($email)) {
        $error['email'] = 'email already exist!!!';
   }

   //  else{

   //      $error['email'] = '<h4 style="color:green;">Email Accepted!!!</h4>';
   // }

    if (empty($password)) {
        $error['password'] = '<h4 style="color:red;">password cannot be empty!!!</h4>';
   }

   foreach ($error as $key => $value) {
       // code...
    if (empty($value)) {
      
      unset($error[$key]);
    }
   }//foreach loop

   if (empty($error)) {
       // code...
        register_user($username, $email, $password);

       login_user($username, $password);
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
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="on">

                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>" >
                            <p><?php echo isset($error['username']) ? $error['username'] : ''; ?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>">
                            <p><?php echo isset($error['email']) ? $error['email'] : '' ;?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <p><?php echo isset($error['password']) ? $error['password'] : '' ;?></p>
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
