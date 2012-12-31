<?php
class mbAlias extends CWidget {
public $model = null;
public $source = 'title';
public $target = 'slug';

public function init(){
        if($this->model !== null){
            $this->source = get_class($this->model).'_'.$this->source;
            $this->target = get_class($this->model).'_'.$this->target;
        }
    }
    
    private function publicAssets(){
        $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
        $baseUrl = Yii::app()->getAssetManager()->publish($dir);
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($baseUrl.'/string.toAlias.js');
        $cs->registerScriptFile($baseUrl.'/jquery.mbAlias.js');
        $script = "$('#{$this->source}').mbAlias({target:'#{$this->target}'});";
        $cs->registerScript($this->target,$script, CClientScript::POS_READY);
    }
    public function run(){
        $this->publicAssets();
    }
}
?>