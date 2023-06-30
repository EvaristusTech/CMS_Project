<?php

function insert_categories(){


if (isset($_POST['submit'])) {
   // code...
$cat_title = $_POST['cat_title'];
 if ($cat_title == "" || empty($cat_title)) {
         // code...
     echo "<h5 style='color:red'>Empty field!!!</h5>";
 } else{
 $query = "INSERT INTO categories(cat_title) ";
   $query .= "VALUE('{$cat_title}')";

  $create_category_query = mysqli_query($connection, $query); 
          if (!$create_category_query) {
               // code...
            die('query failed' . mysqli_error($connection));
                     }
  }
                                    
 }



}