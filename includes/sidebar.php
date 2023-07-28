 <div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>


                 <!-- Login -->
                <div class="well">

                    <?php if(isset($_SESSION['user_role'])): ?>

                        <h4>Logged in as <?php echo $_SESSION['username'] ?></h4>

                        <a href="includes/logout.php" class="btn btn-primary">Log out</a>

                    <?php else: ?>

                    <h4>Login Form</h4>
                    <form action="includes/login.php" method="POST">
                    <div class="form-group">
                        <!-- <label for="username">Username</label>  -->
                        <input name="username" placeholder="Enter Username" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <!-- <label for="username">Password</label>     -->
                        <input name="password" placeholder="Enter Password" type="text" class="form-control">
                    </div>

                     <div class="form-group">
                        <input name="login_btn" type="submit" class="btn btn-primary">
                    </div>
                    </form>


                    <?php endif; ?>


               
                    <!-- /.input-group -->
                </div>

<!--                         <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span> -->


                <!-- Blog Categories Well -->
                <div class="well">

                     <?php

                        $query = "SELECT * FROM categories";
                        $side_categories_query = mysqli_query($connection, $query);
                       


                    ?>




                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                                <?php

                                     while ($row = mysqli_fetch_assoc($side_categories_query)) {
                                        // code...
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];

                                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                                    }

                                ?>

                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->




                       <!--  <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div> -->




                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>







                <!-- Side Widget Well -->
               <?php   

                    include "widget.php";

               ?>

            </div>

