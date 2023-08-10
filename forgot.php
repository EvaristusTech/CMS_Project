<?php  include "includes/database.php"; ?>
<?php  include "includes/header.php"; ?>

<?php

	// $forgot = isset($_GET['forgot']);

	if (ifItIsMethod('get') && isset($_GET['forgot'])) {
		// code...

	} else {

		header("Location: /cms/index");

	}


if (ifItIsMethod('post')) {
		// code...

} else {

		if (isset($_POST['email'])) {
		// code...
		$email = $_POST['email'];

		$length = 50; 

		$token = bin2hex(openssl_random_pseudo_bytes($length));

		if (email_exists($email)) {
			// code...

			$query = "UPDATE users SET token='{$token}' WHERE user_email = ? ";
			if ($token_query = mysqli_prepare($connection, $query)) {
				// code...

			mysqli_stmt_bind_param($token_query, "s", $email);

			mysqli_stmt_excute($token_query);

			mysqli_stmt_close($token_query); 

			} else{
				echo "Query Failed" . mysqli_error($connection);
			}

		}


	}
}


 


?>


<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">




                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->

