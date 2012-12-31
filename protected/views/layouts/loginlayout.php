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


    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
         <?php echo $content; ?>
</body>
</html>
