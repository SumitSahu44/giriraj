<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <?php
      $sqltst = "SELECT * FROM tbl_slider WHERE slider_status='Active' ORDER BY `slider_order` ASC";
      $runtst = mysqli_query($db, $sqltst) or die("Query Not run");
      $count = 0;
      while($datatst = mysqli_fetch_assoc($runtst)){
        // Add 'active' class only to the first item
        $activeClass = ($count === 0) ? ' active' : '';
        echo "<div class='carousel-item$activeClass'>";
        echo "<img src='{$wspath}wkiadmin/images/slider/{$datatst['image']}' class='d-block w-100' alt='Mpchagar' title='Mpchagar'>";
        echo "</div>";
        $count++;
      }
    ?>
  </div>
</div>
