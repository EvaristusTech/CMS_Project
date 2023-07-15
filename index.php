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

        if ($i == $page) {
            // code...
            echo"<li><a class='active_link' href='index.php?page={$i}'>$i</a></li>";
        } else {
            echo"<li><a href='index.php?page={$i}'>$i</a></li>";
        }
        }

    ?>        
        </ul>


<?php

    include "includes/footer.php";

?>