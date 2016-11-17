<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"C:\wamp64\www\tutorAssign\public/../app/index\view\department_head_tutor\matchSetting.html";i:1478622819;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/student.css">
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
                <a href="<?php echo url('DepartmentHeadTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <li><i class="glyphicon glyphicon-user"></i> 学生管理</li>
                <li><i class="glyphicon glyphicon-user"></i> 导师管理</li>
                <li><i class="glyphicon glyphicon-time"></i> 时间设置</li>
                <a href="<?php echo url('DepartmentHeadTutor/matchSetting'); ?>"><li class="active"><i class="glyphicon glyphicon-resize-small"></i> 匹配设置</li></a>
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
                    <p>提示：以下学生未分配到导师，请手动分配或系统智能分配，分配结果请逐一进行确认！</p>
                </div>
                <div class="my-information-title">
                    <span>分配列表</span>
                    <button class="btn btn-info button-size btn-edit" type="submit" style="width: 90px;">智能分配</button>
                </div>
                <div class="my-information-subtitle">
                    <span>为未分配到导师的学生进行导师分配</span>
                </div>

                <div class="table-position">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>学号</th>
                                <th>姓名</th>
                                <th>方向</th>
                                <th>分配操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>031402203</td>
                                <td>陈齐民</td>
                                <td>系统结构</td>
                                <td>
                                    <a href="#" style="text-decoration: none;"><span>可选导师</span></a>
                                    <a href="#" style="text-decoration: none;"><span>确认</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>031402203</td>
                                <td>陈齐民</td>
                                <td>系统结构</td>
                                <td>
                                    <a href="#" style="text-decoration: none;"><span>可选导师</span></a>
                                    <a href="#" style="text-decoration: none;"><span>确认</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>031402203</td>
                                <td>陈齐民</td>
                                <td>系统结构</td>
                                <td>
                                    <a href="#" style="text-decoration: none;"><span>可选导师</span></a>
                                    <a href="#" style="text-decoration: none;"><span>确认</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>031402203</td>
                                <td>陈齐民</td>
                                <td>系统结构</td>
                                <td>
                                    <a href="#" style="text-decoration: none;"><span>可选导师</span></a>
                                    <a href="#" style="text-decoration: none;"><span>确认</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>031402203</td>
                                <td>陈齐民</td>
                                <td>系统结构</td>
                                <td>
                                    <a href="#" style="text-decoration: none;"><span>可选导师</span></a>
                                    <a href="#" style="text-decoration: none;"><span>确认</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>031402203</td>
                                <td>陈齐民</td>
                                <td>系统结构</td>
                                <td>
                                    <a href="#" style="text-decoration: none;"><span>可选导师</span></a>
                                    <a href="#" style="text-decoration: none;"><span>确认</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>031402203</td>
                                <td>陈齐民</td>
                                <td>系统结构</td>
                                <td>
                                    <a href="#" style="text-decoration: none;"><span>可选导师</span></a>
                                    <a href="#" style="text-decoration: none;"><span>确认</span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table> 
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

