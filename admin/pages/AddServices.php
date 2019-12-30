<!-- subServicelist -->
<?php 
        include_once("conn.php");
        $query = "select id,service_name from services where p_id = 0";
        $result = mysqli_query($conn,$query);
?>
<div class='row justify-content-center'>
            <div class='col-md-6'>
                        <div class="card">
                            <div class="card-header text-center">Add Services</div>
                    <div class="card-body">
                        <form action="pages/AddServicesProcess.php" enctype="multipart/form-data" method='POST'>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Name</label>
                                <input type="hidden" name='services'>
                                <input type="text" class="form-control" id="service" name='serviceName' aria-describedby="service" placeholder="Enter Service name" required>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" data-toggle="collapse" data-target="#collapseExample">
                                 <label class="form-check-label" for="exampleCheck1"> is SubService</label>
                            </div>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body" style='margin-bottom:10px'>
                                        <select class="form-control" name='serviceId'>
                                                <option value='0'>Default select</option>
                                            <?php 

                                                        while($row = mysqli_fetch_assoc($result)){
                                                            echo "<option value='$row[id]'>$row[service_name]</option>";
                                                        }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name='serviceIcon'id="serviceIcon" accept="image/*">
                                        <label class="custom-file-label" for='serviceIcon'>Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Service Description</label>
                                        <textarea class="form-control" id="description" name='description' rows="3"></textarea>
                                </div>
                                <div class='form-group'>
                                        <input type="submit" class='btn btn-primary' value='Submit'>
                                </div>
                        </form>
                    </div>
                <div class="card-footer  text-danger">
                    <?php  if(isset($_SESSION['success'])){?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success..!</strong> Service Created Successfully....!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <?php $_SESSION['success'] = null; } ?>
                    <?php if(isset($_SESSION['error'])){?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error..!</strong> <?php echo $_SESSION['error'];?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <?php $_SESSION['error'] = null;} ?>
                </div>
            </div>      
      </div>
</div>
