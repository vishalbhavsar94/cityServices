<?php 
    include_once("conn.php");
    $id = $_REQUEST['id'];
    $query = "select * from services where p_id = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
?>
        <div class='justify-content-md-center d-flex'>
         <!-- Perent card -->
            <div class="col-xl-3 col-md-6 mb-4 ">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!-- <div class="h5 text-xs font-weight-bold text-success text-uppercase mb-1"></div> -->
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $_REQUEST['servicename'];?></div>
                    </div>
                    <div class="col-auto">
                      <img src="serviceicons/<?php echo $_REQUEST['icon'];?>" alt="serviceicons" style='width:50px' />
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <hr/>
        <div class='row'>
            <?php if($row){ ?>
                <?php  while($row = mysqli_fetch_assoc($result)){?>
             <!-- SubService cards -->
                    <div class="col-xl-3 col-md-6 mb-4 ">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <!-- <div class="h5 text-xs font-weight-bold text-success text-uppercase mb-1"></div> -->
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['service_name'];?></div>
                            </div>
                            <div class="col-auto">
                            <img src="serviceicons/<?php echo $row['icon'];?>" alt="serviceicons" style='width:50px' />
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php } ?>
            <?php }else{
                    echo "
                    <div class='alert alert-danger'  role='alert'>
                        Services Not Found ...!
                    </div>";
            } ?>
        </div>