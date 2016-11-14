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

        <link rel="stylesheet" href="/static/css/supersized.css">
        <link href="/asset/css/lightgallery.css" rel="stylesheet">
        <script src="/asset/js/lightgallery.min.js"></script>
        <script src="/asset/js/lg-thumbnail.min.js"></script>
        <script src="/static/js/supersized.3.2.7.min.js"></script>
        <script src="/static/js/supersized-init.js"></script>
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
                                                <li><a href="#event_brief"><?php echo $this->lang->line('event_brief');?></a></li>
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
        <div id="banner" class="banner">
             ssss
        </div>

<!-- section start -->
        <section class="section transprant-bg pclear secPadding">
            <div class="container no-view" data-animation-effect="fadeIn">
                <h1 id="services" class="title text-center">推荐</h1>
                <div class="space"></div>
                <div class="row custom_recommandation">
                    <div class="col-md-3">
                        <img src="http://www.rollingmusic.cn/UploadFiles/Curriculum/201602291452270.png" class="img-circle">
                        <div class="title"><a>免费试听课</a></div>
                    </div>
                    <div class="col-md-3">
                        <img src="http://www.rollingmusic.cn/UploadFiles/Curriculum/201604081559222.jpg" class="img-circle">
                        <div class="title"><a>成人课程</a></div>
                    </div>
                    <div class="col-md-3">
                        <img src="http://www.rollingmusic.cn/UploadFiles/Curriculum/201604081602271.jpg" class="img-circle">
                        <div class="title"><a>儿童/青少年课程</a></div>
                    </div>
                    <div class="col-md-3">
                        <img src="http://www.rollingmusic.cn/UploadFiles/Curriculum/201604081555112.jpg" class="img-circle">
                        <div class="title"><a>寒假夏令营</a></div>
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
                                      <?php echo $school_brief[0]->desc;?>
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
                                    <div class="row"><?php echo $student_words[0]->desc;?></div>
                              </div>
                              <div role="tabpanel" class="tab-pane fade" id="parents_words" aria-labelledby="parents_words-tab">
                                <div class="row"><?php echo $parents_words[0]->desc;?></div>
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
                            <ul class="myTab nav nav-tabs" role="tablist">
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

                                            <button type="button" class="btn btn-default col-md-offset-1 index_register_button"><?php echo $this->lang->line('register_now');?></button>
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
                        <h1 id="event_brief" class="title text-center"><?php echo $this->lang->line('event_brief');?></h1>
                         <div class="bs-example bs-example-tabs">
                            <ul class="myTab nav nav-tabs" role="tablist">
                            <?php if($event_info) { foreach($event_info as $k=>$v){?>
                              <li role="presentation" <?php if($k==0){?>class="active" <?php }else{ ?>class=""<?php }?> >
                              <a href="#event_info<?php echo $v->id;?>" id="event_info<?php echo $v->id;?>-tab" role="tab" data-toggle="tab" aria-controls="event_info<?php echo $v->id;?>" aria-expanded="true">
                              <?php echo mb_substr($v->name,0,12,'utf-8');?></a></li>
                            <?php }} ?>
                            <li role="presentation">
                              <a href="#event_info9999" id="event_info9999-tab" role="tab" data-toggle="tab" aria-controls="event_info9999" aria-expanded="true">
                                <?php echo $this->lang->line('past_event');?>
                              </a></li>

                            </ul>
                            <div id="event_brief_main" class="tab-content">
                            <?php if($event_info) { foreach($event_info as $k=>$v){?>
                              <div role="tabpanel" class="tab-pane fade <?php if($k==0){?>active in<?php }?>" id="event_info<?php echo $v->id;?>" aria-labelledby="school-tab">
                                 <div class="row">
                                  <?php echo $v->name;?>
                                      <?php echo $v->desc;?>

                                 </div>
                              </div>
                            <?php }}?>
                            <div role="tabpanel" class="tab-pane fade" id="event_info9999" aria-labelledby="school-tab">
                                 <div class="row default-bg">

                                    <div class='col-md-12'>
                                          <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                            <!-- Bottom Carousel Indicators -->
                                            <ol class="carousel-indicators">
                                              <?php if($past_event_info){ foreach($past_event_info as $k=>$v){ ?>
                                                <li data-target="#quote-carousel" data-slide-to="<?php echo $k;?>" <?php if($k==0){?>class="active" <?php }else{ ?>class=""<?php }?> ></li>
                                              <?php }} ?>

                                            </ol>

                                            <!-- Carousel Slides / Quotes -->
                                            <div class="carousel-inner">
                                            <?php if($past_event_info){ foreach($past_event_info as $k=>$v){ ?>
                                              <!-- Quote 1 -->
                                              <div class="item <?php if($k==0){?>active<?php }?>">
                                                <blockquote>
                                                  <div class="">

                                                    <div><?php echo $v->name;?></div>
                                                    <div><?php echo $v->desc;?></div>
                                                    <div class="text-right more_imgs" style="color:#fff;cursor:pointer;">+更多图片</div>
                                                    <div class="light_gallery hidden">
                                                        <?php if($v->event_img){  $event_img = explode(';',$v->event_img);
                                                                foreach ($event_img as $key => $value) {
                                                                    if($value){
                                                            ?>
                                                                <img src="<?php echo $value;?>" />
                                                        <?php } } }?>
                                                    </div>
                                                  </div>
                                                </blockquote>
                                              </div>

                                            <?php }}?>

                                            </div>
                                          </div>
                                        </div>
                                 </div>
                              </div>

                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->


        <!-- section start -->
        <div class="colord secPadding" style="display:none;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="text-center">Amazing Free Bootstrap Template.</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- section end -->
<section class="section secPadding" id="team" style="display:none;">
<div class="container">
<h1 class="text-center title">Our Team</h1>
                <div class="separator"></div>
                <p class="lead text-center">Lorem ipsum dolor sit amet laudantium molestias simiut laboriosam.</p>
                <br>
<div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-xs-6 col-sm-3">
                  <div class="team__item">
                    <div class="team-item__img">
                      <img src="/asset/images/team1.jpg" class="img-responsive" alt="...">
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="team-item__name">John Doe</div>
                        <div class="team-item__position">General Manager</div>
                      </div>
                      <div class="col-md-12">
                        <div class="team-item__contact">
                          <a class="team-item-contact__link" href="#">
                            <i class="fa fa-twitter"></i>
                          </a>
                          <a class="team-item-contact__link team-item-contact__link_facebook" href="#">
                            <i class="fa fa-facebook"></i>
                          </a>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div> <!-- / .row -->
                  </div> <!-- / .team__item -->
                </div>

                <div class="col-xs-6 col-sm-3">
                  <div class="team__item">
                    <div class="team-item__img">
                      <img src="/asset/images/team2.jpg" class="img-responsive" alt="...">
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="team-item__name">Mike Wilson</div>
                        <div class="team-item__position">UI/UX Designer</div>
                      </div>
                      <div class="col-md-12">
                        <div class="team-item__contact">
                          <a class="team-item-contact__link" href="#">
                            <i class="fa fa-twitter"></i>
                          </a>
                          <a class="team-item-contact__link team-item-contact__link_facebook" href="#">
                            <i class="fa fa-facebook"></i>
                          </a>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div> <!-- / .row -->
                  </div> <!-- / .team__item -->
                </div>

                <div class="col-xs-6 col-sm-3">
                  <div class="team__item">
                    <div class="team-item__img">
                      <img src="/asset/images/team3.jpg" class="img-responsive" alt="...">
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="team-item__name">Vintel Mills</div>
                        <div class="team-item__position">Project Manager</div>
                      </div>
                      <div class="col-md-12">
                        <div class="team-item__contact">
                          <a class="team-item-contact__link" href="#">
                            <i class="fa fa-twitter"></i>
                          </a>
                          <a class="team-item-contact__link team-item-contact__link_facebook" href="#">
                            <i class="fa fa-facebook"></i>
                          </a>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div> <!-- / .row -->
                  </div> <!-- / .team__item -->
                </div>

                <div class="col-xs-6 col-sm-3">
                  <div class="team__item">
                    <div class="team-item__img">
                      <img src="/asset/images/team4.jpg" class="img-responsive" alt="...">
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="team-item__name">James Resll</div>
                        <div class="team-item__position">Software Developer</div>
                      </div>
                      <div class="col-md-12">
                        <div class="team-item__contact">
                          <a class="team-item-contact__link" href="#">
                            <i class="fa fa-twitter"></i>
                          </a>
                          <a class="team-item-contact__link team-item-contact__link_facebook" href="#">
                            <i class="fa fa-facebook"></i>
                          </a>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div> <!-- / .row -->
                  </div> <!-- / .team__item -->
                </div>

              </div> <!-- / .row -->
            </div>

          </div>
</div>
</section>

<!-- section start -->
        <section class="default-bg secPadding">

<div class="container" style="display:none;">
  <div class="row">
    <div class='col-md-offset-2 col-md-8 text-center'>
    <h2>Clients Testimonials</h2>
    </div>
  </div>
  <div class='row'>
    <div class='col-md-offset-2 col-md-8'>
      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#quote-carousel" data-slide-to="1"></li>
          <li data-target="#quote-carousel" data-slide-to="2"></li>
        </ol>

        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">

          <!-- Quote 1 -->
          <div class="item active">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="/asset/images/kolage.jpg" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                  <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                  <small>Someone famous</small>
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 2 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="/asset/images/mijustin.jpg" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                  <small>Someone famous</small>
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 3 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="/asset/images/keizgoesboom.jpg" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>
                  <small>Someone famous</small>
                </div>
              </div>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        </section>



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
                            <img src="http://www.rollingmusic.cn/images/page6-pic-1.jpg" style="width:100%" />
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

        <script type="text/javascript" src="/asset/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/asset/plugins/modernizr.js"></script>
        <script type="text/javascript" src="/asset/plugins/isotope/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="/asset/plugins/jquery.backstretch.min.js"></script>
        <script type="text/javascript" src="/asset/plugins/jquery.appear.js"></script>

        <!-- Custom Scripts -->
        <script type="text/javascript" src="/asset/js/custom.js"></script>
        <script>
        $(document).ready(function(){
            $('.myTab a').click(function (e) {
              e.preventDefault()
              $(this).tab('show')
            })

            $(".index_register_button").click(function(){
                $("#registerModal").modal('show');
            })

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
        })
        </script>
    </body>
</html>
