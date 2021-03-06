<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\datamaster\models\MSprint;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= Url::home()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= Url::home()?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= Url::home()?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= Url::home()?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= Url::home()?>dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?= Url::home()?>img/favicon.ico">
    

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>


<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <div style="display:none;">
    <?php NavBar::begin();NavBar::end(); ?>
    </div>

    <header class="main-header">
        <!-- Logo -->
        <a href="<?= Url::home()?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>M</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Mining</b> Tech</span>
        </a>
        <nav class="navbar navbar-inverse ">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
          <div class="container">
            <ul class="nav navbar-nav">
              
              <?php if(Yii::$app->user->identity != null){ ?>
              
              <div class="input-group margin">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php 
                  if(isset($_SESSION["project"]) && $_SESSION["project"] != 'Default'){
                    echo $_SESSION["project"];
                  } else {
                    echo "Please Select";
                  }
                   ?>
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                  <?php 
                    $sql = "select m.id, m.name from m_modul m, dsis_system_user_menu d where m.id_status = 0 and m.id = d.modul_id and d.user_id = ".Yii::$app->user->id."";
                    $db = Yii::$app->db;
                    $result = $db->createCommand($sql)->queryAll();
                    // var_dump($result);
                    // exit();
                    ?>
                    <?php
                    for ($i=0; $i < sizeof($result); $i++) { 
                       echo "<li><a href=".Url::home()."frontend/m-modul/changemodul?id=".$result[$i]['id'].">".$result[$i]['name']."</a></li>";
                    } 
                    ?>
                    
                  </ul>
              </div>
              <?php } ?>
            </ul>
            
            <ul class='nav navbar-nav navbar-right'>
                <!-- User Account Menu -->
                <?php $user = Yii::$app->user->identity ?>
                <?php if($user != null){ ?>
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="<?= Url::home()?>dist/img/user.jpg" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?= Yii::$app->user->identity->name ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <img src="<?= Url::home()?>dist/img/user.jpg" class="img-circle" alt="User Image">
                      <p>
                        <?= $user->name ?>
                      </p>
                      <p><?php // $user->role_id ?></p>
                      
                    </li>
                    <!-- Menu Body -->
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="<?= Url::home()?>system/dsis-system-user/view-profile?id=<?= $user->id ?>" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?= Url::home()?>site/logout" class="btn btn-default btn-flat">Logout</a>
                      </div>
                    </li>
                  </ul>
                </li>
                <?php } ?>
            </ul>
            <!-- /.navbar-custom-menu -->
          </div>
          <!-- /.container-fluid -->
        </nav>
        <!-- Left side column. contains the logo and sidebar -->
        
    </header>
    <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->

            <ul class="sidebar-menu" data-widget="tree">
              <?php if(Yii::$app->user->identity == null){ ?>
                    <li><a href="<?= Url::home()?>site/login" ><i class="fa fa-sign-in"></i> Login</a></li>
                <?php } ?>
                <?php if(Yii::$app->user->identity != null){ ?>
                  <?php if(Yii::$app->user->identity->role_id == 1) {?>
                      <li class="treeview menu">
                        <a href="#">
                          <i class="fa fa-gears"></i> <span>Pengaturan</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                        <?php if(isset($_SESSION["project"]) && $_SESSION["project"] != 'Default'){ ?>
                          <li><a href="<?= Url::home()?>system/dsis-system-user"><i class="fa fa-user-circle-o"></i> User</a></li>
                          <li><a href="<?= Url::home()?>project/m-modul"><i class="fa fa-cube"></i> Modul</a></li>
                          <li><a href="<?= Url::home()?>system/dsis-system-menu"><i class="fa fa-th-list"></i> Menu</a></li>
                          <li><a href="<?= Url::home()?>project/m-project"><i class="fa fa-clipboard"></i> <span>List Project</span></a></li>
                        <?php } else { ?>
                          <li><a href="<?= Url::home()?>"><i class="fa fa-user-circle-o"></i> User</a></li>
                          <li><a href="<?= Url::home()?>"><i class="fa fa-cube"></i> Modul</a></li>
                          <li><a href="<?= Url::home()?>"><i class="fa fa-th-list"></i> Menu</a></li>
                          <li><a href="<?= Url::home()?>"><i class="fa fa-clipboard"></i> <span>List Project</span></a></li>
                         <?php } ?>
                        </ul>
                      </li>
                      <li class="treeview menu">
                        <a href="#">
                          <i class="fa fa-file"></i> <span>Data Master</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?= Url::home()?>system/m-pic"><i class="fa fa-circle-o"></i> List Developer</a></li>
                          <li><a href="<?= Url::home()?>system/m-aplikasi"><i class="fa fa-circle-o"></i> List Aplikasi</a></li>
                          <li><a href="<?= Url::home()?>system/dsis-system-user-menu"><i class="fa fa-circle-o"></i> Hak Akses</a></li>
                        </ul>
                      </li>
                  <?php } ?>
                    <li class="header">Let's Scrum it!</li>
                    <?php if(isset($_SESSION["project"]) && $_SESSION["project"] != 'Default'){ ?>
                      <li><a href="<?= Url::home()?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                      <li><a href="<?= Url::home()?>backlog"><i class="fa fa-square-o"></i> <span>Back Log</span></a></li>
                      <li><a href="<?= Url::home()?>sprintnow"><i class="fa fa-list-alt"></i> <span>Sprint Now</span></a></li>
                      <li><a href="<?= Url::home()?>confirmation"><i class="fa fa-tasks"></i> <span>Need Confirmation</span></a></li>
                      <li><a href="<?= Url::home()?>done"><i class="fa fa-check-square-o"></i> <span>Done</span></a></li>
                      <li><a href="<?= Url::home()?>board"><i class="fa fa-indent"></i> <span>Scrum Board</span></a></li>
                    <?php } else { ?>
                      <li><a href="<?= Url::home()?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                      <li><a href="<?= Url::home()?>"><i class="fa fa-square-o"></i> <span>Back Log</span></a></li>
                      <li><a href="<?= Url::home()?>"><i class="fa fa-list-alt"></i> <span>Sprint Now</span></a></li>
                      <li><a href="<?= Url::home()?>"><i class="fa fa-tasks"></i> <span>Need Confirmation</span></a></li>
                      <li><a href="<?= Url::home()?>"><i class="fa fa-check-square-o"></i> <span>Done</span></a></li>
                      <li><a href="<?= Url::home()?>"><i class="fa fa-indent"></i> <span>Scrum Board</span></a></li>
                    <?php } ?>
                <?php } ?>
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <!-- <div class="container"> -->
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
          </section>

          <!-- Main content -->
          <section class="content">
            <?= $content ?>
          </section>
          <!-- /.content -->
        <!-- </div> -->
        <!-- /.container -->
    </div>

  
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2019 Mining Technology Dept</strong> All rights
            reserved.
        </div>
    </footer>
</div>

<!-- jQuery 3 -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>