<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>attendance</title>
</head>
<style>
    table, th, tr, td {
        border: 1px solid;
    }
</style>
<body>
    <?php>
        require_once('MysqlConnect.php');

        function displayAttendance(){
            $conn = myConnect();
            $sql = "SELECT * FROM attendance";
            $result = mysqli_query($conn, $sql);
        
            while($row=mysqli_fetch_array($result)){
                //do something as long as there's a remaining row.
                $rows[] = $row;
            }
        
            return (isset($rows)) ? $rows : NULL; 
        }        

        $Attendance = displayAttendance();
    ?>

    <div class="container">
        <div class="row m-5">
            <div class="col-sm-6">
                <h1>Attendance</h1>
                <div>

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ScreenName</th>
                            <th scope="col">Shift</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if(isset($Allemployees)){foreach($Allemployees as $ae){  ?>
                                <tr>
                                    <td><?php $id=$ae['CompanyID']; echo $id?></td>
                                    <td><?php echo $ae['ScreenName'];?></td>
                                    <td><?php $shiftin=date_create($ae['ShiftStart']); echo date_format($shiftin,"h:i A"); ?> - <?php $shiftend=date_create($ae['ShiftEnd']); echo date_format($shiftend,"h:i A"); ?></td>
                                    <!-- <td></td> -->
                                </tr> 
                            <?php }} ?>      
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>