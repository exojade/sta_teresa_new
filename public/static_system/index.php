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
                      <a href="index.html" class="logo">
                          <?php $site = query("select * from site_options");
                          $site = $site[0];
                          echo($site["site_title"]);
                          ?>
                      </a>
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li><a href="meetings.html">Caskets</a></li>
                          <li class="scroll-to-section"><a href="#apply">Obituary</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="meetings.html">Upcoming Meetings</a></li>
                                  <li><a href="meeting-details.html">Meeting Details</a></li>
                              </ul>
                          </li>
                          <li class="scroll-to-section"><a href="#courses">Courses</a></li>
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
  <section class="upcoming-meetings" style="padding-top: 50px !important;" id="meetings">
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
            $month = date("M", strtotime($o["burial_date"]));
            $day = date("d", strtotime($o["burial_date"]));




            ?>
            <?php if($count == 1 || $count == 2): ?>
              <div class="col-lg-6">
            <?php elseif($count == 3 ): ?> 
              <div class="col-lg-4">
            <?php elseif($count >= 4 ): ?> 
              <div class="col-lg-3">
            <?php endif; ?>
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                  </div>
                  <?php if($o["obituary_image"] == ""): ?>
                    <a href="meeting-details.html"><img style="max-height: 250px;" src="resources/obituary/default_obituary.jpg" alt="New Lecturer Meeting"></a>
                  <?php else: ?>
                    <a href="meeting-details.html"><img style="max-height: 250px;" src="<?php echo($o["obituary_image"]); ?>" alt="New Lecturer Meeting"></a>
                  <?php endif; ?>
                  <!-- <a href="meeting-details.html"><img src="public/static_system/assets/images/meeting-01.jpg" alt="New Lecturer Meeting"></a> -->
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6><?php echo($month); ?> <span><?php echo($day); ?></span></h6>
                  </div>
                  <a href="meeting-details.html"><h4><?php echo($o["deceased_lastname"] . ", " . $o["deceased_firstname"]); ?></h4></a>
                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
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


  <section class="our-facts" >
  <style>
.our-facts{
  background-image: linear-gradient(to right, rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('<?php echo($announcement["background_image"]); ?>') !important;
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

  <section class="our-courses" id="courses">
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
            <a href="caskets?id=<?php echo($c["casket_id"]); ?>">
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
                       <span class="text-center">$160</span>
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
                      <button style="    font-size: 13px;
    color: #fff;
    background-color: #a12c2f;
    padding: 12px 30px;
    display: inline-block;
    border-radius: 22px;
    font-weight: 500;
    text-transform: uppercase;
    transition: all .3s;
    border: none;
    outline: none;" type="submit" id="form-submit" class="button">VIEW ALL CASKETS</button>
                    </fieldset>
                  </div>
      </div>
    </div>
  </section>



  <section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h3>APPLY FOR BACHELOR DEGREE</h3>
                <p>You are allowed to use this edu meeting CSS template for your school or university or business. You can feel free to modify or edit this layout.</p>
                <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
              </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h3>APPLY FOR BACHELOR DEGREE</h3>
                <p>You are not allowed to redistribute the template ZIP file on any other template website. Please contact us for more information.</p>
                <div class="main-button-yellow">
                  <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="accordions is-first-expanded">
            <article class="accordion">
                <div class="accordion-head">
                    <span>About Edu Meeting HTML Template</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>If you want to get the latest collection of HTML CSS templates for your websites, you may visit <a rel="nofollow" href="https://www.toocss.com/" target="_blank">Too CSS website</a>. If you need a working contact form script, please visit <a href="https://templatemo.com/contact" target="_parent">our contact page</a> for more info.</p>
                    </div>
                </div>
            </article>
            <article class="accordion">
                <div class="accordion-head">
                    <span>HTML CSS Bootstrap Layout</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>Etiam posuere metus orci, vel consectetur elit imperdiet eu. Cras ipsum magna, maximus at semper sit amet, eleifend eget neque. Nunc facilisis quam purus, sed vulputate augue interdum vitae. Aliquam a elit massa.<br><br>
                        Nulla malesuada elit lacus, ac ultricies massa varius sed. Etiam eu metus eget nibh consequat aliquet. Proin fringilla, quam at euismod porttitor, odio odio tempus ligula, ut feugiat ex erat nec mauris. Donec viverra velit eget lectus sollicitudin tincidunt.</p>
                    </div>
                </div>
            </article>
            <article class="accordion">
                <div class="accordion-head">
                    <span>Please tell your friends</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>Ut vehicula mauris est, sed sodales justo rhoncus eu. Morbi porttitor quam velit, at ullamcorper justo suscipit sit amet. Quisque at suscipit mi, non efficitur velit.<br><br>
                        Cras et tortor semper, placerat eros sit amet, porta est. Mauris porttitor sapien et quam volutpat luctus. Nullam sodales ipsum ac neque ultricies varius.</p>
                    </div>
                </div>
            </article>
            <article class="accordion last-accordion">
                <div class="accordion-head">
                    <span>Share this to your colleagues</span>
                    <span class="icon">
                        <i class="icon fa fa-chevron-right"></i>
                    </span>
                </div>
                <div class="accordion-body">
                    <div class="content">
                        <p>Maecenas suscipit enim libero, vel lobortis justo condimentum id. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br><br>
                        Sed eleifend metus sit amet magna tristique, posuere laoreet arcu semper. Nulla pellentesque ut tortor sit amet maximus. In eu libero ullamcorper, semper nisi quis, convallis nisi.</p>
                    </div>
                </div>
            </article>
        </div>
        </div>
      </div>
    </div>
  </section>


  <section class="our-courses" id="courses">
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
                      <button style="    font-size: 13px;
    color: #fff;
    background-color: #a12c2f;
    padding: 12px 30px;
    display: inline-block;
    border-radius: 22px;
    font-weight: 500;
    text-transform: uppercase;
    transition: all .3s;
    border: none;
    outline: none;" type="submit" id="form-submit" class="button">VIEW ALL CHAPELS</button>
                    </fieldset>
                  </div>
      </div>
    </div>
  </section>

  
  

  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Let's get in touch</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="name" type="text" id="name" placeholder="YOURNAME...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">
                  </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="subject" type="text" id="subject" placeholder="SUBJECT...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>010-020-0340</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>info@meeting.edu</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>Rio de Janeiro - RJ, 22795-008, Brazil</span>
              </li>
              <li>
                <h6>Website URL</h6>
                <span>www.meeting.edu</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
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