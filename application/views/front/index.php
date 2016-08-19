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

                                                <li><a href="#teachers"><?php echo $this->lang->line('teachers');?></a></li>
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
            <div class="banner-image"></div>
            <div class="banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="caption-data" style="margin-top: 0px; opacity: 1;" data-animation-effect="fadeIn">
                                <h1>一起玩乐队!</h1>
                                <h3 class="padding-top30">Be Your Own Band</h3>
                                <div class="padding-top60 contact-form">
                                    <button class="btn cta-button">Read More</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner end -->
        <section class="hero-caption secPadding">

        <div class="container">

    <div class="row " style="margin-top: 0px;">
                <div class="col-sm-12">
    <h2>Together<strong>Lets Start</strong> - <span>BUSINESS</span> with future perspective.</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aperiam consequatur quo. Sed quis tortor magna. Maecenas hendrerit feugiat pulvinar. Aenean condimentum quam eu ultricies cursus.  Nulla facilisi. In hac habitasse platea dictumst. Ut nec tellus neque. Sed non dui eget arcu elementum facilisis.</p>
    </div>

            </div>

        </div>

</section>
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
        <section class="section clearfix no-view secPadding" data-animation-effect="fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 id="about" class="title text-center">About <span>StartUp</span></h1>
                        <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. laudantium culpa tenetur.</p>
                        <div class="space"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/asset/images/section-image-1.png" alt="">
                                <div class="space"></div>
                            </div>
                            <div class="col-md-6">
                                <p>Lorem ipsum dolor sit amet, cadipisicing  sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium, ut unde fuga error commodi architecto, laudantium culpa tenetur at id, beatae pet.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. adipisicing  sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium,m deserunt.</p>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Lorem ipsum enimdolor sit amet</li>
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Explicabo deleniti neque aliquid</li>
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Consectetur adipisicing elit</li>
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Lorem ipsum dolor sit amet</li>
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Quo issimos molest quibusdam temporibus</li>
                                </ul>
                            </div>
                        </div>
                        <div class="space"></div>
                        <h2>Amazing free bootstrap template</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Lorem ipsum dolor sit amet, adipisicing  sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium, ut unde error commodi architecto, laudantium culpa optio corporis quod earumdignissimos eius mollitia et quas officia doloremque.</p>
                                    <ul class="list-unstyled">
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Lorem ipsum enimdolor sit amet</li>
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Explicabo deleniti neque aliquid</li>
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Consectetur adipisicing elit</li>
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Lorem ipsum dolor sit amet</li>
                                    <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Quo issimos molest quibusdam temporibus</li>
                                </ul>
                                <p>Dolores quam magnam aadipisicing  sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium, ut unde molestias velit eveniet, facere autem saepe autrunt.</p>
                            </div>
                            <div class="col-md-6">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Collapsible Group Item #1
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                Consectetur adipisicing  sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium, ut unde. Quae sed, incidunt laudantium nesciunt, optio corporis quod earum pariatur omnis illo saepe numquam suscipit, nemo placeat ntium, ut unde. Quae sed, incidunt laudantium nesciunt, optio corporis quod earumdignissimos eius mollitia et quas officia doloremque ipsum labore rem deserunt.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Collapsible Group Item #2
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium, ut unde. Quae sed, incidunt laudantium nesciunt, optio corporis quod earum pariatur omnis illo saepe numquam suscipit, nemo placeat ntium, ut unde. Quae sed, incidunt laudantium nesciunt, optio corporis quod earumdignissimos eius mollitia et quas officia doloremque ipsum labore rem deserunt.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Collapsible Group Item #3
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi adipisci illo, voluptatum ipsam fuga error commodi architecto, laudantium culpa tenetur at id, beatae placeat deserunt iure quas voluptas fugit eveniet.
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
        <div class="default-bg colord secPadding">
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
        <section class="section secPadding">
            <div class="container">
                <h1 class="text-center title" id="teachers">教师介绍</h1>
                <div class="separator"></div>
                <!--p class="lead text-center">Lorem ipsum dolor sit amet laudantium molestias simi Quisquam incidunt.</p-->
                <br>
                <div class="row no-view" data-animation-effect="fadeIn">
                    <div class="col-md-12">

                        <!-- isotope filters start -->
                        <div class="filters text-center">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#" data-filter="*">All</a></li>
                                <li><a href="#" data-filter=".guitar">吉他</a></li>
                                <li><a href="#" data-filter=".bass">贝斯</a></li>
                                <li><a href="#" data-filter=".drum">鼓</a></li>
                                <li><a href="#" data-filter=".keyboard">键盘</a></li>
                                <li><a href="#" data-filter=".music-production">音乐制作</a></li>
                                <li><a href="#" data-filter=".other">其他乐器</a></li>
                            </ul>
                        </div>
                        <!-- isotope filters end -->

                        <!-- portfolio items start -->
                        <div class="isotope-container row grid-space-20">
                            <div class="col-sm-6 col-md-3 isotope-item guitar bass drum keyboard">
                                <div class="image-box">
                                    <div class="overlay-container">
                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/page1-2-pic-1.jpg" alt="">
                                        <a class="overlay" data-toggle="modal" data-target="#project-1">
                                            <i class="fa fa-search-plus"></i>

                                        </a>
                                    </div>
                                    <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-1">Ben Misterka USA</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="project-1" tabindex="-1" role="dialog" aria-labelledby="project-1-label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="project-1-label">Ben Misterka USA</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/page1-2-pic-1.jpg" alt="">
                                                        <br/>
                                                        <h3>Guitar\Bass\Drum\Keyboard</h3>
                                                        <p>BIO

Ben Misterka is a American guitarist, composer, and music educator. A versatile musican, Misterka's travels have allowed him to be influenced by music from around the world.  Relocating to Shanghai, China in 2012, he continues to write, perform, and record the music that he loves.

Misterka has toured through China, Japan, and the USA, playing with many acclaimed artists, including the unique singer/songwriter Leah Dou (窦靖童) and pop/rock mainstays Yu Quan (羽 泉), RTM(Return to Mongolia), Anhayla, Kimberly Nichole, Joye B. Moore and many others.

Notable performances include; Richmond International Jazz Festival, Shanghai JZ Festival in 2013 with New Grasslands, and 2015 with RTM, Ordos World Music Festival- Inner Mongolia and many others.  He has performed at several of the major venues and festivals in Shanghai and around China, including the Mercedes-Benz Mixing Room, Booshkabash, Shanghai World Music festival and many more.  In 2014 he held a 2-month residency at “House of Blues and Jazz” in Shanghai, and later that year was invited to perform on classical guitar with the Shanghai Baroque Chamber Orchestra at the Shanghai Concert Hall.

Misterka has played for numerous recording sessions for an array of styles.  He has released 2 self produced records with New Grasslands, and will soon debut an EP of his solo material.  </p>
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

                            <div class="col-sm-6 col-md-3 isotope-item guitar bass drum keyboard">
                                <div class="image-box">
                                    <div class="overlay-container">
                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/page1-2-pic-2.jpg" alt="">
                                        <a class="overlay" data-toggle="modal" data-target="#project-2">
                                            <i class="fa fa-search-plus"></i>

                                        </a>
                                    </div>
                                    <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-2">Hans von Meister America </a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="project-2" tabindex="-1" role="dialog" aria-labelledby="project-2-label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="project-2-label">Hans von Meister America </h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/page1-2-pic-2.jpg" alt="">
                                                        <br/>
                                                        <h3>Guitar\Bass\Keyboard\Music Production</h3>
                                                        <p> Hans is a guitarist, song-writer, producer, and bassist for several popular bands. He has been producing electronic music since 2000, and began DJ-ing in 2011. He studied Composition and Musical Technology at CU Boulder.

He played lead guitar in Iron Virgins from 2013-2014, and was named Best Bassist in the 2014 Shanghai Metal Awards. </p>
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

                            <div class="col-sm-6 col-md-3 isotope-item guitar bass music-production">
                                <div class="image-box">
                                    <div class="overlay-container">
                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201601281634552.jpg" alt="">
                                        <a class="overlay" data-toggle="modal" data-target="#project-3">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-3">Giulio Perinello Italy</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="project-3" tabindex="-1" role="dialog" aria-labelledby="project-3-label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="project-3-label">Giulio Perinello Italy</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201601281634552.jpg" alt="">
                                                        <br/>
                                                        <h3>Guitar\Bass\Music Production</h3>
                                                        <p>Giulio Perinello was in the North of Italy.

His relationship with music began in early childhood, studying bassoon at the Conservatory and later playing electric bass with several bands.

In 2010, he graduated from the renowned APM institute of Saluzzo (Italy) with a degree in "Interactive Music Production for Digital Arts."

Since then he has been expanding his career in Madrid, working as producer and composer in collaboration with several Spanish and international artists.

He released house tracks with Conde Duque record label from Chile, promoting his music as DJ in Madrid, Mexico and Ibiza parties.

Constantly exploring new ways to integrate the computer as an instrument in the live shows, he has been playing guitar and bass in multimedia shows in Spain, London and Portugal festivals with his Umami Connection live cinema project.

In 2013 he started his activity as computer music teacher, developing successfully courses in important institutions such as European Design Institute of Madrid, teaching complete programs about digital music creation.

Now in Shanghai he is working as Dj in many clubs and he started a new live project in collaboration with Chinese musicians, mixing electronic , rock and traditional influences .</p>
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

                            <div class="col-sm-6 col-md-3 isotope-item guitar bass">
                                <div class="image-box">
                                    <div class="overlay-container">
                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201604042004541.png" alt="">
                                        <a class="overlay" data-toggle="modal" data-target="#project-4">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-4">Cai Zhizheng China</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="project-4" tabindex="-1" role="dialog" aria-labelledby="project-4-label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="project-4-label">Cai Zhizheng China</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201604042004541.png" alt="">
                                                        <br/>
                                                        <h3>Guitar\Bass</h3>

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

                            <div class="col-sm-6 col-md-3 isotope-item drum music-production">
                                <div class="image-box">
                                    <div class="overlay-container">
                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201601281636101.jpg" alt="">
                                        <a class="overlay" data-toggle="modal" data-target="#project-5">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-5">Sam Gregory England</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="project-5" tabindex="-1" role="dialog" aria-labelledby="project-5-label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="project-5-label">Sam Gregory England</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201601281636101.jpg" alt="">
                                                        <br/>
                                                        <h3>Drum\Music Production</h3>
                                                        <p> Sam started playing the drums at the age of 15.He found his voice in hitting the drums, and that started his life playing in bands. He particularly loves Metal, Drum n Bass, Jazz, Hip Hop, Reggae, and Classical music. He studied music at the Sheffield College and gained a BA hons Popular Music at The University of Huddersfield. He also formed a popular band in UK called Downslide.
He taught drums to different age’s students at The Wreck Room and School of Rock music school, using the Trinity Rock School and London College of Music curriculums.
He ran band workshops, which were designed to promote interest with the younger ages, and develop skills and band communication with the older ages.</p>
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

                            <div class="col-sm-6 col-md-3 isotope-item keyboard">
                                <div class="image-box">
                                    <div class="overlay-container">
                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201604042002352.png" alt="">
                                        <a class="overlay" data-toggle="modal" data-target="#project-6">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-6">Yeye China</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="project-6" tabindex="-1" role="dialog" aria-labelledby="project-6-label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="project-6-label">Yeye China</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201604042002352.png" alt="">
                                                        <br/>
                                                        <h3>Keyboard</h3>

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

                            <div class="col-sm-6 col-md-3 isotope-item mobile-apps">
                                <div class="image-box">
                                    <div class="overlay-container">
                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201604042009012.png" alt="">
                                        <a class="overlay" data-toggle="modal" data-target="#project-7">
                                            <i class="fa fa-search-plus"></i>
                                            <span>Site Building</span>
                                        </a>
                                    </div>
                                    <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-7">Krystal Lew The United States</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="project-7" tabindex="-1" role="dialog" aria-labelledby="project-7-label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="project-7-label">Krystal Lew The United States</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <img src="http://www.rollingmusic.cn/UploadFiles/Teacher/201604042009012.png" alt="">
                                                        <br/>
                                                        <h3>Other</h3>

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

                        </div>
                        <!-- portfolio items end -->

                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
<!-- section start -->
        <section class="default-bg secPadding">

<div class="container">
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
        <!-- section end -->
        <section id="price" class="price-table secPadding" style="display:none;">
         <div class="container text-center">
         <div class="heading">
            <h1 class="text-center title" id="">Our Price</h1>
                <div class="separator"></div>
                <p class="lead text-center">Lorem ipsum dolor sit amet laudantium incidunt ut laboriosam.</p>
                <br>
          </div>
            <div class="row">
            <div class="col-sm-3">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h3>Basic</h3>
                </div>
                <div class="panel-body">
                  <h3 class="panel-title price">$9<span class="price-cents">99</span><span class="price-month">mo.</span></h3>
                </div>
                <ul class="list-group">
                  <li class="list-group-item">5 Projects</li>
                  <li class="list-group-item">5 GB of Storage</li>
                  <li class="list-group-item">Up to 100 Users</li>
                  <li class="list-group-item">10 GB Bandwidth</li>
                  <li class="list-group-item">Security Suite</li>
                  <li class="list-group-item"><a class="btn btn-default">Sign Up Now!</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h3>Plus</h3>
                </div>
                <div class="panel-body">
                  <h3 class="panel-title price">$19<span class="price-cents">99</span><span class="price-month">mo.</span></h3>
                </div>
                <ul class="list-group">
                  <li class="list-group-item">10 Projects</li>
                  <li class="list-group-item">10 GB of Storage</li>
                  <li class="list-group-item">Up to 250 Users</li>
                  <li class="list-group-item">25 GB Bandwidth</li>
                  <li class="list-group-item">Security Suite</li>
                  <li class="list-group-item"><a class="btn btn-default">Sign Up Now!</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="panel panel-danger text-center">
                <div class="panel-heading">
                  <h3>Premium</h3>
                </div>
                <div class="panel-body">
                  <h3 class="panel-title price">$29<span class="price-cents">99</span><span class="price-month">mo.</span></h3>
                </div>
                <ul class="list-group">
                  <li class="list-group-item">Unlimited</li>
                  <li class="list-group-item">50 GB of Storage</li>
                  <li class="list-group-item">Up to 1000 Users</li>
                  <li class="list-group-item">100 GB Bandwidth</li>
                  <li class="list-group-item">Security Suite</li>
                  <li class="list-group-item"><a class="btn btn-primary">Sign Up Now!</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h3>Ultimate</h3>
                </div>
                <div class="panel-body">
                  <h3 class="panel-title price">$49<span class="price-cents">99</span><span class="price-month">mo.</span></h3>
                </div>
                <ul class="list-group">
                  <li class="list-group-item">Unlimited</li>
                  <li class="list-group-item">150 GB of Storage</li>
                  <li class="list-group-item">Unlimited</li>
                  <li class="list-group-item">500 GB Bandwidth</li>
                  <li class="list-group-item">Security Suite</li>
                  <li class="list-group-item"><a class="btn btn-default">Sign Up Now!</a></li>
                </ul>
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

                        <div class="col-sm-12">
                            <div class="footer-content">


                            <div class="widget-content">

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nam magnam natus tempora cumque, aliquam deleniti voluptatibus voluptas. Maecenas ultrices finibus erat sit amet auctor. Curabitur et metus laoreet, fermentum quam sagittis, cursus augue. </p><br/>

                                <p class="contacts"><i class="fa fa-map-marker"></i> 1508 Kembery Drive, Chicago, IL 60605 </p>

                                <p class="contacts"><i class="fa fa-phone"></i> 202-314-1583</p>

                                <p class="contacts"><i class="fa fa-envelope"></i> support@biss.com</p>



                            </div>

                        </aside>
                                <ul class="social-links">
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

    </body>
</html>
