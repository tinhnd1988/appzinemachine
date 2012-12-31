<?php 
public function actionUploadedImages()
{
    $images = array();
 
    $handler = opendir(Yii::app()->basePath.'/../images');
 
    while ($file = readdir($handler))
    {
        if ($file != "." && $file != "..")
            $images[] = $file;
    }
    closedir($handler);
 
    $jsonArray=array();
 
    foreach($images as $image)
        $jsonArray[]=array(
            'thumb'=>Yii::app()->baseUrl.'/images/'.$image,
            'image'=>Yii::app()->baseUrl.'/images/'.$image
        );
 
    header('Content-type: application/json');
    echo CJSON::encode($jsonArray);
}
?>