<<<<<<< HEAD:tutorAssign/runtime/temp/fda2ffc75fa3499b74bd75b6d168b383.php
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:111:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office_tutor\student_assign.html";i:1479287618;}*/ ?>
=======
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"C:\wamp64\www\tutorAssign\public/../app/index\view\teaching_office_tutor\student_assign.html";i:1479170879;}*/ ?>
>>>>>>> 919d834b003b4de4be29fda002fc30810208f309:tutorAssign/runtime/temp/704f7391cfee9be36b4d9502cf92a89b.php
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
{:dump($list)}
{$list}
<div>{$page}</div>
<div id="container-backstage" class="clearfix">

    <div id="siderbar">
        <nav class="sider-navbar">
            <div class="sider-navbar-header">
                <img src="__STATIC__/image/mainpage-logo.png" alt="" width="240">
            </div>
            <ul class="sider-navbar-nav">
                <a href="<?php echo url('TeachingOfficeTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <li><i class="glyphicon glyphicon-th-list"></i> 管理系负责人</li>
                <a href="<?php echo url('TeachingOfficeTutor/tutor_assign'); ?>"><li ><i class="glyphicon glyphicon-pencil"></i> 导师分配情况</li>
                <a href="<?php echo url('TeachingOfficeTutor/student_assign'); ?>"><li class="active"><i class="glyphicon glyphicon-ok"></i> 学生分配情况</li>
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
                    <h3>学生分配情况
                    </h3>
                </div>

                <div class="form-group">
                    <label  class="col-sm-1 control-label">选择系别：</label>
                    <div class="col-sm-4">
                    <form action="<?php echo url('TeachingOfficeTutor/student_assign'); ?>"  method="post">
                        <select class="form-control" name="department" style="display: inline; width: 45%">
                            <option value="计算机系">计算机系</option>
                            <option value="数学系">数学系</option>
                            <option value="网络工程系">网络工程系</option>
                            <option value="软件工程系">软件工程系</option>
                            <option value="信息安全系">信息安全系</option>
                            <option value="系统结构系">系统结构系</option>
                        </select>  
                        <input type="submit" class="btn btn-primary" style="display: inline;" id="sub-result-export">
                    </form>
                    </div>
                </div>

                <br /><br /><br />
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                           <th>学生学号</th>
                            <th>学生姓名</th>
                         <!--   <th>班级</th>  !-->
                            <th>导师工号</th>
                            <th>导师姓名</th>
                         <!--  <th>研究方向</th>  !-->
                        </tr>

                        <tbody>
                        <?php
                        $i=1;
                        foreach ($data as  $value) 
                        {
                            
                        echo '<tr>
                            <td>'.$i.'</td>
                            <td>'.$value['snum'].'</td>
                            <td>'.$value['sname'].'</td>
                       <!--      <td>计算机2班</td>  !-->
                            <td>'.$value['tnum'].'</td>
                            <td>'.$value['tname'].'</td>
                       <!--      <td>系统结构</td>  !-->
                        </tr>';
                        $i++;
                         }
                        ?>
                  
                        </tbody>
                    </table>

                    <div class="submit-area">
                        <button type="submit" class="btn btn-primary" id="sub-result-export">导&nbsp;&nbsp;出</button>
                           <button type="submit" class="btn btn-primary" id="sub-result-change"><a style="color:white;" href="<?php echo url('TeachingOfficeTutor/student_change'); ?>">修&nbsp;&nbsp;改</a></button>  
                     <!--   <button type="submit" class="btn btn-primary" id="sub-result-change">修&nbsp;&nbsp;改</button> !-->
                   <!--     <button type="submit" class="btn btn-primary" id="sub-result-confirm">确&nbsp;&nbsp;认</button>  !-->
                    </div>

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
