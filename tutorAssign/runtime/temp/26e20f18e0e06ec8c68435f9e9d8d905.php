<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:103:"C:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office_tutor\modify.html";i:1481174498;}*/ ?>
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
                <img src="<?php echo OLD; ?>/image/mainpage-logo.png" alt="" width="240">
            </div>
            <ul class="sider-navbar-nav">
                <a href="<?php echo url('TeachingOfficeTutor/index'); ?>"><li class="active"><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <li><i class="glyphicon glyphicon-th-list"></i> 管理系负责人</li>
                <a href="<?php echo url('TeachingOfficeTutor/tutor_change'); ?>"><li><i class="glyphicon glyphicon-pencil"></i> 导师分配情况</li></a>
                <a href="<?php echo url('TeachingOfficeTutor/student_assign'); ?>"><li><i class="glyphicon glyphicon-ok"></i> 学生分配情况</li></a>
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
                    <p>提示：您可以查看选课结果！</p>
                </div>
                <div class="my-information-title">
                    <span>我的信息</span>
                </div>
                <div class="my-information-subtitle">
                    <span>您可以在这里修改自己的个人信息</span>
                </div>
                

                <form role="form" action="<?php echo url('TeachingOfficeTutor/saveModify'); ?>" name="modify" method="post" enctype="multipart/form-data" onsubmit="return checkall()">
                      <div class="form-group my-modify-detail">
                        <div class="pw-title"><span>旧密码：</span></div>
                        <div class="pw-modify"><input type="password" name="oldPassword" class="form-control-1 pw-form-width" id="oldPassword" placeholder="旧密码" value=""><p id="oldPwWrong" style="font-size: 12px;float: right;padding-right: 48px;padding-top: 8px;display: none;color: red;">*旧密码输入错误</p></div>
                      </div>
                      <div class="form-group pw-position my-modify-detail">
                        <div class="pw-title"><span>新密码：</span></div>
                        <div class="pw-modify"><input type="password" name="newPassword" class="form-control-1 pw-form-width" id="newPassword" placeholder="新密码"><p id="passwordSame" style="font-size: 12px;float: right;padding-right: 0px;padding-top: 8px;display: none;color: red;">*新密码与旧密码不能相同</p></div>
                      </div>
                      <div class="form-group  pw-position my-modify-detail">
                        <div class="pw-title"><span>确认密码：</span></div>
                        <div class="pw-modify"><input type="password" name="newPasswordConfirm" class="form-control-1 pw-form-width" id="newPasswordConfirm" placeholder="新密码"><p id="newPw" style="font-size: 12px;float: right;padding-right: 48px;padding-top: 8px;display: none;color: red;">*请输入确认密码</p><p id="newPwConfirmWrong" style="font-size: 12px;float: right;padding-right: 36px;padding-top: 8px;display: none;color: red;">*两次密码输入不同</p></div>
                      </div>
                      <div class="form-group my-modify-detail">
                        <div class="tel-title"><span>联系方式：</span></div>
                        <div class="pw-modify"><input type="text" name="telephone" class="form-control-1 pw-form-width" id="telephone" placeholder="联系方式" value="<?php echo $user['telephone']; ?>"><p id="telWrong" style="font-size: 12px;float: right;padding-right: 36px;padding-top: 8px;display: none;color: red;">*联系方式格式错误</p></div>
                      </div>
                      <div class="form-group my-modify-detail">
                        <div class="email-title"><span>邮&nbsp;&nbsp;&nbsp;箱：</span></div>
                        <div class="pw-modify"><input type="email" name="email" class="form-control-1 pw-form-width" id="exampleInputEmail1" placeholder="邮箱" value="<?php echo $user['email']; ?>"></div>
                      </div>
                      
                      <div class="modify-btn-position">
                        <button type="submit" id="modifyConfirm" class="btn btn-info button-size" disabled="true" style="margin-top: 50px;">确认</button>
                      </div>
                      <div class="avator-positon">
                          <input type="file" id="avator" name="avator" class="fileInput" style="cursor: pointer;">
                          <?php if($user['avatorIsEmpty'] == 0): ?>
                            <img src="<?php echo COMMON_PATH; ?><?php echo $user['avator']; ?>" id="avatorPre" class="avatorPre" style="cursor: pointer;">
                          <?php elseif($user['avatorIsEmpty'] == 1): ?>
                            <img src="<?php echo OLD; ?>/image/defaultAvator.png" class="avatorPre">
                          <?php endif; ?>
                      </div>
                </form>
                <div class="return-btn-position"><a href="<?php echo url('TeachingOfficeTutor/index'); ?>"><button class="btn btn-info button-size" type="submit" style="margin-top: 50px;">返回</button></a></a></div>


            </div>
            <div class="footer"  style="border-radius: 10px;">
                Designed by Lin & 我说的都队
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo OLD; ?>/js/index.js"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/backstage.js"></script>

<script type="text/javascript">
    $("#avator").change(function(){
        var avatorURL = getAvatorURL(this.files[0]);
        console.log("avatorURL = "+avatorURL);
        if (avatorURL) {
            $("#avatorPre").attr("src",avatorURL);
        }
    })
    function getAvatorURL(file) {
         var url = null ; 
         if (window.createObjectURL!=undefined) { // basic
          url = window.createObjectURL(file) ;
         } else if (window.URL!=undefined) { // mozilla(firefox)
          url = window.URL.createObjectURL(file) ;
         } else if (window.webkitURL!=undefined) { // webkit or chrome
          url = window.webkitURL.createObjectURL(file) ;
         }
         return url ;
    }
</script>

<script type="text/javascript">

$("#oldPassword").change(function(){
    oldPW = $("#oldPassword").val();
    $.post("<?php echo PREFIX; ?>/TeachingOfficeTutor/oldPasswordConfirm",
    {
        oldPW: oldPW
    },
        function(data,status) {
            console.log(data);
            if (data == false) {
                $("#oldPwWrong").css("display","block");
                document.getElementById("modifyConfirm").disabled=true;
            }
            if (data == true) {
                $("#oldPwWrong").css("display","none");
                document.getElementById("modifyConfirm").disabled=false;
            }
        }
    );
})

$("#newPasswordConfirm").focus(function(){
    oldPW = $("#oldPassword").val();
    newPW = $("#newPassword").val();
    if (oldPW == newPW) {
        $("#passwordSame").css("display","block");
    }
    if (oldPW != newPW) {
        $("#passwordSame").css("display","none");
    }
})

    function checkall() {

        if (modify.oldPassword.value =="") {
            alert("请输入旧密码！");
            modify.oldPassword.focus();
            return false;
        }
        
        if (modify.newPassword.value != "" && modify.newPasswordConfirm.value == "") {
            $("#newPw").css("display","block");
            modify.newPasswordConfirm.focus();
            return false;
        }

        if (modify.newPassword.value != "" && modify.newPasswordConfirm.value != "") {
            $("#newPw").css("display","none");
            if (modify.newPassword.value != modify.newPasswordConfirm.value) {
                $("#newPwConfirmWrong").css("display","block");
                return false;
            }
        }

        telength = $('#telephone').val();

        if (telength.length != 11) {
            $("#telWrong").css("display","block");
            return false;
        }

        return true;
    }
</script>
</body>
</html>


