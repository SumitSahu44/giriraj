<?php 
  include "../include/dbsmain.inc.php";
?>
<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include "top-links.php";?>

</head>

<body>
	
	<?php include "header.php";?>
	
	<?php include "sidebar.php";?>

    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
		    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		    	<div class="breadcrumb-title pe-3">Manage Orders</div>
		    	<div class="ps-3">
		    		<nav aria-label="breadcrumb">
		    			<ol class="breadcrumb mb-0 p-0">
		    				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
		    				</li>
		    			</ol>
		    		</nav>
		    	</div>
		    </div>
		    <!--end breadcrumb-->

            <!--<div class="card">-->
            <!--  <div class="card-body">-->
            <!--      <div class="d-flex flex-lg-row flex-column align-items-start align-items-lg-center justify-content-between gap-3">-->
            <!--         <div class="overflow-auto">-->
            <!--          <div class="btn-group position-static">-->
            <!--            <div class="btn-group position-static">-->
            <!--              <button type="button" class="btn btn-outline-primary">-->
            <!--                <i class="bi bi-printer-fill me-2"></i>Print-->
            <!--              </button>-->
            <!--            </div>-->
                        
            <!--            <div class="btn-group position-static">-->
            <!--              <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">-->
            <!--                More Actions-->
            <!--              </button>-->
            <!--              <ul class="dropdown-menu">-->
            <!--                <li><a class="dropdown-item" href="javascript:;">Action</a></li>-->
            <!--                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>-->
            <!--                <li><hr class="dropdown-divider"></li>-->
            <!--                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>-->
            <!--              </ul>-->
            <!--            </div>-->
            <!--          </div>  -->
            <!--        </div>-->
            <!--      </div>-->
            <!--  </div>-->
            <!--</div>-->
            
            <div class="card">
                <div class="card-body">
                    <div class="customer-table">
                        <div class="table-responsive white-space-nowrap">
                            <form method="POST" action="<?php $_PHP_SELF?>" onsubmit="return validateForm()">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name / Email / Phone</th>
                                        <th>Product Name / Price</th>
                                        <th>Address </th>
                                        <th>Image </th>
                                        <th>Status</th>
                                        <!--<th><input class="form-check-input" type="checkbox" id="select-all"></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM `tbl_order` ORDER BY ord_id DESC";
                                        $run = mysqli_query($db,$sql) or die("Query Not run");
                                        $count=0;
                                        while($data = mysqli_fetch_assoc($run)){
                                        $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count?></td>
                                        <td><?php echo $data['ord_person_name']?><br><?php echo $data['ord_email']?><br><?php echo $data['ord_mobile']?></td>
                                        <td><?php echo $data['ord_pack_type']?><br>₹<?php echo $data['ord_amount']?></td>
                                        <td><?php echo $data['ord_adrs']?></td>
                                        <td>
                                            <?php
                                            $d = mysqli_fetch_assoc(mysqli_query($db, "select * from tbl_category where category_id='".$data["ord_ord_id"]."' "));
                                            ?>
                                            <img src="images/services/<?php echo $d['category_image_name'];?>" width="40" height="40" class="rounded-3" >
                                        </td>
                                        <td>
                                            <?php if($data["ord_status"]=="Paid"){?>
                                            <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Paid<i class="bi bi-check2 ms-2"></i></span>
                                            <?php }elseif($data["ord_status"]=="Not Paid"){?>
                                            <span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Not Paid<i class="bi bi-check2 ms-2"></i></span>
                                            <?php }else{?>
                                            <span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Failed<i class="bi bi-check2 ms-2"></i></span>
                                            <?php }?>
                                        </td>
                                        <!--<td>-->
                                        <!--   <input type="checkbox" name="checkedIDs[]" value="<?php echo $data["ord_id"]?>" class="form-check-input row-checkbox" >-->
                                        <!--   <input type="hidden" name="pageID[]" value="<?php echo $data["ord_id"]?>">-->
                                        <!--</td>-->
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!--<div class="row ">-->
                            <!--    <div class="btm-btns pt-2 pb-2">-->
                            <!--        <div class="col">-->
                            <!--          <button type="submit" name="delete" class="btn ripple btn-danger px-2">Delete</button>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

	<?php include "footer.php";?>

</body>

</html>