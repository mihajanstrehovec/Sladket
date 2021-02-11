<?php

class restViewHelper {

    public static function renderJSON($data,$httpResponseCode = 200) {
        header('Content-Type: application/json');
        http_response_code($httpResponseCode);
        return json_encode($data);
    }




}

?>