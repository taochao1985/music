<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Rolling Music</title>
        <meta name="description" content="Rolling Music">
        <meta name="keywords" content="Rolling Music">
        <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link href="/asset/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="/asset/css/animations.css" rel="stylesheet">
        <script src="/static/js/jquery.min.js"></script>

        <link href="/asset/css/flexslider.css" rel="stylesheet">
        <link href="/asset/css/venobox.css" rel="stylesheet">
        <link href="/asset/css/lightgallery.css" rel="stylesheet">
        <script src="/asset/js/jquery.flexslider-min.js"></script>

    </head>

    <body class="no-trans">
        <!-- scrollToTop -->
        <div class="scrollToTop"><i class="icon-up-open-big"></i></div>

        <!-- header start -->
        <header class="header fixed clearfix navbar navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">

                        <!-- header-left start -->
                        <div class="header-left">

                            <!-- logo -->
                            <div class="logo smooth-scroll">
                                <a href="#banner"><img id="logo" src="/asset/images/logo.png" alt="Worthy"></a>
                            </div>

                            <!-- name-and-slogan -->
                            <!--div class="logo-section smooth-scroll">
                                <div class="brand"><a href="#banner">WIND</a></div>
                            </div-->

                        </div>
                        <!-- header-left end -->

                    </div>
                    <div class="col-md-10">

                        <!-- header-right start -->
                        <div class="header-right">

                            <!-- main-navigation start -->
                            <div class="main-navigation animated">

                                <!-- navbar start -->
                                <nav class="navbar navbar-default" role="navigation">
                                    <div class="container-fluid">

                                        <!-- Toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
                                            <ul class="nav navbar-nav navbar-right">
                                                <li class="active"><a href="#banner"><?php echo $this->lang->line('index_info');?></a></li>
                                                <!--li><a href="#services">Services</a></li-->
                                                <li><a href="#about"><?php echo $this->lang->line('about_us');?></a></li>

                                                <li><a href="#course_brief"><?php echo $this->lang->line('course_brief');?></a></li>
                                                <li><a href="#school_brief"><?php echo $this->lang->line('menu_school_brief');?></a></li>
                                                <li><a href="#event_brief"><?php echo $this->lang->line('studio_introduction');?></a></li>
                                                <!--li><a href="#team">Team</a></li-->
                                                <!--li><a href="#price">Price</a></li-->
                                                <li><a href="#contact"><?php echo $this->lang->line('contact');?></a></li>
                                                <li><a href="javascript:void(0)" style="padding-right:2px;float:left;"><span data-toggle="modal" data-target="#registerModal"><?php echo $this->lang->line('register');?></span></a><a href="javascript:void(0)" style="padding-left:2px;float:left;">/&nbsp;<span data-toggle="modal" data-target="#loginModal"><?php echo $this->lang->line('login');?></span></a></li>
                                                <li><a href="javascript:void(0)" id="change_language"><?php echo $this->lang->line('language_info');?></a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </nav>
                                <!-- navbar end -->

                            </div>
                            <!-- main-navigation end -->

                        </div>
                        <!-- header-right end -->

                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- banner start -->
      <div class="flexslider" style="width:100%;height:100%"  id="banner">
      	<ul class="slides">
          <?php foreach ($bg_imgs as $key => $value) {?>
            	<li><img src="<?php echo $value->field_one;?>" /></li>
      <?php    }?>
      	</ul>
      </div>

<!-- section start -->
<?php if($recommand_ourse_info){?>
        <section class="section transprant-bg pclear secPadding">
            <div class="container no-view" data-animation-effect="fadeIn">
                <h1 id="services" class="title text-center">推荐</h1>
                <div class="space"></div>
                <div class="row custom_recommandation">
                  <?php foreach ($recommand_ourse_info as $key => $value) {?>
                    <div class="col-md-3">
                        <a href="javascript:void(0)" data_id="<?php echo $value->id;?>" ><img src="<?php echo $value->recommand_pic;?>" class="recommand_course"></a>
                    </div>
                    <?php } ?>
                    <?php if($recommand_event_info){
                        foreach ($recommand_event_info as $key => $value) { ?>
                          <div class="col-md-3">
                              <a href="javascript:void(0)" data_id="<?php echo $value->id;?>" ><img src="<?php echo $value->event_img;?>" class="event_click"></a>
                          </div>
                          <?php }
                     } ?>
                </div>

            </div>
        </section>
<?php  } ?>

        <!-- section end -->

        <!-- section start -->
        <section class="section clearfix no-view secPadding default-bg" data-animation-effect="fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 id="about" class="title text-center"><?php echo $this->lang->line('about_us');?></h1>
                         <div class="bs-example bs-example-tabs">
                            <ul class="myTab nav nav-tabs" role="tablist">
                              <li role="presentation" class=""><a href="#school" id="school-tab" role="tab" data-toggle="tab" aria-controls="school" aria-expanded="true"><?php echo $this->lang->line('school_brief');?></a></li>
                              <li role="presentation" class="active"><a href="#teachers" role="tab" id="teachers-tab" data-toggle="tab" aria-controls="teachers" aria-expanded="false"><?php echo $this->lang->line('teacher_brief');?></a></li>
                              <li role="presentation" class=""><a href="#student_words" role="tab" id="student_words-tab" data-toggle="tab" aria-controls="student_words" aria-expanded="false"><?php echo $this->lang->line('student_brief');?></a></li>
                              <li role="presentation" class=""><a href="#parents_words" role="tab" id="parents_words-tab" data-toggle="tab" aria-controls="parents_words" aria-expanded="false"><?php echo $this->lang->line('parents_brief');?></a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                              <div role="tabpanel" class="tab-pane fade" id="school" aria-labelledby="school-tab">
                                 <div class="row">
                                      <?php if($school_brief){ echo $school_brief[0]->desc; }?>
                                 </div>
                              </div>
                              <div role="tabpanel" class="tab-pane fade  active in" id="teachers" aria-labelledby="teachers-tab">
                                    <div class="row no-view" data-animation-effect="fadeIn">
                                        <div class="col-md-12">

                                            <!-- isotope filters start -->
                                            <div class="filters text-center">
                                                <ul class="nav nav-pills">
                                                    <li class="active"><a href="#" data-filter="*">All</a></li>
                                                <?php if($instrument){ foreach($instrument as $k=>$v){?>
                                                    <li><a href="#" data-filter=".<?php echo $v->en_name;?>"><?php echo $v->display_name;?></a></li>
                                                <?php } }?>

                                                </ul>
                                            </div>
                                            <!-- isotope filters end -->

                                            <!-- portfolio items start -->
                                            <div class="isotope-container row grid-space-20">
                                            <?php if($teachers){ foreach($teachers as $k=>$v){?>
                                                <div class="col-sm-6 col-md-3 isotope-item <?php foreach ($v->instrument_info as $key => $value) {
                                                    echo $value->en_name.' ';
                                                }?>">
                                                    <div class="image-box">
                                                        <div class="overlay-container">
                                                            <img src="<?php echo $v->thumb;?>" alt="">
                                                            <a class="overlay" data-toggle="modal" data-target="#project-<?php echo $v->id;?>">
                                                                <i class="fa fa-search-plus"></i>
                                                            </a>
                                                        </div>
                                                        <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-<?php echo $v->id;?>"><?php echo $v->name;?> <?php echo $v->country;?></a>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="project-<?php echo $v->id;?>" tabindex="-1" role="dialog" aria-labelledby="project-1-label" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                    <h4 class="modal-title" id="project-<?php echo $v->id;?>-label"><?php echo $v->name;?> <?php echo $v->country;?></h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <img src="<?php echo $v->thumb;?>" alt="">
                                                                            <br/>
                                                                            <h3>
                                                                                <?php foreach ($v->instrument_info as $key => $value) {
                                                                                            echo $value->display_name;
                                                                                            if($key < (count($v->instrument_info)-1)){
                                                                                                echo '\\';
                                                                                            }
                                                                                        }?>
                                                                            </h3>
                                                                            <div><?php echo $v->desc;?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal end -->
                                                </div>
                                            <?php }}?>

                                            </div>
                                            <!-- portfolio items end -->
                                        </div>
                                    </div>

                              </div>
                              <div role="tabpanel" class="tab-pane fade" id="student_words" aria-labelledby="student_words-tab">
                                    <div class="row"><?php if($student_words){ echo $student_words[0]->desc; }?></div>
                              </div>
                              <div role="tabpanel" class="tab-pane fade" id="parents_words" aria-labelledby="parents_words-tab">
                                <div class="row"><?php if($parents_words){ echo $parents_words[0]->desc; }?></div>
                              </div>

                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->


         <!-- section start -->
        <section class="section clearfix no-view secPadding" data-animation-effect="fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 id="course_brief" class="title text-center"><?php echo $this->lang->line('course_brief');?></h1>
                         <div class="bs-example bs-example-tabs">
                            <ul class="myTab nav nav-tabs" role="tablist" id="course_info_tabs">
                            <?php if($course_info) { foreach($course_info as $k=>$v){?>
                              <li role="presentation" <?php if($k==0){?>class="active" <?php }else{ ?>class=""<?php }?>><a href="#course_info<?php echo $v->id;?>" id="course_info<?php echo $v->id;?>-tab" role="tab" data-toggle="tab" aria-controls="course_info<?php echo $v->id;?>" aria-expanded="true"><?php echo $v->name;?></a></li>
                            <?php }} ?>

                            </ul>
                            <div id="course_brief_main" class="tab-content">
                            <?php if($course_info) { foreach($course_info as $k=>$v){?>
                              <div role="tabpanel" class="tab-pane fade <?php if($k==0){?>active in<?php }?>" id="course_info<?php echo $v->id;?>" aria-labelledby="school-tab">
                                 <div class="row">
                                      <?php echo $v->desc;?>
                                      <div class="row text-center">

                                            <button type="button" class="btn btn-default col-md-offset-1 index_register_button"><?php echo $this->lang->line('listen_now');?></button>
                                      </div>
                                 </div>
                              </div>
                            <?php }}?>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->




         <!-- section start -->
        <section class="section clearfix no-view secPadding default-bg" data-animation-effect="fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 id="school_brief" class="title text-center"><?php echo $this->lang->line('school_brief');?></h1>
                         <div class="bs-example bs-example-tabs">
                            <ul class="myTab nav nav-tabs" role="tablist">
                            <?php if($school_info) { foreach($school_info as $k=>$v){?>
                              <li role="presentation" <?php if($k==0){?>class="active" <?php }else{ ?>class=""<?php }?>><a href="#school_info<?php echo $v->id;?>" id="school_info<?php echo $v->id;?>-tab" role="tab" data-toggle="tab" aria-controls="school_info<?php echo $v->id;?>" aria-expanded="true"><?php echo $v->name;?></a></li>
                            <?php }} ?>

                            </ul>
                            <div id="school_info_main" class="tab-content">
                            <?php if($school_info) { foreach($school_info as $k=>$v){?>
                              <div role="tabpanel" class="tab-pane fade <?php if($k==0){?>active in<?php }?>" id="school_info<?php echo $v->id;?>" aria-labelledby="school-tab">
                                 <div class="row">
                                      <?php echo $v->desc;?>
                                      <div class="row text-left">
                                           <h6 class="yellow_font"><?php echo $v->name;?></h6>
                                           <ul>
                                               <li><?php echo $this->lang->line('inquire_number');?>：<?php echo $v->phone;?></li>
                                               <li><?php echo $this->lang->line('email');?>:<a href="mailto:<?php echo $v->email;?>"><?php echo $v->email;?></a></li>
                                               <li><?php echo $this->lang->line('address');?>：<?php echo $v->address;?></li>
                                           </ul>
                                      </div>
                                 </div>
                              </div>
                            <?php }}?>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->


         <!-- section start -->
        <section class="section clearfix no-view secPadding" data-animation-effect="fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h1 id="event_brief" class="title text-center"><?php echo $this->lang->line('studio_introduction');?></h1>
                        <div class="bs-example bs-example-tabs">
                           <ul class="myTab nav nav-tabs" role="tablist">
                             <li role="presentation" class="active" ><a href="#current_event" id="current_event-tab" role="tab" data-toggle="tab" aria-controls="current_event" aria-expanded="true">
                               <?php echo $this->lang->line('event_brief');?>
                             </a></li>
                             <li role="presentation" ><a href="#past_event" id="past_event-tab" role="tab" data-toggle="tab" aria-controls="past_event" aria-expanded="true">
                               <?php echo $this->lang->line('past_event');?>
                             </a></li>
                           </ul>
                        <div id="event_brief_main" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in " id="current_event" aria-labelledby="current_event-tab">
                            <?php if($event_info) { ?>
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                              <ol class="carousel-indicators">
                                <?php foreach($event_info as $k=>$v){ ?>
                                <li data-target="#quote-carousel" data-slide-to="<?php echo $k;?>" <?php if($k == 0){ ?>class="active" <?php } ?>></li>
                                <?php } ?>
                              </ol>

                                <!-- Carousel Slides / Quotes -->
                                <div class="carousel-inner">
                                  <?php foreach($event_info as $k=>$v){ ?>
                                      <!-- Quote 1 -->
                                      <div class="item <?php if(!$k){ ?>active <?php }?>">
                                        <blockquote>
                                          <div class="row">
                                            <div class="col-sm-3 text-center album_gallery">
                                              <?php if($v->event_img){  $event_imgs = explode(';',$v->event_img); foreach($event_imgs as $key=>$value) {?>
                                                <a href="<?php echo $value;?>" <?php if($key != 0) {?>class="hidden" <?php }?>><img src="<?php echo $value;?>" /></a>
                                              <?php } }?>
                                            </div>
                                            <div class="col-sm-9">
                                              <?php echo $v->desc;?>
                                            </div>
                                          </div>
                                        </blockquote>
                                      </div>
                                    <?php } ?>
                                </div>
                          </div>
                          <?php } ?>
                       </div>
                          <div role="tabpanel" class="tab-pane fade" id="past_event" aria-labelledby="past_event-tab">
                            <ul>
                            <?php if($past_event_info) { foreach($past_event_info as $k=>$v){?>
          									    <li class="pointer">

                                  <div class="image-box" data-toggle="modal" data-target="#event_brief-<?php echo $v->id;?>">
                                    <i class="fa fa-arrow-circle-right pr-10 colored"></i>
                                     <?php echo $v->name;?>
                                  </div>
                                  <!-- Modal -->
                                  <div class="modal fade" id="event_brief-<?php echo $v->id;?>" tabindex="-1" role="dialog" aria-labelledby="project-1-label" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                  <h4 class="modal-title" id="event_brief-<?php echo $v->id;?>-label"><?php echo $v->name;?></h4>
                                              </div>
                                              <div class="modal-body">

                                                  <div class="row">
                                                      <div class="col-md-12">
                                                         <div class="album_gallery">
                                                          <?php if($v->event_img){  $event_imgs = explode(';',$v->event_img); foreach($event_imgs as $key=>$value) {?>
                                                            <a href="<?php echo $value;?>" <?php if($key != 0) {?>class="hidden" <?php }?>><img src="<?php echo $value;?>" /></a>
                                                          <?php } }?>
                                                        </div>
                                                          <div><?php echo $v->desc;?></div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </li>
                            <?php }}?>
                          </ul>
          								</div>
                      </div>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->

        <!-- footer start -->
        <footer id="footer">

            <!-- .footer start -->
            <div class="footer section">
                <div class="container">
                    <h1 class="title text-center" id="contact"><?php echo $this->lang->line('contact_us');?></h1>
                    <div class="space"></div>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="footer-content">
                            <?php if($bottom_content){
                              echo $bottom_content[0]->field_one;
                            }?>
                                <!--form method="POST" role="form" id="footer-form" action="contactengine.php" onSubmit="alert('Thank you for your feedback!');">
                                    <div class="form-group has-feedback">
                                        <label class="sr-only" for="name2">Name</label>
                                        <input type="text" name="Name" id="Name" class="form-control wow fadeInUp" placeholder="Enter Name"required/>
                                        <i class="fa fa-user form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="sr-only" for="email2">Email address</label>
                                        <input type="text" name="Name" id="Name" class="form-control wow fadeInUp" placeholder="Enter Email" required/>
                                        <i class="fa fa-envelope form-control-feedback"></i>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="sr-only" for="message2">Message</label>
                                        <textarea name="Message" rows="8" cols="20" id="Message" class="form-control input-message wow fadeInUp"  placeholder="Message" required></textarea>
                                        <i class="fa fa-pencil form-control-feedback"></i>
                                    </div>
                                    <input type="submit" value="Send" class="btn btn-default">
                                </form-->

                            </div>
                        </div>

                        <div class="col-sm-12 hidden">
                            <div class="footer-content">


                            <div class="widget-content">

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nam magnam natus tempora cumque, aliquam deleniti voluptatibus voluptas. Maecenas ultrices finibus erat sit amet auctor. Curabitur et metus laoreet, fermentum quam sagittis, cursus augue. </p><br/>

                                <p class="contacts"><i class="fa fa-map-marker"></i> 1508 Kembery Drive, Chicago, IL 60605 </p>

                                <p class="contacts"><i class="fa fa-phone"></i> 202-314-1583</p>

                                <p class="contacts"><i class="fa fa-envelope"></i> support@biss.com</p>



                            </div>

                        </aside>
                                <ul class="social-links hidden">
                                    <li class="facebook"><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="googleplus"><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="skype"><a target="_blank" href="#"><i class="fa fa-skype"></i></a></li>
                                    <li class="linkedin"><a target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="youtube"><a target="_blank" href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .footer end -->

            <!-- .subfooter start -->
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .subfooter end -->

        </footer>
        <!-- footer end -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('register');?></h4>
          </div>
            <?php $this->load->view('front/register_form',array('success_url'=>base_url().'student/index/'));?>
        <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>

        <?php $this->load->view('front/login_form');?>
        <!-- JavaScript -->
    <div class="modal fade" id="listenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('listen_now');?></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal form-label-left" data-parsley-validate="" id="listen-form" novalidate="">
              <div class="form-group item">
                <label for="name" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('name');?></label>
                <div class="col-sm-9 col-xs-8">
                  <input type="text" class="form-control" id="listen_name" placeholder="<?php echo $this->lang->line('name');?>" required="required">
                  <i class="fa fa-user form-control-feedback"></i>
                </div>
              </div>
              <div class="form-group item">
                <label for="age" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('mobile');?></label>
                <div class="col-sm-9 col-xs-8">
                  <input type="tel" class="form-control" id="listen_mobile" placeholder="<?php echo $this->lang->line('mobile');?>" required="required">
                </div>
              </div>

              <div class="form-group item">
                <label for="instrument_label" class="col-sm-3 col-xs-4 control-label"><?php echo $this->lang->line('instrument_label');?></label>
                <div class="col-sm-9 col-xs-8">
                  <select class="form-control" id="listen_instrument">
                      <?php foreach ($instrument as $key => $value) { ?>
                          <option value="<?php echo $value->display_name;?>"><?php echo $value->display_name;?></option>
                      <?php }?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="class_id" class="col-sm-7 col-xs-5 text-right control-label"></label>
                <button type="submit" class="btn btn-default col-sm-3 col-xs-2" id="listen_now_sub"><?php echo $this->lang->line('save_label');?></button>
              </div>
            </form>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>
        <script type="text/javascript" src="/asset/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/asset/plugins/modernizr.js"></script>
        <script type="text/javascript" src="/asset/plugins/isotope/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="/asset/plugins/jquery.backstretch.min.js"></script>
        <script type="text/javascript" src="/asset/plugins/jquery.appear.js"></script>
        <script type="text/javascript" src="/asset/js/venobox.js"></script>

        <script src="/asset/js/lightgallery.min.js"></script>
        <script src="/asset/js/lg-thumbnail.min.js"></script>
        <!-- Custom Scripts -->
        <script type="text/javascript" src="/asset/js/custom.js"></script><script type="text/javascript">

        $(document).ready(function(){
          $(".recommand_course").click(function(){
            var course_id = $(this).parents('a').attr('data_id');
            var course_top = $("#course_info_tabs").offset().top-100;
            document.body.scrollTop = course_top;
            document.documentElement.scrollTop = course_top;
            $("#course_info_tabs a[href='#course_info"+course_id+"']").tab('show');
          })

          $(".event_click").click(function(){
            var course_id = $(this).parents('a').attr('data_id');
            var course_top = $("#event_brief").offset().top-100;
            document.body.scrollTop = course_top;
            document.documentElement.scrollTop = course_top;
            $("#event_brief").tab('show');
          })

          $('.venobox').venobox();
          $(".flexslider").flexslider({
      			slideshowSpeed: 4000, //展示时间间隔ms
      			animationSpeed: 400, //滚动时间ms
      			touch: true //是否支持触屏滑动
      		});

            $('.myTab a').click(function (e) {
              e.preventDefault()
              $(this).tab('show')
            })

            $(".index_register_button").click(function(){
                $("#listenModal").modal('show');
            })

            $(".album_gallery").lightGallery({
                download : false,
                thumbnail:true,
            });

            $('.more_imgs').click(function(){
                var target = $(this).next('.light_gallery');
                var album_gallery = [];
                target.children('img').each(function(){
                    album_gallery.push({
                        "src" : $(this).attr('src'),
                        "thumb" : $(this).attr('src')
                    })
                })
                $(this).next('.light_gallery').lightGallery({dynamic: true,dynamicEl:album_gallery,download : false});
            });

            $('#listen-form').submit(function(e) {
              e.preventDefault();
              var listen_submit = true;
              // evaluate the form using generic validaing
              if (!validator.checkAll($(this))) {
                listen_submit = false;
              }

              if (listen_submit){
                var name     = $.trim($('#listen_name').val());
                var listen_mobile  = parseInt($('#listen_mobile').val());
                var instrument_id  = $.trim($('#listen_instrument').val());

                var submitData = {
                    name: name,
                    listen_mobile:listen_mobile,
                    instrument_id:instrument_id
                };

                $.post('/front/do_listen', submitData,function(data) {

                  if (data.success == 'yes') {
                      show_stack_modal('success',data.msg);
                      $("#listenModal").modal('hide');
                  }else{
                      show_stack_modal('error',data.msg);
                  }
                },"json");
              }
              return false;
            });
        })
        </script>
    </body>
</html>
