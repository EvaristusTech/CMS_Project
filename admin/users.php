<?php

    include "includes/admin_header.php";

?>

    <div id="wrapper">

        <!-- Navigation -->




<?php

    include "includes/admin_nav.php";

?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      

                      <h1 class="page-header">
                          Welcome To Admin
                          <small>Author</small>
                      </h1>

<?php
    


    if (isset($_GET['source'])) {
        // code...
        $source = $_GET['source'];
    } else{
        $source = '';
    }

    switch ($source) {
        case 'add_users':
            // code...
            include "includes/add_users.php";
            break;

        case 'edit_users':
            // code...
            include "includes/edit_users.php";
            break;

        default:
            // code...
            include "includes/view_all_users.php";
            break;
    }



?>


                    

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php

    include "includes/admin_footer.php";

?>