<?php
     require_once('MysqlConnect.php');

     if(isset($_POST['InputTime'])){
        LogTime();
      }

     //Display the attendance
     function displayAllEmployees(){
         $conn = myConnect();
         $sql = "SELECT * FROM employees";
         $result = mysqli_query($conn, $sql);
     
         while($row=mysqli_fetch_array($result)){
             //do something as long as there's a remaining row.
             $rows[] = $row;
         }
     
         return (isset($rows)) ? $rows : NULL; 
     }        

     $Allemployees = displayAllEmployees();

     //------------------------------------------------------------------------------

     // Show the Attendance
     function displayAttendance(){
         $conn = myConnect();
         $sql = "SELECT attendance.AttendanceID, attendance.EmployeeID, attendance.TimeIn, attendance.OutTime, employees.CompanyID, employees.ScreenName FROM attendance INNER JOIN employees on attendance.EmployeeID = employees.CompanyID";
         $result = mysqli_query($conn, $sql);
     
         while($row=mysqli_fetch_array($result)){
             //do something as long as there's a remaining row.
             $rows[] = $row;
         }
     
         return (isset($rows)) ? $rows : NULL; 
     }

     $Attendance = displayAttendance();

     //-------------------------------------------------------------------------------

     //Input Time
     function LogTime(){
         $conn = myConnect();
         $CompID = $_POST['inputID'];
         $findEmployee = mysqli_query($conn, "SELECT * FROM employees WHERE CompanyID = '$CompID'");
         $Employee = mysqli_fetch_assoc($findEmployee);

         $EmployeeID = $Employee['CompanyID'];
         $today=date("Y-m-d");

         $checkQuery = "SELECT EmployeeID, TimeIn FROM attendance WHERE EmployeeID = '$EmployeeID' AND DATE(TimeIn) = '$today'";
         $result = $conn->query($checkQuery);
        
         //if employee hasn't timed in yet for today
         if($result->num_rows == 0 ){
            $sql2 = "INSERT INTO Attendance(TimeIn, EmployeeID) VALUES( NOW(), '$EmployeeID' ) " ;         
            $result2 = mysqli_query($conn,$sql2);

            if ($result2) {
                $str = "Clocked in successfully!";
                header("Location:employees.php?success-msg=".$str);
            } else {
                echo "Error: " . $conn->error;
            }       
         } 
         else {
            $sql3 = "UPDATE attendance SET OutTime = NOW() WHERE EmployeeID = '$EmployeeID' AND DATE(TimeIn) = '$today'" ;         
            $result3 = mysqli_query($conn,$sql3);

            if ($result3) {
                $str = "Clocked out successfully!";
                header("Location:employees.php?success-msg=".$str);
                
            } else {
                echo "Error: " . $conn->error;
            }     
         }
         

            
     }        
