<?php

function loadModel($model){
    require_once(MODEL_PATH . "/{$model}.php");
}

function loadView($view, $params = array()){

    if(count($params) > 0){
        foreach ($params as $key => $value) {
            if(strlen($key) > 0){
                ${$key} = $value;
            }
        }
    }

    require_once(VIEW_PATH . "/{$view}.php");
}

function loadTemplateView($view, $params = array()){

    if(count($params) > 0){
        foreach ($params as $key => $value) {
            if(strlen($key) > 0){
                ${$key} = $value;
            }
        }
    }

    require_once(TEMPLATE_PATH . "/header.php");
    require_once(TEMPLATE_PATH . "/aside.php");
    require_once(VIEW_PATH . "/{$view}.php");
    require_once(TEMPLATE_PATH . "/footer.php");
}

function renderTitle($title, $subtitle, $icon = null){
    require_once(TEMPLATE_PATH . "/title.php");
}

