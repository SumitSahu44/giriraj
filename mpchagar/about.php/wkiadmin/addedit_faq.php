<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $question = htmlspecialchars($_POST['question'],ENT_QUOTES);
    $answer = htmlspecialchars($_POST['answer'],ENT_QUOTES);
    $faq_status = $_POST['faq_status'];
        
    $sql="INSERT INTO `tbl_faqs`(`question`, `answer`, `faq_status`) 
                  VALUES ('$question', '$answer', '$faq_status')";
    $result = mysqli_query($db, $sql) or die("Query unsuccessful");

	    if($result){
                echo ("<script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'success',
                            text: 'Sbmit Successfully!',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage_faq.php';
                            }
                        });
                    }
                </script>");
	    	mysqli_close($db);
	    }else{
            echo ("<script>
                window.onload = function() {
                        Swal.fire({
                            icon: 'error',
                            text: 'Not Submit!',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage_faq.php';
                            }
                        });
                    }
                </script>");
        }
	}
	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $faq_status = $_POST['faq_status'];
    $question = htmlspecialchars($_POST['question'], ENT_QUOTES);
    $answer = htmlspecialchars($_POST['answer'], ENT_QUOTES);

    $sql = "UPDATE `tbl_faqs` SET `question`='$question', `answer`='$answer', `faq_status`='$faq_status'";
    
    $sql .= " WHERE faq_id=$id";

    if ($db->query($sql) === TRUE) {
        echo "<script>
            window.onload = function() {
                Swal.fire({
                    icon: 'success',
                    text: 'Update Successfully!',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'manage_faq.php';
                    }
                });
            }
        </script>";
    } else {
        echo "<script>
               window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    text: 'Not Update!',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'manage_faq.php';
                    }
                });
            }
        </script>";
    }

    // mysqli_close($db);
}

?>
<!doctype html>
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
        <div class="breadcrumb-title pe-3">Add/Edit FAQ</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
            <a href="manage_faq.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $sl_id = isset($_REQUEST['faq_id']) ? $_REQUEST['faq_id'] : '';
                if($sl_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_faqs` WHERE faq_id=$sl_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $faq_id = $dataupd['faq_id'];
                            $question = $dataupd['question'];
                            $faq_status = $dataupd['faq_status'];
                            $answer = $dataupd['answer'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Question</h5>
                    <input type="text" class="form-control" placeholder="Question?" name="question" <?php if($sl_id!=""){?>value="<?= $question?>"<?php }?>>
                    <input type="hidden" name="id" <?php if($sl_id!=""){?>value="<?= $faq_id?>"<?php }?>>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Answer</h5>
                    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="answer"><?php if($sl_id!=""){?><?= $answer ?><?php }?></textarea>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Status </h5>
                    <select class="form-select" id="AddCategory" name="faq_status">
                        <option value="Active" <?php if($sl_id!=""){?><?php if($faq_status=='Active'){ ?> selected="selected" <? } ?><?php }?>>Active</option>
                        <option value="Inactive" <?php if($sl_id!=""){?><?php if($faq_status=='Inactive'){ ?> selected="selected" <? } ?><?php }?>>Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                    <?php if($sl_id!=""){?>
                    <button type="submit" name="update" class="btn btn-success px-5">Update</button>
                    <?php }else{?>								                                 
                    <button type="submit" name="submit" class="btn btn-success px-5">Submit</button>
                    <?php }?>
                </div>
              </div>
              </form>
            </div>
            <!--end row-->
          </div>
  </main>


  <?php include "footer.php";?>

</body>

</html>