<div class="modal modal-lg fade" id="InputTimeModal" tabindex="-1" aria-labelledby="InputTimeModalLabel" aria-hidden="true">
    <form class="form-horizontal" method="POST" action="controllers.php">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="InputTimeModalLabel">Enter Your ID Number</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group row">

                <?php if(isset($_GET['success-msg']))
                    {
                    $msg = $_GET['success-msg']; 
                    } 

                    if(isset($_GET['employeeID'])){
                        loadTimedEmployee();
                        $emp = loadTimedEmployee($id);    
                    ?>
                    <div class="container">
                        <div class="row">
                            <h1 class="text-success"><?php echo $msg ?></h1>
                            <div class="col-sm-6">
                                <div class="text-center mt-2 mb-3">                                    
                                    <img src="<?php echo $emp['Photo']; ?>" alt="" class="" style="width:300px;">
                                    <h1> <?php echo $emp['CompanyID']; ?> - <?php echo $emp['ScreenName']; ?></h1>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="clock mb-4 pt-5 px-3 mt-5">
                                    <span id="modalHours">00</span>
                                    <span>:</span>
                                    <span id="modalMinutes">00</span>
                                    <span>:</span>
                                    <span id="modalSeconds">00</span>
                                    <span id="modalSession">AM</span>         
                                </div> 
                            </div>
                        </div>
                    </div>
                    

                <?php } else{ ?>
                    <div class="clock mb-4">
                        <span id="modalHours">00</span>
                        <span>:</span>
                        <span id="modalMinutes">00</span>
                        <span>:</span>
                        <span id="modalSeconds">00</span>
                        <span id="modalSession">AM</span>         
                    </div> 
                <?php } ?>

                

                    <label for="inputCompanyID" class="col-sm-4 col-form-label">Enter Company ID</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="inputID" id="inputID" placeholder="ID Number" style="width: 80%;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="InputTime" id="InputTime" class="btn btn-primary">Enter</button>
            </div>
            </div>
        </div>
    </form>
</div> 


