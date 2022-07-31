<?php


    class Student {

        protected $connection;

        public function __construct(){
            $host_name = 'localhost';
            $user_name = 'root';
            $password = '';
            $db_name = 'db_student_info';

            $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
           if(!$this->connection){
                die("Connection Failed".mysqli_error($this->connection));
           }
        }


        public function save_student_info($data){

           $sql = "INSERT INTO tbl_student (student_name, student_phone, student_email, student_address) " . 
           "VALUES ('$data[student_name]', '$data[student_phone]', '$data[student_email]', '$data[student_address]')";

           if(mysqli_query($this->connection, $sql)){
                $message = "Save Information Succesfully";
                return $message;
           }
           else{
            die("Query Problem".mysqli_error($this->connection));
           }

        }


        public function select_all_student_info(){

            $sql = "SELECT * FROM tbl_student ORDER BY student_id DESC";
            if(mysqli_query($this->connection, $sql)){
                $query_result = mysqli_query($this->connection, $sql);
                return $query_result;
            }
            else{
                die("Query Problem".mysqli_error($this->connection));
            }


        }


        public function view_all_student_by_id($student_id){

            $sql = "SELECT * FROM tbl_student WHERE student_id = '$student_id' ";
            if(mysqli_query($this->connection, $sql)){
                $query_result = mysqli_query($this->connection, $sql);
                return $query_result;
            }
            else{
                die("Query Problem".mysqli_error($this->connection));
            }

        }

        public function update_all_student_info($data){
            $sql = "UPDATE tbl_student SET student_name='$data[student_name]', student_phone = '$data[student_phone]', student_email = '$data[student_email]', student_address = '$data[student_address]' WHERE student_id = '$data[student_id]'  ";
            if(mysqli_query($this->connection, $sql)){
                session_start();
                $_SESSION['message'] = "Successfully Information Updated !";
                header('Location: view_student.php');
            }
            else{
                die("Query Problem".mysqli_error($this->connection));
            }
        }
        
        public function delete_student_info($id){
            $sql = "DELETE FROM tbl_student WHERE student_id = '$id' ";
            if(mysqli_query($this->connection, $sql)){
                $message = "Student Information Delete Succesfully";
                return $message;
            }
            else{
                die("Query Problem".mysqli_error($this->connection));
            }
        }





    }


?>