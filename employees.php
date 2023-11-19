<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="pre-custom.js"></script>
    <style>
        table, th, tr, td {
            border: 1px solid;
        }
        .clock {
            font-size: 50px;
        }
    </style>
</head>

<body>
    <?php
       require_once('controllers.php');
    ?>

    <?php $Allemployees = displayAllEmployees(); ?>

    <div class="container">
        <div class="row m-5">
            <div class="col-sm-6">
                <h1>Employees</h1>
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
            <div class="col-sm-6 text-center">
                <div class="clock p-5 ml-5">
                    <span id="hours">00</span>
                    <span>:</span>
                    <span id="minutes">00</span>
                    <span>:</span>
                    <span id="seconds">00</span>
                    <span id="session">AM</span>         
                </div>                

                <button class="btn btn-info py-2 px-4" data-bs-toggle="modal" data-bs-target="#InputTimeModal"> INPUT TIME</button>
                               
                <?php require_once('input-time-modal.php'); ?>               

            </div>
        </div>

        <div class="row m-5">
            <div class="col-sm-10"> 
                <h1>Attendance</h1>
                <div>

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID No</th>
                            <th scope="col">ScreenName</th>
                            <th scope="col">Time In</th>
                            <th scope="col">Time Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if(isset($Attendance)){foreach($Attendance as $aa){  ?>
                                <tr>
                                    <td><?php $id=$aa['CompanyID']; echo $id?></td>
                                    <td><?php echo $aa['ScreenName'];?></td>
                                    <td><?php $timein=date_create($aa['TimeIn']); echo date_format($timein,"h:i A"); ?> </td>
                                    <td><?php 
                                    if($aa['OutTime']==NULL){
                                        ?> --- <?php

                                    } else {
                                        $timeout=date_create($aa['OutTime']);
                                    
                                    echo date_format($timeout,"h:i A"); } ?></td>
                                    
                                </tr> 
                            <?php }} ?>      
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
        
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="post-custom.js"></script>
</html>