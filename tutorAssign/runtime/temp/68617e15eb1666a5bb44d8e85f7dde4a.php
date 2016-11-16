<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"C:\wamp64\www\tutorAssign\public/../app/index\view\department_head_tutor\index.html";i:1478666286;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TUTOR_STATIC; ?>/css/student.css">
    <style type="text/css">
        .sider-navbar-nav li {
            color: #fff;
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<div id="container-backstage" class="clearfix">
    <div id="siderbar">
        <nav class="sider-navbar">
            <div class="sider-navbar-header">
                <img src="__STATIC__/image/mainpage-logo.png" alt="" width="240">
            </div>
            <ul class="sider-navbar-nav">
                <a href="<?php echo url('DepartmentHeadTutor/index'); ?>"><li class="active"><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <li><i class="glyphicon glyphicon-user"></i> 学生管理</li>
                <li><i class="glyphicon glyphicon-user"></i> 导师管理</li>
                <a href="<?php echo url('DepartmentHeadTutor/timeSetting'); ?>"><li><i class="glyphicon glyphicon-time"></i> 时间设置</li></a>
                <a href="<?php echo url('DepartmentHeadTutor/matchSetting'); ?>"><li><i class="glyphicon glyphicon-resize-small"></i> 匹配设置</li></a>
                <li><i class="glyphicon glyphicon-cloud-download"></i> 结果导出</li>
            </ul>
        </nav>
    </div>
    <div id="mainpage">
        <div class="top-nav">
            <div class="user-area">
                <div class="hello-user">
                    <span><i class="glyphicon glyphicon-user"></i>欢迎您,</span>
                    <span class="user-name"><?php echo user_type(); ?>: <?php echo (isset($user['name']) && ($user['name'] !== '')?$user['name']:"xxx"); ?></span>
                </div>
            </div>
            <div class="login-out-area">
                <a href="<?php echo url('BaseController/logout'); ?>"><i class = "glyphicon glyphicon-off"></i>退出</a>
            </div>
        </div>
        <div class="page-content">
            <div class="main-content" style="border-radius: 10px;padding: 20px;">
                <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                    <p>提示：导师互选尚未开始，您还未设置导师分配系统的时间设置！</p>
                </div>
                <div class="my-information-title">
                    <span>我的信息</span>
                    <button class="btn btn-info button-size btn-edit" type="submit">修改</button>
                </div>
                <div class="my-information-subtitle">
                    <span>您可以在这里查看或修改自己的个人信息</span>
                </div>
                <div class="my-information-detail-1">
                    <ul>
                        <li><span>姓名：</span><span><?php echo $user['name']; ?></span><span>工号：</span><span><?php echo $user['workNumber']; ?></span><span>性别：</span><span><?php echo $user['sex']; ?></span></li>
                        <li><span>系别：</span><span><?php echo $user['department']; ?></span><span>电话：</span><span><?php echo $user['telephone']; ?></span><span>邮箱：</span><span><?php echo $user['email']; ?></span></li>
                        <li><span>生日：</span><span><?php echo $user['birthday']; ?></span></li>
                    </ul>
                </div>

            </div>
            
            <div class="footer"  style="border-radius: 10px;">
                Designed by Lin & 我说的都队
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="__STATIC__/js/index.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap.js"></script>
<script type="text/javascript" src="__STATIC__/js/backstage.js"></script>
</body>
</html>


