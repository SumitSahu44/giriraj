<?php include "../include/dbsmain.inc.php";?>
<!doctype html>
<!--<html lang="en">-->
<html lang="en" data-bs-theme="blue-theme" >

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

	<!--start main wrapper-->
	<main class="main-wrapper">
		<div class="main-content">
			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">Dashboard</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
							</li>
							<!--<li class="breadcrumb-item active" aria-current="page">Analysis</li>-->
						</ol>
					</nav>
				</div>
			</div>
			<!--end breadcrumb-->

			<div class="row">
				<div class="col-xxl-8 d-flex align-items-stretch">
					<div class="card w-100 overflow-hidden rounded-4">
						<div class="card-body position-relative p-4">
							<div class="row">
								<div class="col-12 col-sm-7">
									<div class="d-flex align-items-center gap-3 mb-5">
										<img src="images/<?= $general['header_logo'];?>" class=" bg-grd-info p-1"
											width="60" alt="user">
										<!--<img src="images/<?= $general['header_logo'];?>" class="rounded-circle bg-grd-info p-1"-->
										<!--	width="60" height="60" alt="user">-->
										<div class="">
											<p class="mb-0 fw-semibold">Welcome back</p>
											<h4 class="fw-semibold mb-0 fs-4 mb-0"><?=$_SESSION['user']['name']?></h4>
										</div>
									</div>
									<div class="d-flex align-items-center gap-5">
										<div class="">
										    <?php
											    $resultsss = mysqli_query($db, "SELECT COUNT(*) AS total FROM `tbl_category`");
											    $totslprod=mysqli_fetch_assoc($resultsss)['total'];
											?>
											<h4 class="mb-1 fw-semibold d-flex align-content-center"><?=$totslprod?><i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
											</h4>
											<p class="mb-3">Total Products / Services</p>
											<div class="progress mb-0" style="height:5px;">
												<div class="progress-bar bg-grd-success" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="vr"></div>
										<div class="">
										    <?php
											    $resultquerr = mysqli_query($db, "SELECT COUNT(*) AS total FROM `tbl_queries`");
											    $totslquerrr=mysqli_fetch_assoc($resultquerr)['total'];
											?>
											<h4 class="mb-1 fw-semibold d-flex align-content-center"><?=$totslquerrr?><i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
											</h4>
											<p class="mb-3">Total Queries</p>
											<div class="progress mb-0" style="height:5px;">
												<div class="progress-bar bg-grd-danger" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-5">
									<div class="welcome-back-img pt-4">
										<img src="assets/images/gallery/welcome-back-3.png" height="180" alt="">
									</div>
								</div>
							</div><!--end row-->
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
					<div class="card w-100 rounded-4">
						<div class="card-body">
							<div class="d-flex flex-column gap-3">
								<div class="d-flex align-items-start justify-content-between">
									<div class="">
										<h5 class="mb-0">Date Time</h5>
									</div>
									
								</div>
								<div class="position-relative">
                                    <div class="piechart-legend">
                                        <h2 class="mb-1" id="currentTime"></h2>
                                        <h6 class="mb-0" id="currentDateTime"></h6>
                                    </div>
                                    <div id="chart6"></div>
                                </div>
                                
                                <script>
                                    function updateTime() {
                                        const now = new Date();
                                        const options = {
                                            timeZone: 'Asia/Kolkata',
                                            hour: 'numeric',
                                            minute: 'numeric',
                                            second: 'numeric',
                                            hour12: false
                                        };
                                        const timeString = now.toLocaleTimeString('en-IN', options);
                                        const dateOptions = {
                                            timeZone: 'Asia/Kolkata',
                                            day: '2-digit',
                                            month: 'short', // This gives 'Sep'
                                            year: 'numeric'
                                        };
                                        const dateString = now.toLocaleDateString('en-IN', dateOptions).replace(/ /g, '-');
                                        document.getElementById('currentTime').textContent = timeString;
                                        document.getElementById('currentDateTime').textContent = dateString;
                                    }
                                    setInterval(updateTime, 1000);
                                    updateTime();
                                </script>

							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
					<div class="card w-100 rounded-4">
						<div class="card-body">
							<div class="d-flex align-items-start justify-content-between mb-3">
								<div class="">
									<h5 class="mb-0 fw-bold">Social Media</h5>
								</div>
								
							</div>
							<div class="d-flex flex-column justify-content-between gap-4">
								<div class="d-flex align-items-center gap-4">
									<div class="d-flex align-items-center gap-3 flex-grow-1">
									    <a href="<?= $general['facebook_link'];?>" target="_blank">
										<img src="assets/images/apps/17.png" width="32" alt=""></a>
										<p class="mb-0">Facebook</p>
									</div>
									<div class="">
										<!--<p class="mb-0 fs-6">55%</p>-->
									</div>
									<div class="">
										<p class="mb-0 data-attributes">
											<span data-peity='{ "fill": ["#0d6efd", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
										</p>
									</div>
								</div>
								<div class="d-flex align-items-center gap-4">
									<div class="d-flex align-items-center gap-3 flex-grow-1">
									    <a href="<?= $general['linkedin_link'];?>" target="_blank">
										<img src="assets/images/apps/18.png" width="32" alt=""></a>
										<p class="mb-0">LinkedIn</p>
									</div>
									<div class="">
										<!--<p class="mb-0 fs-6">67%</p>-->
									</div>
									<div class="">
										<p class="mb-0 data-attributes">
											<span data-peity='{ "fill": ["#fc185a", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
										</p>
									</div>
								</div>
								<div class="d-flex align-items-center gap-4">
									<div class="d-flex align-items-center gap-3 flex-grow-1">
									    <a href="<?= $general['insta_link'];?>" target="_blank">
										<img src="assets/images/apps/19.png" width="32" alt=""></a>
										<p class="mb-0">Instagram</p>
									</div>
									<div class="">
										<!--<p class="mb-0 fs-6">78%</p>-->
									</div>
									<div class="">
										<p class="mb-0 data-attributes">
											<span data-peity='{ "fill": ["#02c27a", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
										</p>
									</div>
								</div>
								<div class="d-flex align-items-center gap-4">
									<div class="d-flex align-items-center gap-3 flex-grow-1">
									    <a href="<?= $general['twitter_link'];?>" target="_blank">
										<img src="assets/images/apps/twitter-circle.png" width="32" alt=""></a>
										<p class="mb-0">Twitter</p>
									</div>
									<div class="">
										<!--<p class="mb-0 fs-6">46%</p>-->
									</div>
									<div class="">
										<p class="mb-0 data-attributes">
											<span data-peity='{ "fill": ["#fd7e14", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
										</p>
									</div>
								</div>
								<div class="d-flex align-items-center gap-4">
									<div class="d-flex align-items-center gap-3 flex-grow-1">
									    <a href="<?= $general['youtube_link'];?>" target="_blank">
										<img src="assets/images/apps/04.png" width="32" alt=""></a>
										<p class="mb-0">Youtube</p>
									</div>
									<div class="">
										<!--<p class="mb-0 fs-6">38%</p>-->
									</div>
									<div class="">
										<p class="mb-0 data-attributes">
											<span data-peity='{ "fill": ["#0dcaf0", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
										</p>
									</div>
								</div>
								<div class="d-flex align-items-center gap-4">
									<div class="d-flex align-items-center gap-3 flex-grow-1">
									    <a href="<?= $general['pinterest_link'];?>" target="_blank">
										<img src="assets/images/apps/12.png" width="32" alt=""></a>
										<p class="mb-0">Pinterest</p>
									</div>
									<div class="">
										<!--<p class="mb-0 fs-6">15%</p>-->
									</div>
									<div class="">
										<p class="mb-0 data-attributes">
											<span data-peity='{ "fill": ["#6f42c1", "rgb(255 255 255 / 10%)"], "innerRadius": 14, "radius": 18 }'>5/7</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
					<div class="card w-100 rounded-4">
						<div class="card-body">
							<div class="d-flex align-items-start justify-content-between mb-3">
								<div class="">
									<h5 class="mb-0">Recent Queries</h5>
								</div>
							</div>
							<!--<div class="order-search position-relative my-3">-->
							<!--	<input class="form-control rounded-5 px-5" type="text" placeholder="Search">-->
							<!--	<span-->
							<!--		class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>-->
							<!--</div>-->
							<div class="table-responsive">
								<table class="table align-middle">
									<thead>
										<tr>
											<th>Sr. No.</th>
                                            <th>Name/Email/Phone</th>
                                            <th>Subject </th>
                                            <th>Message </th>
                                            <th>DateTime </th>
										</tr>
									</thead>
									<tbody>
									    <?php 
                                            $sql = "SELECT * FROM `tbl_queries` ORDER BY m_id DESC";
                                            $run = mysqli_query($db,$sql) or die("Query Not run");
                                            $count=0;
                                            while($data = mysqli_fetch_assoc($run)){
                                            $count++;
                                        ?>
										<tr>
											<td><?php echo $count?></td>
                                            <td><?php echo $data['name']?><br><?php echo $data['email']?><br><?php echo $data['phone']?></td>
                                            <td><?php echo $data['subject']?></td>
                                            <td><?php echo $data['message']?></td>
                                            <td><?php echo $data['datetime']?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!--end main wrapper-->

	<?php include "footer.php";?>

</body>

</html>