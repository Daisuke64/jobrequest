<?php
    require 'connection.php';

    class RequestAccessObject extends Datebase{

        public function login($useremail, $password){
            $sql = "SELECT * FROM requestors 
                    WHERE requestor_email = '$useremail' AND requestor_password = '$password'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function adminLogin($useremail, $password){
            $sql = "SELECT * FROM admins 
                    WHERE admin_email = '$useremail' AND admin_password = '$password'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function addrequestor($requestor_fname, $requestor_lname, $requestor_address, $requestor_phone, $requestor_email, $requestor_password){
            $requestor_register_date = date('Y-m-d');
            $sql = "INSERT INTO requestors(requestor_fname, requestor_lname, requestor_address, requestor_phone, requestor_email, requestor_password, requestor_register_date) VALUES ('$requestor_fname', '$requestor_lname', '$requestor_address', '$requestor_phone', '$requestor_email', '$requestor_password', '$requestor_register_date')";
            $result = $this->conn->query($sql);
        }

        public function retrieveAllJobs($id){
            $sql = "SELECT * FROM jobs WHERE requestor_id = '$id' ORDER BY job_register_date DESC";
            $result = $this->conn->query($sql);// means execute and assign it to the result variable
            $rows = array(); //this will hold all array results from the results variable

            while($row=$result->fetch_assoc()){
                //condition: as long as there is a set of arrays being passed to the rows array
                //the loop will not stop
                $rows[] = $row;
                //  print_r($row);
                //  echo "<br>";
                //so every row is assigned to the rows array
            }
            return $rows;
        }

        
        public function addJob($job_name, $job_type, $job_date_needed, $job_address, $job_detail, $requestor_id){
            $job_register_date = date('Y-m-d');
            $job_status = "P";
            $sql = "INSERT INTO jobs(job_name, job_type, job_date_needed, job_address, job_detail, requestor_id, job_register_date , job_status) VALUES ('$job_name', '$job_type', '$job_date_needed', '$job_address', '$job_detail', '$requestor_id', '$job_register_date', '$job_status')";
            $result = $this->conn->query($sql);
        }

        public function retrieveSingleJob($id){
            $sql = "SELECT * FROM jobs WHERE job_id = '$id'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc(); //this will get a single result
            return $row;
        }

        public function updateJob($job_name, $job_type, $job_date_needed, $job_address, $job_detail, $job_id){
            $job_register_date = date('Y-m-d');
            $sql = "UPDATE jobs SET job_name = '$job_name', job_type = '$job_type',
                job_date_needed = '$job_date_needed', job_address = '$job_address', job_detail = '$job_detail', job_register_date = '$job_register_date'
                WHERE job_id = '$job_id'";
            $result = $this->conn->query($sql);
        }

        public function deleteCompletelyJob($job_id){
            $sql = "DELETE FROM jobs WHERE job_id = '$job_id'";
            $result = $this->conn->query($sql);
        }

        public function retrieveAllRequestors(){
            $sql = "SELECT * FROM requestors WHERE requestor_status ='A' ORDER BY requestor_register_date ASC";
            $result = $this->conn->query($sql);// means execute and assign it to the result variable
            $rows = array(); //this will hold all array results from the results variable

            while($row=$result->fetch_assoc()){
                //condition: as long as there is a set of arrays being passed to the rows array
                //the loop will not stop
                $rows[] = $row;
                //  print_r($row);
                //  echo "<br>";
                //so every row is assigned to the rows array
            }
            return $rows;
        }


        public function deleteRequestor($requestor_id){
            $sql = "UPDATE requestors SET requestor_status = 'D' WHERE requestor_id = '$requestor_id'";
            $result = $this->conn->query($sql);
        }

        public function changeA($job_id){
            $sql = "UPDATE jobs SET job_status = 'A' WHERE job_id = '$job_id'";
            $result = $this->conn->query($sql);
        }

        public function changeD($job_id){
            $sql = "UPDATE jobs SET job_status = 'D' WHERE job_id = '$job_id'";
            $result = $this->conn->query($sql);
        }

        public function retrieveAllJobsRequestorsP(){
            $sql = "SELECT * FROM jobs JOIN requestors ON jobs.requestor_id = requestors.requestor_id WHERE job_status ='P' ORDER BY job_register_date DESC";
            $result = $this->conn->query($sql);// means execute and assign it to the result variable
            $rows = array(); //this will hold all array results from the results variable

            while($row=$result->fetch_assoc()){
                //condition: as long as there is a set of arrays being passed to the rows array
                //the loop will not stop
                $rows[] = $row;
                //  print_r($row);
                //  echo "<br>";
                //so every row is assigned to the rows array
            }
            return $rows;
        }

        public function retrieveAllJobsRequestorsA(){
            $sql = "SELECT * FROM jobs JOIN requestors ON jobs.requestor_id = requestors.requestor_id WHERE job_status ='A' ORDER BY job_register_date DESC";
            $result = $this->conn->query($sql);// means execute and assign it to the result variable
            $rows = array(); //this will hold all array results from the results variable

            while($row=$result->fetch_assoc()){
                //condition: as long as there is a set of arrays being passed to the rows array
                //the loop will not stop
                $rows[] = $row;
                //  print_r($row);
                //  echo "<br>";
                //so every row is assigned to the rows array
            }
            return $rows;
        }

        public function retrieveAllJobsRequestorsD(){
            $sql = "SELECT * FROM jobs JOIN requestors ON jobs.requestor_id = requestors.requestor_id WHERE job_status ='D' ORDER BY job_register_date DESC";
            $result = $this->conn->query($sql);// means execute and assign it to the result variable
            $rows = array(); //this will hold all array results from the results variable

            while($row=$result->fetch_assoc()){
                //condition: as long as there is a set of arrays being passed to the rows array
                //the loop will not stop
                $rows[] = $row;
                //  print_r($row);
                //  echo "<br>";
                //so every row is assigned to the rows array
            }
            return $rows;
        }
    }
?>