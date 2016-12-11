<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:101:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teacher_tutor\issue_submit.html";i:1479472808;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/student.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/teacher.css">
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
                <a href="<?php echo url('TeacherTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <a href="<?php echo url('TeacherTutor/student_list'); ?>"><li><i class="glyphicon glyphicon-th-list"></i> 可选学生</li></a>
                <a href="<?php echo url('TeacherTutor/issue_submit'); ?>"><li class="active"><i class="glyphicon glyphicon-pencil"></i> 课题提交</li></a>
                <a href="<?php echo url('TeacherTutor/show_result'); ?>"><li><i class="glyphicon glyphicon-ok"></i> 志愿结果</li></a>
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
                    <p><?php echo $message; ?></p>
                    <p><?php echo $message1; ?></p>
                </div>
                <?php if($ontime == 1) { ?>
                <div class="my-information-title">
                    <span>课题提交</span>
                </div>
                <hr>
                <form method="post" action="<?php echo url('TeacherTutor/issue_submit'); ?>">
                    <div class="form-horizontal" role="form">
                         <div class="form-group">
                             <div class="row">
                                 <label for="firstname" class="col-sm-2 control-label">自然班人数</label>
                                 <div class="col-xs-3">
                                     <select class="form-control" name="totalNatur">
                                     <option <?php if($issue['totalNatur'] == 0 ) {?> selected="selected" <?php }?> value=0>0</option>
                                     <option <?php if($issue['totalNatur'] == 1 ) {?> selected="selected" <?php }?> value=1>1</option>
                                     <option <?php if($issue['totalNatur'] == 2 ) {?> selected="selected" <?php }?> >2</option>
                                     <option <?php if($issue['totalNatur'] == 3 ) {?> selected="selected" <?php }?> >3</option>
                                     <option <?php if($issue['totalNatur'] == 4 ) {?> selected="selected" <?php }?> >4</option>
                                     <option <?php if($issue['totalNatur'] == 5 ) {?> selected="selected" <?php }?> >5</option>
                                     <option <?php if($issue['totalNatur'] == 6 ) {?> selected="selected" <?php }?> >6</option>
                                     <option <?php if($issue['totalNatur'] == 7 ) {?> selected="selected" <?php }?> >7</option>
                                     </select>
                                 </div> 
                                 <?php if($user['isExperial']) {?>
                                 <label for="firstname" class="col-sm-2 control-label">实验班人数</label>
                                 <div class="col-xs-3">
                                     <select class="form-control" name="totalExper" >
                                     <option <?php if($issue['totalExper'] == 0 ) {?> selected="selected" <?php }?> >0</option>
                                     <option <?php if($issue['totalExper'] == 1 ) {?> selected="selected" <?php }?> >1</option>
                                     <option <?php if($issue['totalExper'] == 2 ) {?> selected="selected" <?php }?> >2</option>
                                     <option <?php if($issue['totalExper'] == 3 ) {?> selected="selected" <?php }?> >3</option>
                                     <option <?php if($issue['totalExper'] == 4 ) {?> selected="selected" <?php }?> >4</option>
                                     <option <?php if($issue['totalExper'] == 5 ) {?> selected="selected" <?php }?> >5</option>
                                     </select>
                                 </div>
                                 <?php }?>
                             </div>
                         </div>
                     </div>
                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                               <div class="row">
                               <label for="inputissuename" class="col-sm-2 control-label">课题名称</label>
                               <div class="col-sm-8">
                                     <input type="text" class="form-control" id="inputissuename" placeholder="请输入课题名称" name="title" value="<?php echo $issue['title'];?>">
                               </div>
                               </div>
                        </div>
                        <div class="form-group">
                                <div class="row">
                                <label for="inputissueintroduction" class="col-sm-2 control-label">课题介绍</label>
                                <div class="col-sm-8">
                                     <textarea class="form-control" rows="3" input type="text" value=<?php echo $issue['content']; ?> id="inputissueintroduction" placeholder="请填写具体的课题介绍" name="content" ></textarea>
                                 </div>
                                 </div>
                        </div>
                    </div>
                        <div class="button-position" style="margin: 10px auto; width: 200px;">
                            <button class="btn btn-info" type="submit" style="margin: 0px auto; width: 150px;">修改</button>
                        </div>
                </form>
            </div>
            <?php }?>
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

