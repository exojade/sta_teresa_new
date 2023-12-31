<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <title>Sta Teresa Inc.</title>
    <link href="public/static_system/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/static_system/assets/css/fontawesome.css">
    <link rel="stylesheet" href="public/static_system/assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="public/static_system/assets/css/owl.css">
    <link rel="stylesheet" href="public/static_system/assets/css/lightbox.css">
  </head>
<body>
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
  
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <a href="index.html" class="logo" style="font-size: 22px !important;">
                          <?php $site = query("select * from site_options");
                          $site = $site[0];
                          echo($site["site_title"]);
                          ?>
                      </a>
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="#obituary">Obituary</a></li>
                          <li class="scroll-to-section"><a href="#announcements">Announcements</a></li>
                          <li class="scroll-to-section"><a href="#caskets">Caskets</a></li>
                          <li class="scroll-to-section"><a href="#partners">Partners</a></li>
                          <!-- <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="meetings.html">Upcoming Meetings</a></li>
                                  <li><a href="meeting-details.html">Meeting Details</a></li>
                              </ul>
                          </li> -->
                          <li class="scroll-to-section"><a href="#chapels">Chapels</a></li>
                          <li class=""><a href="login">Login</a></li>
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
    <div id="bg-video" style="background-image: url('GDRIVE/background-image.jpg'); background-repeat: no-repeat; background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  ">
        <div ></div>
    </div>
      <!-- <video autoplay muted loop id="bg-video">
          <source src="" type="video/mp4" />
      </video> -->

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-7">
                <div class="caption">
              <h2>Welcome to Sta Teresa <br>Funeral Homes </h2>
              <p>Family Satisfaction is our Prime Objective </p>
              <p>High Quality Caskets, Excellent Service, Reasonable Cost </p>
              <p>Km. 31 Gredu, Panabo City | Km. 24 Bunawan, Davao City </p>
              <p>+639075754693 </p>
          </div>
              </div>
              <div class="col-lg-5 text-center">
              <div class="caption text-center" style="top:50%; right: 15%">
              <img style="max-height: 250px; border-radius: 50%;" src="resources/main_logo.jpg" alt="New Lecturer Meeting">
              </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <section class="upcoming-meetings" style="padding-top: 50px !important; background-color: #1F262C !important;" id="obituary" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Obituary</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row">

          <?php
          $obituary = query("select * from burial_service_contract
                              where valid_date >= ?", date("Y-m-d"));
          $count =  count($obituary); 
          ?>

          <?php foreach($obituary as $o): 
            $burial_date = date("F d Y", strtotime($o["burial_date"]));
            $death_date = date("F d Y", strtotime($o["death_date"]));

            ?>
            <?php if($count == 1 || $count == 2): ?>
              <div class="col-lg-6">
            <?php elseif($count == 3 ): ?> 
              <div class="col-lg-4">
            <?php elseif($count >= 4 ): ?> 
              <div class="col-lg-4">
            <?php endif; ?>
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                  </div>
                  <?php if($o["obituary_image"] == ""): ?>
                    <img width="250" height="200" src="resources/obituary/default_obituary.jpg" alt="New Lecturer Meeting">
                  <?php else: ?>
                    <img width="250" height="200" src="<?php echo($o["obituary_image"]); ?>" alt="New Lecturer Meeting">
                  <?php endif; ?>
                  <!-- <a href="meeting-details.html"><img src="public/static_system/assets/images/meeting-01.jpg" alt="New Lecturer Meeting"></a> -->
                </div>
                <div class="down-content">
               
                  <h4><?php echo($o["deceased_lastname"] . ", " . $o["deceased_firstname"]); ?></h4><br>
                  <div class="row">
                    <div class="col-lg-6">
                      <p><b>Date of Death:</b> <?php echo($death_date); ?></p>
                    </div>
                    <div class="col-lg-6">
                      <p><b>Date of Burial:</b> <?php echo($burial_date); ?></p>
                    </div>
                  </div>
                  <!-- <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p> -->
                </div>
              </div>
            </div>

          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $announcement = query("select * from announcements where status = 'ACTIVE'");
        $announcement = $announcement[0];
  ?>
  <section class="our-facts" id="announcements">
  <style>
.our-facts{
  background-image: linear-gradient(to right, rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('<?php echo($announcement["background_image"]); ?>') !important;
}
  </style>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>Announcements</h2>
            </div>
            <div class="accordions is-first-expanded">
            <article class="accordion">
                <div class="accordion-head">
                    <span><?php echo($announcement["title"]); ?></span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p><?php echo($announcement["announcement"]); ?></p>
                    </div>
                </div>
            </article>
            
        </div>
          </div>
        </div> 
        <div class="col-lg-6 align-self-center">
          <div class="video" style="background-image: url('<?php echo($announcement["background_image"]); ?>')">
            <a href="#" target="_blank"><img src="" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-courses" id="caskets" style="background-color: #1F262C !important;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center section-heading">
            <h2>CASKETS</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">
          <?php $caskets = query("select * FROM casket ORDER BY RAND() LIMIT  10"); ?>
          <?php foreach($caskets as $c): ?>
            <?php $casket_image = query("select * FROM casket_image where casket_id = ?", $c["casket_id"]); ?>
            <a href="static_casket_details?id=<?php echo($c["casket_id"]); ?>">
            <div class="item">
              <?php if(!isset($casket_image[0]["image_url"])): ?>
                <img width="300" height="250" src="resources/caskets/default_casket.jpg" alt="Course One">
              <?php else: ?>
                <img width="300" height="250" src="<?php echo($casket_image[0]["image_url"]); ?>" alt="Course One">
              <?php endif; ?>
              <div class="down-content">
                <h4><?php echo($c["casket"]); ?></h4>
                <div class="info">
                  <div class="row">
                    <div class="col-12">
                       <span class="text-center">P <?php echo(to_peso($c["amount"])); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              </a>
          <?php endforeach; ?>
          </div>
        </div>
        <br>
        <br>
        <div class="col-lg-12 text-center">
          <br>
          <br>
                    <fieldset>
                      <a style="    font-size: 13px;
    color: #fff;
    background-color: #a12c2f;
    padding: 12px 30px;
    display: inline-block;
    border-radius: 22px;
    font-weight: 500;
    text-transform: uppercase;
    transition: all .3s;
    border: none;
    outline: none;"  class="button" href="static_casket_list">VIEW ALL CASKETS</a>
                    </fieldset>
                  </div>
      </div>
    </div>
  </section>



  <section class="apply-now" id="partners" style="background-color:#fff; background:none; padding:0px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="item" style="background: none;">
                <h3 style="color:#000;">Our Trusted Partners</h3>
        
          
              </div>
            </div>
            <div class="col-lg-12">
            <div class="owl-courses-item owl-carousel">
          <?php $partners = query("select * FROM partners"); 
          ?>
          <?php foreach($partners as $row): ?>
          <div class="item" style="background: none;">
                <img src="<?php echo($row["partner_image"]); ?>" alt="Course One">
            </div>
          <?php endforeach; ?>
          </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </section>


  <section class="our-courses" id="chapels" style="background-color: #1F262C !important;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center section-heading">
            <h2>CHAPELS</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-courses-item owl-carousel">
          <?php $chapel = query("select * FROM chapel ORDER BY RAND() LIMIT  10"); 
          ?>
          <?php foreach($chapel as $c): ?>
            <a href="caskets?id=<?php echo($c["casket_id"]); ?>">
            <?php $chapel_image = query("select * FROM chapel_image where chapel_id = ?", $c["chapel_id"]); ?>
            <div class="item">
              <?php if($chapel_image[0]["chapel_image"] == ""): ?>
                <img src="resources/chapel/default_chapel.jpg" alt="Course One">
              <?php else: ?>
                <img src="<?php echo($chapel_image[0]["chapel_image"]); ?>" alt="Course One">
              <?php endif; ?>
              <div class="down-content">
                <h4><?php echo($c["chapel_name"]); ?></h4>
                <div class="info">
                  <div class="row">
                    <div class="col-12">
                       <span class="text-center">P <?php echo($c["price_amount"]); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              </a>
          <?php endforeach; ?>
          </div>
        </div>
        <br>
        <br>
        <div class="col-lg-12 text-center">
          <br>
          <br>
                    <fieldset>
                      <a style="    font-size: 13px;
    color: #fff;
    background-color: #a12c2f;
    padding: 12px 30px;
    display: inline-block;
    border-radius: 22px;
    font-weight: 500;
    text-transform: uppercase;
    transition: all .3s;
    border: none;
    outline: none;" href="static_chapel_list" class="button">VIEW ALL CHAPELS</a>
                    </fieldset>
                  </div>
      </div>
    </div>
  </section>



  

  
  

  <section class="contact-us" id="contact"  style="background-color: #1F262C !important;">
   
  <div class="footer">
      <p>Copyright © <?php echo(date("Y")); ?> STA TERESA FUNERAL HOMES INC.
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="public/static_system/vendor/jquery/jquery.min.js"></script>
    <!-- <script src="public/static_system/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <script src="public/static_system/assets/js/isotope.min.js"></script>
    <script src="public/static_system/assets/js/owl-carousel.js"></script>
    <script src="public/static_system/assets/js/lightbox.js"></script>
    <script src="public/static_system/assets/js/tabs.js"></script>
    <script src="public/static_system/assets/js/video.js"></script>
    <script src="public/static_system/assets/js/slick-slider.js"></script>
    <script src="public/static_system/assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</body>
</html>