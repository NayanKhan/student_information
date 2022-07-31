<?php

    $message ='';
    if(isset($_POST['btn'])){

        require_once './function.php';
        $student = new Student();
        $message = $student -> save_student_info($_POST);

    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Student Information</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <div class="home-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link active text-success" href="#">Add Student</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="view_student.php">View Student</a>
                            </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1 mt-5 bg-light p-5">
                <h3 class="text-center text-success mb-4"><?php echo $message;?></h3>
                <div class="well">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Student Name:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Enter Student Name" name="student_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Student Phone:</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Enter Phone Number" name="student_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Student Email:</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Enter Email" name="student_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Student Address:</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Student Address" name="student_address" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                            <button type="submit" name="btn" class="btn btn-primary btn-block">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    


<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>