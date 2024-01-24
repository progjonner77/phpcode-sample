<!DOCTYPE html>
<html lang="en">

<?php include("includes/headlog.php");

if (isset($_SESSION['Account_id'])) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $query = "
		SELECT * FROM admin
  		WHERE email = '" . $_POST["email"] . "'
	";
        $statement = $conn->query($query);
        // var_dump($conn);
        $count = $statement->num_rows;
        if ($count > 0) {

            while ($row = $statement->fetch_assoc()) {

                if ($_POST["password"] == $row["pass"]){
                    $_SESSION['Account_id'] = $row['user_id'];
                    $_SESSION['name'] = $row['name'];
                    header('location:index.php');
                } else {
                    $message = '<label>Wrong Password</label>';
                }
            }

        } else {
            $message = '<label>Wrong Username</labe>';
        }
    }
}

?>

<body class="header-fix fix-sidebar">
    
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Login</h4>
                                <form method="POST" action="">
                                <h6 style="text-align:center;color:red;box-shadow: -4px 6px 5px 0px black;border-radius: 62%;"> <?php echo @$message; ?> </h6>

                                            <hr/>

                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="checkbox">
                                       
                                        

                                    </div>
                                    <button name="submit" type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 c ">Sign in</button>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <?php include("includes/script.php") ?>
</body>

</html>