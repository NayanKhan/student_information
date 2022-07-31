<?php

    session_start();
    $message='';
    require_once './function.php';
    $student = new Student();

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $message = $student ->delete_student_info($id);
    }
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }

    $query_result = $student -> select_all_student_info();

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
                                <a class="nav-link" href="save_student_info.php">Add Student</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success active" href="view_student.php">View Student</a>
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
            <div class="col-lg-10 bg-light offset-1 mt-5">
                <h3 class="text-center p-4 text-success mb-4"><?php echo $message;?></h3>
                <div class="well">
                     <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Sl. Number</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Student Phone</th>
                            <th scope="col">Student Email</th>
                            <th scope="col">Student Address</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; while ($student_info = mysqli_fetch_assoc($query_result)){?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $student_info ['student_name']?></td>
                                <td><?php echo $student_info ['student_phone']?></td>
                                <td><?php echo $student_info ['student_email']?></td>
                                <td><?php echo $student_info ['student_address']?></td>
                                <td>
                                    <a class="btn btn-success" href="edit_student_info.php?id=<?php echo $student_info ['student_id']?>">
                                        edit
                                    </a>
                                    <a class="btn btn-danger" href="?delete=<?php echo $student_info ['student_id']?>" onclick="return confirm('Are You Sure Delete')"> Del</a>
                                </td>
                            </tr>
                            <?php $i++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    


<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>