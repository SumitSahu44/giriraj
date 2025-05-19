<!doctype html>
<html lang="en">
<html lang="en" data-bs-theme="dark-theme">

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
					<div class="breadcrumb-title pe-3">Manage Services</div>
          
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
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden"></span>
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
          <!-- <div class="col-auto flex-grow-1 overflow-auto">
            <div class="btn-group position-static">
              <div class="btn-group position-static">
                <button type="button" class="btn border btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown" aria-expanded="false">
                  Payment Status
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                  <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                </ul>
              </div>

              <div class="btn-group position-static">
                <button type="button" class="btn border btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown" aria-expanded="false">
                  Completed
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                  <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                </ul>
              </div>
              <div class="btn-group position-static">
                <button type="button" class="btn border btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown" aria-expanded="false">
                  More Filters
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                  <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                </ul>
              </div>
            </div>  
          </div> -->
          
          <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
               <button class="btn btn-filter px-4"><i class="bi bi-box-arrow-right me-2"></i>Delete All Services</button>
               <button class="btn btn-primary px-4"><i class="bi bi-plus-lg me-2"></i>Add Service</button>
            </div>
          </div>
        </div><!--end row-->

        <div class="card mt-4">
          <div class="card-body">
            <div class="customer-table">
              <div class="table-responsive white-space-nowrap">
                 <table class="table align-middle">
                  <thead class="table-light">

                    <tr>
                    <th>Sr. No.</th>
                    <th>Service Name</th>
                    <th>Image </th>
                    <th>Category </th>
                    <th>Status </th>
                    <th>Edit</th>

                    <th>Order By</th>

                    <th>Delete</th>
                    
                      
                    </tr>
                   </thead>
                   <tbody>
                     <tr>
                     <td>
                        <a href="javascript:;">1</a>
                       </td>
                        <td>
                        Bajaj
                       </td>
                        <td>
                        <img src="assets/images/avatars/01.png" alt="" style="width:50px; border-radius:50%;">
                       </td>
                        <td>
                        Soffit Ceiling 
                       </td>
                       <td><span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span></td>
                       <td>
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                       </td>
                       
                        <td>
                          <input type="text" value="3" style="width:30px; outline:none;">
                      
                       </td>
                       
                       <td>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
        <path d="M3 6h18M4 10h16M6 4v2M10 4v2M14 4v2M21 8v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8h18z"/>
    </svg>
</td>

                    <!-- 
                       <td class="text-center">
                         <input class="form-check-input" type="checkbox">

                       </td> -->
                       
                     </tr>
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
                        <input type="text" value="3" style="width:30px; outline:none;">
                       </td>
                       
                       <td><span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span></td>
                       <td class="text-center">
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
                        Privacy Policy
                       </td>
                        <td>
                        No / Yes
                       </td>
                        <td>
                        <input type="text" value="3" style="width:30px; outline:none;">
                       </td>
                       
                       <td><span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span></td>
                       <td class="text-center">
                         <input class="form-check-input " type="checkbox">

                       </td>
                       <td>
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                       </td>
                     </tr>
                     
                    

                    
                   </tbody>
                 </table>
                 <div class="row">
                 <form class="btm-btns">
                 <div class="col">
                    <button type="button" class="btn ripple btn-primary px-2">Update Order </button>
                  </div>
                 <div class="col">
                    <button type="button" class="btn ripple btn-primary px-2">Make Active</button>
                  </div>
                 <div class="col">
                    <button type="button" class="btn ripple btn-primary px-2">Make Inactive</button>
                  </div>
                 <div class="col">
                    <button type="button" class="btn ripple btn-primary px-2">Delete</button>
                  </div>
                  </form>
                 </div>
                 

                  <hr>
                  <div class="row">
                  <div class="col">
										<div class="btn-group float-right" role="group" aria-label="First group">
											<button type="button" class="btn btn-outline-primary">16</button>
											<button type="button" class="btn btn-outline-primary">17</button>
											<button type="button" class="btn btn-outline-primary">18</button>
											<button type="button" class="btn btn-outline-primary">19</button>
											<button type="button" class="btn btn-outline-primary">20</button>
										</div>
									</div>
                  </div>
                
              </div>
            </div>
          </div>
        </div>

    </div>
  </main>


	<?php include "footer.php";?>

</body>

</html>