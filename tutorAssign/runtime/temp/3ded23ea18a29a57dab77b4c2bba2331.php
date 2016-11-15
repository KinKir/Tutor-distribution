<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:109:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office_tutor\tutor_change.html";i:1479125192;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
  <!--  <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TUTOR_STATIC; ?>/css/student.css">
    !-->
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/student.css">
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
                <a href="<?php echo url('TeachingOfficeTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <li><i class="glyphicon glyphicon-th-list"></i> 管理系负责人</li>
                <a href="<?php echo url('TeachingOfficeTutor/tutor_assign'); ?>"><li class="active"><i class="glyphicon glyphicon-pencil"></i> 导师分配情况</li>
                <a href="<?php echo url('TeachingOfficeTutor/student_assign'); ?>"><li><i class="glyphicon glyphicon-ok"></i> 学生分配情况</li>
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
                    <p>提示：毕设导师志愿时间为2016年10月19日至2016年10月22日，请同学们在规定时间内完成志愿选择.</p>
                </div>

                <div class="page-header">
                    <h3>导师分配情况
                    </h3>
                </div>
                <form action="welcome.php" method="post">
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <th>导师工号</th>
                            <th>导师姓名</th>
                            <th>学生学号</th>
                            <th>学生姓名</th>
                        </tr>

                        <tbody>

                        <tr>
                            <td style="vertical-align:middle" rowspan="3">00021</td>
                            <td style="vertical-align:middle" rowspan="3">叶东毅</td>
                            <td>031402XXX</td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td>031402XXX</td>
                            <td>李四</td>
                        </tr>
                        <tr>
                            <td>031402XXX</td>
                            <td>王五</td>
                        </tr>

                        <tr>
                            <td style="vertical-align:middle" rowspan="4">00022</td>
                            <td style="vertical-align:middle" rowspan="4">张栋</td>
                            <td>031402XXX</td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td>031402XXX</td>
                            <td>李四</td>
                        </tr>
                        <tr>
                            <td>031402XXX</td>
                            <td>王五</td>
                        </tr>
                        <tr>
                            <td>031402XXX</td>
                            <td>赵六</td>
                        </tr>

                        <tr>
                            <td style="vertical-align:middle" rowspan="2">00023</td>
                            <td style="vertical-align:middle" rowspan="2">柯逍</td>
                            <td>031402XXX</td>
                            <td>张三</td>
                        </tr>
                        <tr>
                            <td>031402XXX</td>
                            <td>李四</td>
                        </tr>

                        <tr>
                            <td style="vertical-align:middle" rowspan="2">00024</td>
                            <td style="vertical-align:middle" rowspan="2">吴英杰</td>
                            <td>031402XXX</td>
                            <td>赵六</td>
                        </tr>
                        <tr>
                            <td>031402XXX</td>
                            <td>王五</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="submit-area">
                 <!--       <button type="submit" class="btn btn-primary" id="sub-result-export">导&nbsp;&nbsp;出</button>   !-->
                   <!--     <button type="submit" class="btn btn-primary" id="sub-result-change">修&nbsp;&nbsp;改</button>  !-->
                        <button type="submit" class="btn btn-primary" id="sub-result-confirm">确&nbsp;&nbsp;认</button>
                    </div>
                </from>
                    <nav>
                        <ul class="pagination" style="float: right;">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                     </nav>

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
