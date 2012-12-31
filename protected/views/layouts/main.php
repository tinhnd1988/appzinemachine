<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main-template.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />


    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cssmobile/mobile.css">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.2.min.js" type="text/javascript"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.foundation.js" type="text/javascript"></script>
    <!-- Included JS Files -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
    <!-- Combine and Compress These JS Files -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.reveal.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.orbit-1.4.0.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.customforms.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.placeholder.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tooltips.js"></script>
    <!-- End Combine and Compress These JS Files -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/appzine.js" type="text/javascript"></script>

    <script>
      $('#testModal').bind('reveal:open reveal:opened reveal:close reveal:closed', function (event) {
        console.log(event);
      });

      $('#fireReveal').click(function (event) {
        event.preventDefault();
        $('#testModal').reveal();
      });

      $('#fireRevealFade').click(function (event) {
        event.preventDefault();
        $('#testModal').reveal({animation: 'fade'});
      });

      $('#fireRevealNone').click(function (event) {
        event.preventDefault();
        $('#testModal').reveal({animation: 'none'});
      });
    </script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div id="header">
        <div class="headerTopleft">
            <div class="logo"><a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"></a></div>
            <div class="topMenu">
                 <ul class="nav-bar">
                    <li><a href="#">Dashboard</a></li>
                    <?php
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'parentid = "0" AND showmenu = "1"';
                    $posts = Post::model()->findAll($criteria) ;
                        foreach ($posts as $post) {
                            $str = Yii::app()->request->url;
                            $temp=substr($str, 6, 20);
                            $urlmenu = $post->id.'-'.$post->slug;
                            $classactive = '';
                            if($temp == $urlmenu){
                                $classactive = "active";
                            }else{
                                $classactive = '';
                            }
                    ?>
                          <li class="<?php echo $classactive; ?>"><a href="/post/<?php echo $post->id.'-'.$post->slug; ?>"><?php echo $post->title; ?></a></li>
                     <?php }
                     ?>
                     <li class="bag"></li>
                </ul>

            </div>
        </div>
        <div class="headerTopright">
            <ul>
                <li><div class="user"></div></li>
                <li>
                    <div class="halign">
                        <div class="userName"><?php echo Yii::app()->user->name; ?></div>
                    </div>
                    <div class="halignPro" style="display:none;">
                         <?php if (Yii::app()->user->isGuest):?>
                            <?php $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                    array('label'=>'Register', 'url'=>array('users/register')),
                                    array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>'Logout', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                ),
                            ));  ?>
                        <?php elseif(Yii::app()->user->role=='Admin'): ?>
                             <?php $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                    array('label'=>'Profile', 'url'=>array('users/view/'.Yii::app()->user->id)),
                                    array('label'=>'Manage Content', 'url'=>array('post/admin')),
                                    array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>'Logout', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                ),
                            )); ?>
                        <?php else: ?>
                             <?php $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                    array('label'=>'Profile', 'url'=>array('users/view/'.Yii::app()->user->id)),
                                    array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>'Logout', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                ),
                            )); ?>
                        <?php endif; ?>
                    </div><!-- end halignPro -->
                </li>
                <li>
                    <div class="question"></div>
                </li>
            </ul>
        </div>
    </div>
    <div class="headerBottom"></div>
   <div id="bodyContainer">
        <?php echo $content; ?>
    </div><!--bodyContainer -->
    <div id="footer">
        <div class="footerContent">
            <p class="webName"> &copy; 2012 AppClover.com</p>
            <p>All Rights Reserved</p>
        </div>
    </div>
</body>
</html>