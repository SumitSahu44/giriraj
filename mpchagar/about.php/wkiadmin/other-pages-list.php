<!doctype html>

<html lang="en">
<html lang="en" data-bs-theme="blue-theme">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include "top-links.php";?>

</head>

<body>

	<!--start header-->
	<?php include "header.php";?>
	<!--end top header-->

	<!--start sidebar-->
	<?php include "sidebar.php";?>
	<!--end sidebar-->

    <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Page List</div>
					<!-- <div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Products</li>
							</ol>
						</nav>
					</div> -->
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Back</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							
						</div>
					</div>
				</div>
				
				<!--end breadcrumb-->

        <!-- <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
          <a href="javascript:;"><span class="me-1">All</span><span class="text-secondary">(85472)</span></a>
          <a href="javascript:;"><span class="me-1">Pending Payment</span><span class="text-secondary">(86)</span></a>
          <a href="javascript:;"><span class="me-1">Incomplete</span><span class="text-secondary">(76)</span></a>
          <a href="javascript:;"><span class="me-1">Completed</span><span class="text-secondary">(8759)</span></a>
          <a href="javascript:;"><span class="me-1">Refunded</span><span class="text-secondary">(769)</span></a>
          <a href="javascript:;"><span class="me-1">Failed</span><span class="text-secondary">(42)</span></a>
        </div> -->

        <div class="row g-3">
          <div class="col-auto">
            <div class="position-relative">
              <input class="form-control px-5" type="search" placeholder="Search Pages">
              <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
            </div>
          </div>
          
         
          
          <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
               <button class="btn btn-filter px-4"><i class="bi bi-box-arrow-right me-2"></i>Delete Page</button>
               <button class="btn btn-primary px-4"><i class="bi bi-plus-lg me-2"></i>Add Page</button>
            </div>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-body">
            <div class="customer-table">
              <div class="table-responsive white-space-nowrap">
                  
               <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead class="table-light">

                    <tr>
                    <th>Sr. No.</th>
                    <th>Title</th>
                    <th>Show In Header/Footer</th>
                    <th>Order By</th>
                    <th>Status</th>
                    <th>Select Box</th>
                    <th>Edit</th>
                      
                    </tr>
                   </thead>
                   <tbody>
                     <tr>
                     <td>
                        <a href="javascript:;">1</a>
                       </td>
                        <td>
                        Privacy Policy
                       </td>
                        <td>
                        No / Yes
                       </td>
                        <td>
                        3
                       </td>
                       
                       <td><span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span></td>

                       <td>
                         <input class="form-check-input" type="checkbox">
                       </td>
                       
                       <td>
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                       </td>
                     </tr>
                     <tr>
                     <td>
                        <a href="javascript:;">1</a>
                       </td>
                        <td>
                        Terms & Conditions 
                       </td>
                        <td>
                        No / Yes
                       </td>
                        <td>
                        3
                       </td>
                       
                       <td><span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span></td>
                       <td>
                         <input class="form-check-input" type="checkbox">

                       </td>
                       <td>
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                       </td>
                     </tr>
                     <tr>
                     <td>
                        <a href="javascript:;">1</a>
                       </td>
                        <td>
                        Refund Policies
                       </td>
                        <td>
                        No / Yes
                       </td>
                        <td>
                        3
                       </td>
                       
                       <td><span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span></td>
                       <td>
                         <input class="form-check-input" type="checkbox">

                       </td>
                       <td>
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                       </td>
                     </tr>
                     
                    

                    
                   </tbody>
                 </table>
              </div>
            </div>
          </div>
        </div>

    </div>
  </main>


	<?php include "footer.php";?>

</body>

</html>