<?php

class JsonView extends ApiView {
    public function render($content) {
        header('Content-Type: text/json; charset=utf8');
        header('Content-Type: application/json; charset=utf8');
        if(isset($content['callback'])) echo $content['callback'].'('.json_encode($content).')';
        else echo json_encode($content);
        return true;
    }
}
