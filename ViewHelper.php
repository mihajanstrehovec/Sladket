<?php

class ViewHelper {

    //Displays a given view and sets the $variables array into scope.
    public static function render($layout, $file, $variables = array()) {
        extract($variables);

        ob_start();
        include($layout);
        include($file);
        
        return ob_get_clean();
    }


    // Renderiranje artikla, kjer potrebujemo dodaten variable
    public static function renderArtikel($layout, $file, $variables = array(), $variables2 = array()) {
        extract($variables);

        ob_start();
        include($layout);
        include($file);
        
        return ob_get_clean();
    }


    // Renderiranje errorja, ki poskrbi za popup modala z vsebovanim msg sporočilom (pri nalaganju slik)
    public static function error($error, $msg) {
        extract($msg);

        ob_start();
        
        include($error);
        
        return ob_get_clean();
    }

    // Renderiranje errorja, ki poskrbi za prikaz rdečega teksta na obrazcu ob napaki (vpis, registracija...)
    public static function renderRegError($layout, $file, $variables = array(), $err) {
        extract($variables);

        ob_start();
        include($layout);
        include($file);
        
        return ob_get_clean();
    }


    // Renderiranje naročila, kjer potrebujem dodaten variabel
    public static function renderNarocila($layout, $file, $narocila = array(), $imenaNarocil = array()) {
        #extract($variables);

        ob_start();
        include($layout);
        include($file);
        
        return ob_get_clean();
    }

    // Redirects to the given URL
    public static function redirect($url) {
        header("Location: " . $url);
    }

    // Displays a simple 404 message
    public static function error404() {
        header('This is not the page you are looking for', true, 404);
        $html404 = sprintf("<!doctype html>\n" .
                "<title>Error 404: Page does not exist</title>\n" .
                "<h1>Error 404: Page does not exist</h1>\n" .
                "<p>The page <i>%s</i> does not exist.</p>", $_SERVER["REQUEST_URI"]);

        echo $html404;
    }

}
