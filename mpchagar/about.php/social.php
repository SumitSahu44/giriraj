    <style>
        .whatsapp {
    width: 50px;
    height: 50px;
    left: 30px;
    bottom: 30px;
    background: #10b418;
    position: fixed;
    text-align: center;
    color: #ffffff;
    cursor: pointer;
    border-radius: 50%;
    z-index: 99;
    display: inline-block;
    line-height: 47px;
}
/*.whatsapp {*/
/*    right: 21px !important;*/
/*}*/
/*.whatsapp:before {*/
/*    position: absolute;*/
/*    content: " ";*/
/*    z-index: -1;*/
/*    top: -15px;*/
/*    right: -15px;*/
/*    background-color: #10b418;*/
/*    width: 80px;*/
/*    height: 80px;*/
/*    border-radius: 100%;*/
/*    animation-fill-mode: both;*/
/*    -webkit-animation-fill-mode: both;*/
/*    opacity: 0.6;*/
/*    -webkit-animation: pulse 1s ease-out;*/
/*    animation: pulse 1.8s ease-out;*/
/*    -webkit-animation-iteration-count: infinite;*/
/*    animation-iteration-count: infinite;*/
/*}*/
.phone-call {
    width: 50px;
    height: 50px;
    left: 20px;
    bottom: 115px;
    background: #d3290c;
    position: fixed;
    text-align: center;
    color: #ffffff;
    cursor: pointer;
    border-radius: 50%;
    z-index: 99;
    display: inline-block;
    line-height: 65px;
}
.phone-call:before {
    position: absolute;
    content: " ";
    z-index: -1;
    top: -15px;
    right: -15px;
    background-color: #ED4B41;
    width: 80px;
    height: 80px;
    border-radius: 100%;
    animation-fill-mode: both;
    -webkit-animation-fill-mode: both;
    opacity: 0.6;
    -webkit-animation: pulse 1s ease-out;
    animation: pulse 1.8s ease-out;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
}
        .social-media-follow .social-box{
        padding: 20px;
    border-radius: 20px;
    background: #d3290c;
    margin: 10px 0px;
}

.social-media-follow .social-box .in-box{
    margin: 0px 10px;  
    background: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
}
.social-media-follow .social-box .in-box i{
    font-size: 37px;
    margin: auto;
    justify-content: center;
    /* align-items: center; */
    display: flex;
    padding-top: 13px;
}
    </style>
    <div class="whatsapp">
        <a href="https://wa.me/<?php echo $general['whatsapp']; ?>"><img src="https://cdn2.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-whatsapp-circle-512.png" width="50" alt=" " title=""> </a>
    
    </div>
    
    <!--<div class="phone-call">-->
    <!--    <a href="tel:<?php echo $datac['phone']; ?>" > <i style="font-size: 36px;" class="fa fa-phone"></i></a>-->
    
    <!--</div>-->