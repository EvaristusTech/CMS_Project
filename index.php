<?php

    include "includes/database.php";

?>
<?php

    include "includes/header.php";

?>

    <!-- Navigation -->
<?php

    include "includes/nav.php";

?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
<?php

    include "includes/content.php";

?>


            <!-- Blog Sidebar Widgets Column -->
           
<?php

    include "includes/sidebar.php";

?>


        </div>
        <!-- /.row -->

        <hr>

        <ul class="pager">
    <?php
    
        for ($i=1; $i <= $count ; $i++) { 
            // code...
            echo"<li><a href=''>$i</a></li>";
        }

    ?>        
        </ul>


<?php

    include "includes/footer.php";

?>