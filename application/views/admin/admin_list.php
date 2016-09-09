<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/asset/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/admin.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/plugin/jquery-ui-timepicker-addon.css" media="screen" />
<script type="text/javascript" src="/asset/resource/js/jquery-1.7.2.min.js"></script>

<title>日志管理</title>
<style>
  .search_time{
    width: 100px;
  }
</style>

</head>
<body>
    <div class="main-title">
        <h3>工作人员管理</h3>
    </div>
<div class="tb-toolbar">
    <a class="btn btn-small btn-primary" href="/admin/admin_add">新增</a>
  </div>
 <div  >
     <table class="table table-hover table-striped" style="font-size:11px;clear:both;">
        <thead>
            <tr >
                <th>用户名</th>
                <th>角色</th>
                <th>分店名</th>
                <th>手机号</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody id="table_body">
        <?php foreach ($admin as $key=>$val){?>
            <tr>
                 <td><?php echo $val->username;?></td>
                 <td><?php if($val->level == 1){ echo '店长';}else {echo '工作人员';}?></td>
                 <td><?php echo $val->store_name;?></td>
                 <td><?php echo $val->mobile;?></td>
                 <td><a href="/admin/admin_add/<?php echo $val->id;?>">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" class="delete_configs" data_id="<?php echo $val->id;?>">删除</a></td>
            </tr>
        <?php }?>


        </tbody>
    </table>
</div>
<?php $this->load->view('admin/pagination',array('current_page'=>$current_page,'total'=>$total,'url'=>'/admin/admin_list/'));?>

</body></html>