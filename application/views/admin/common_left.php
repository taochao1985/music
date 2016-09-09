  <?php $method = $this->uri->segment(2);
        $setting_array = array('wechat_config',
          'menu_settings_index',
          'first_follow',
          'menu_settings_add',
          'sub_menu_settings_add',
          'single_material_manage',
          'multiply_material_manage',
          'single_list',
          'multiply_list');

  ?>
  <?php $user = $this->session->userdata('admin'); $user = $user[0];$data['user'] = $user;?>

  <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Music School!</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="/static/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $user->username;?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-weixin"></i> 微信设置 <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" <?php if(!in_array($method, $setting_array)){?>style="display: none" <?php }?>>
                    <li><a href="/admin/wechat_config">基础设置</a>
                    </li>
                    <li><a href="/admin/menu_settings_index">自定义菜单</a>
                    </li>
                    <li><a href="/admin/first_follow">首次关注回复</a>
                    </li>
                    <li><a href="/admin/single_list">单图文消息</a>
                    </li>
                    <li><a href="/admin/multiply_list">多图文消息</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-user"></i> 基础信息管理 <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/admin/branch_list">教学点列表</a>
                    </li>
                    <li><a href="/admin/teacher_list">教师列表</a>
                    </li>
                    <li><a href="/admin/student_list">学生列表</a>
                    </li>
                    <li><a href="/admin/class_list">班级列表</a>
                    </li>
                    <li><a href="/admin/base_info_list/instrument">乐器列表</a>
                    </li>
                    <li><a href="/admin/base_info_list/class_cate">班级分类</a>
                    </li>
                    <li><a href="/admin/base_info_list/class_level">班级级别</a>
                    </li>
                    <li><a href="/admin/course_list">课程信息列表</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> 上课信息配置 <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="/admin/student_comments">学生评论</a>
                    </li>
                    <li><a href="/admin/course_map_plan_list/map">课程大纲</a>
                    </li>
                    <li><a href="/admin/course_map_plan_list/plan">课程计划</a>
                    </li>
                    <li><a href="/admin/course_map_plan_list/intro">课程介绍</a>
                    </li>

                    <!--li><a href="/admin/course_config_list/content">内容管理</a>
                    </li>
                    <li><a href="/admin/course_config_list/material">材料管理</a>
                    </li>
                    <li><a href="/admin/course_config_list/homework">家庭作业管理</a>
                    </li-->
                    <li><a href="/admin/suggest_song_list">推荐歌曲</a>
                    </li>
                    <li><a href="/admin/suggest_video_list">推荐视频</a>
                    </li>
                  </ul>
                </li>

              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

        </div>
      </div>