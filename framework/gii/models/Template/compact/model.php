<?php 
public function attributeLabels()
{
    return array(
    <?php foreach($labels as $name=>$label): ?>
            <?php echo "'$name' => Yii::t('application', '$label'),\n"; ?>
    <?php endforeach; ?>
    );
}   
?>

