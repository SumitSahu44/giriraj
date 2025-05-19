<div class="overflow-hidden" id="faq-sec" data-bg-src="assets/img/bg/faq_bg_1.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 text-center text-xl-start align-self-center">
                    <div class="pe-xl-4 space-top pt-xl-0 pb-40 pb-xl-0">
                        <div class="title-area text-center text-xl-start"><span class="sub-title"><img
                                    src="assets/img/theme-img/title_icon_2.svg" alt="Icon">Faqs</span>
                            <h2 class="sec-title text-white">Frequently Asked Have<br>Any Question?</h2>
                        </div>
                        <div class="accordion" id="faqAccordion">
                             <?php 
                                        $sql = "SELECT * FROM `tbl_faqs` ORDER BY faq_order ASC";
                                        $run = mysqli_query($db,$sql) or die("Query Not run");
                                        $count=0;
                                        while($data = mysqli_fetch_assoc($run)){
                                        $count++;
                                    ?>
                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-<?=$count?>"><button class="accordion-button"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?=$count?>"
                                        aria-expanded="true" aria-controls="collapse-<?=$count?>"><?php echo $data['question']?></button></div>
                                <div id="collapse-<?=$count?>" class="accordion-collapse collapse"
                                    aria-labelledby="collapse-item-<?=$count?>" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text"><?php echo $data['answer']?></p>
                                    </div>
                                </div>
                            </div>
                           <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="ps-xxl-4">
                        <div class="faq-img1"><img src="assets/img/normal/faq_1.png" alt="faq"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>