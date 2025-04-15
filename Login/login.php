<!-- PHP Starts Here -->
<?php 
session_start();
    require_once "../connection/connection.php"; 
    $message="دخل كلمة السرا";
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["email"];
        $password=$_POST["password"];
        $query="select * from login where user_id='$username' and Password='$password' ";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                if ($row["Role"]=="Admin")
                {
                    $_SESSION['LoginAdmin']=$row["user_id"];
                    header('Location: ../admin/admin-index.php');
                }
                else if ($row["Role"]=="Teacher" )
                {
                    $_SESSION['LoginTeacher']=$row["user_id"];
                    header('Location: ../Teacher/teacher-index.php');
                }
                else if ($row["Role"]=="Student" )
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: ../Student/student-index.php');
                }
            }
        }
        else
        { 
            header("Location: login.php");
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <title>تسجيل دخول</title>
</head>

<body class="login-background">
    <?php include('../common/common-header.php') ?>
    <div class="login-div mt-3 rounded">
        <div class="logo-div text-center">
            <img src="../Images/logo.jpg" alt="" class="align-items-center" width="100" height="100">
        </div>
        <div class="login-padding">
            <h2 class="text-center text-white">تسجيل</h2>
            <form class="p-1" action="login.php" method="POST">
                <div class="form-group">
                    <label>
                        <h6>قم بادخال البريد الالكتروني:</h6>
                    </label>
                    <input type="text" name="email" placeholder="Enter User ID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>
                        <h6>ادخل كلمة السر:</h6>
                    </label>
                    <input type="Password" name="password" placeholder="Enter Password"
                        class="form-control border-bottom" required>
                    <!-- <?php echo $message; ?> -->
                </div>
                <div class="form-group text-center mb-3 mt-4">
                    <input type="submit" name="btnlogin" value="تسجيل" class="btn btn-white pl-5 pr-5 ">
                </div>
            </form>
        </div>
    </div>
</body>

</html>