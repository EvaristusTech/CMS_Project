<?php


function escape($string) {

    global $connection;

  return mysqli_real_escape_string($connection, trim($string));


}




function users_online(){

    if (isset($_GET['usersonline'])) {
        // code...
    global $connection;    

    if (!$connection) {
        // code...
        session_start();

        include("../includes/database.php");

        $session = session_id();
        $time = time();
        $time_out_in_seconds = 05;
        $time_out = $time - $time_out_in_seconds;

        $query = "SELECT * FROM users_online WHERE session = '$session' ";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);

        if ($count == NULL) {
            // code...
            $query = "INSERT INTO users_online(session, time) ";
            $query .= "VALUES('$session', '$time')";
            mysqli_query($connection, $query);
        } else {
            $query = "UPDATE users_online SET time = '$time' ";
            $query .= "WHERE session = '$session'";
            mysqli_query($connection, $query);

        }

        $query = "SELECT * FROM users_online WHERE time > '$time_out'";
        $users_online_query = mysqli_query($connection, $query);
        echo $count_user = mysqli_num_rows($users_online_query);

       }//get request!!!

    }
  }  
  
  users_online();



function insert_categories(){

    global $connection;

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



function finfAllCategories(){

    global $connection;

     $query = "SELECT * FROM categories";
   $select_categories = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_categories)) {
    // code...
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];


    echo "<tr>";
  echo "<td>{$cat_id}</td>";
   echo "<td>{$cat_title}</td>";
   echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
   echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
   echo "</tr>";
}

}


function deleteQuery(){

    global $connection;

if (isset($_GET['delete'])) {
    // code...
    $delete_cat_id = $_GET['delete'];

    $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id} ";

    $delete_query = mysqli_query($connection, $query);

    header("location: categories.php");

}


}




function recordCount($table){

    global $connection;

    $query = "SELECT * FROM " . $table;
    $select_all_post = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_all_post);
    if (!$result) {
        // code...
        die("Query Failed" . mysqli_error($connection));
    }

    return $result;
}





function checkStatus($table, $column, $status){

        global $connection;

    $query = "SELECT * FROM $table WHERE $column = '$status' ";
    $select_all_draft_posts = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_all_draft_posts);
      if (!$result) {
        // code...
        die("Query Failed" . mysqli_error($connection));
    }

       return $result;

}


function checkUserRole($table, $column, $role){

       global $connection;

$query = "SELECT * FROM $table WHERE $column = '$role'";
$select_all_subcribers = mysqli_query($connection, $query);
$result = mysqli_num_rows($select_all_subcribers);
  if (!$result) {
        // code...
        die("Query Failed" . mysqli_error($connection));
    }
          return $result;
}



function is_admin($username) {

       global $connection;
 
$query = "SELECT user_role FROM users WHERE username = '$username'";
$result = mysqli_query($connection, $query);
if (!$result) {
    // code...
    die("Query Failed" . mysqli_error($connection));
}

$row = mysqli_fetch_array($result);
$user_role = $row['user_role'];


if ($user_role == 'Admin') {
    // code...
    return true;
} else {
    return false;

}

}


function username_exists($username) {

           global $connection;
 
$query = "SELECT username FROM users WHERE username = '$username' ";
$result = mysqli_query($connection, $query);
if (!$result) {
    // code...
    die("Query Failed" . mysqli_error($connection));
}

if (mysqli_num_rows($result) > 0) {
    // code...
    return true;
} else {
    return false;
}

}



function email_exists($email) {

           global $connection;
 
$query = "SELECT user_email FROM users WHERE user_email = '$email' ";
$result = mysqli_query($connection, $query);
if (!$result) {
    // code...
    die("Query Failed" . mysqli_error($connection));
}

if (mysqli_num_rows($result) > 0) {
    // code...
    return true;
} else {
    return false;
}

}


function redirect($location) {

     global $connection;

    return header("Location" . $location);
}



function register_user($username, $email, $password) {

     global $connection;

    $username = mysqli_real_escape_string($connection, $username);   
    $email = mysqli_real_escape_string($connection, $email);   
    $password = mysqli_real_escape_string($connection, $password);


    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12) ); 

       //  $query = "SELECT randsalt FROM users";  
       //  $select_randsalt_query = mysqli_query($connection, $query);

       //  if (!$select_randsalt_query) {
       //      // code...
       //      die("Query Failed" . mysqli_error($connection));
       //  }

       // while ( $row = mysqli_fetch_assoc($select_randsalt_query)) {
       //      // code...
       //   $salt = $row['randsalt'];
       //  }
            
       //  $password = crypt($password, $salt);


        $query = "INSERT INTO users (username, user_email, user_password, user_role)";
        $query .= "VALUES('$username', '$email', '$password', 'subcriber' )";
        $register_user_query = mysqli_query($connection, $query);
        if (!$register_user_query) {
            // code...
            die("Query Failed" . mysqli_error($connection) . ' ' . mysqli_error($connection));
        }


    }
   



function login_user($username, $password) {

    global $connection;

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        // code...
        die("Query Failed" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_user_query)) {
        // code...
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
        $db_user_password = $row['user_password'];
    }

        // $password = crypt($password, $db_user_password);
    

if (password_verify($password, $db_user_password)){
        // code...

        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;

        header("Location: ../admin");
    }else {
        header("Location: ../index.php");
    }

}