<?php
return array(   
    '<lang:[a-z]{2}>'=>'/',    
    '<lang:[a-z]{2}>/<controller:\w+>/<action:\w+>/page/<page:\d+>'=>'<controller>/<action>',
	'<lang:[a-z]{2}>/<controller:\w+>/<id:\d+>'=>'<controller>/view',
	'<lang:[a-z]{2}>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	'<lang:[a-z]{2}>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);
