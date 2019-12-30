<?php 
    include_once("conn.php");
    $query = "select * from services where p_id = 0";
    $result = mysqli_query($conn , $query);

?>
<div class="row">
<?php while($row = mysqli_fetch_assoc($result)){ ?>
<!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" onClick="window.location.href = 'index.php?ViewSubServices&id=<?php echo $row['id']; ?>&servicename=<?php echo $row['service_name']; ?>&icon=<?php echo $row['icon']; ?>'">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!-- <div class="h5 text-xs font-weight-bold text-success text-uppercase mb-1"></div> -->
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo strtoupper($row['service_name']); ?></div>
                    </div>
                    <div class="col-auto">
                      <img src="serviceicons/<?php echo $row['icon']; ?>" alt="serviceicons" style='width:50px' />
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>
</div>