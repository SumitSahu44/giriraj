<?php include "header.php";?>

    <div class="breadcumb-wrapper" data-bg-src="<?=$wspath?>assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">Contact Us</h1>
        <ul class="breadcumb-menu">
          <li><a href="<?=$wspath?>">Home</a></li>
          <li>Contact Us</li>
        </ul>
      </div>
    </div>
  </div>
  
    <div class="space">
    <div class="container">
      <div class="row gy-4">
          <div class="col-xl-6 col-md-6">
          <img width="100%" src="<?=$wspath?>assets/imgs/matapitambariban-3.jpg">
        
        </div> 
       
          
        <div class="col-xl-6 col-md-6">
          <div class="location-card">
            <h3 class="box-title">College Info </h3>
            <p class="footer-info"><i class="far fa-location-dot"></i> <?=$general['address']?></p>
            <p class="footer-info"><i class="far fa-envelope"></i> <a href="mailto:<?=$general['email']?>" class="info-box_link"><?=$general['email']?></a></p>
            <p class="footer-info"><i class="far fa-phone"></i> <a href="tel:<?=$general['phone']?>" class="info-box_link"><?=$general['phone']?></a></p>
            <p class="footer-info"><i class="fab fa-whatsapp"></i> <a href="https://wa.me/<?=$general['whatsapp']?>" target="_blank" class="info-box_link">Chat With Us</a></p>
          </div>
          <div class="contact-feature">
            <div class="box-icon"><i class="far fa-clock"></i></div>
            <div class="media-body">
              <h3 class="box-title">Opening Hours</h3> 
              <p class="box-text">Mon to sat: 10:00am - 05:00pm</p>
              <p class="box-schedule">Sunday - Closed</p>
            </div>
          </div>
        </div>
       
        </div>
      </div>
    </div>
  </div>
  
  <div class="space-bottom">
    <div class="container">
      <form action="<?=$wspath?>send-mail.html" method="POST" class="contact-form "
        data-bg-src="<?=$wspath?>assets/img/bg/contact_form_bg.png">
        <div class="input-wrap">
          <h2 class="sec-title">Get In Touch!</h2>
          <div class="row">
            <div class="form-group col-12"><input type="text" class="form-control" name="name" id="name"
                placeholder="Your Name"> <i class="fal fa-user"></i></div>
            <div class="form-group col-12"><input type="email" class="form-control" name="email" id="email"
                placeholder="Email Address"> <i class="fal fa-envelope"></i></div>
            <div class="form-group col-12"><input type="tel" class="form-control" name="phone" id="number"
                placeholder="Phone Number"> <i class="fal fa-phone"></i></div>
            <div class="form-group col-12"><select name="subject" id="subject" class="form-select">
                <option value="" disabled="disabled" selected="selected" hidden>Select Subject</option>
                <option value="Make Appointment">Make Appointment</option>
                <option value="General Inquiry">General Inquiry</option>
                <option value="Medicine Help">Medicine Help</option>
                <option value="Consultation">Consultation</option>
              </select> <i class="fal fa-chevron-down"></i></div>
            <div class="form-group col-12"><textarea name="message" id="message" cols="30" rows="3" class="form-control"
                placeholder="Type Appointment Note..."></textarea> <i class="fal fa-pencil"></i></div>
            <div class="form-btn col-12"><button class="th-btn btn-fw" name="submit">BOOK AN APPOINTMENT</button></div>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  <div class="">
    <div class="contact-map"><iframe src="<?=$general['map_link']?>"></iframe></div>
  </div>
  
     
   
    
    <?php include "footer.php";?>
