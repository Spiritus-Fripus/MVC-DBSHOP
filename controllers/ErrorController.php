<?php

class ErrorController
{

    public function notFound(): void
    {
        http_response_code(404);

        $template = '../views/error/not-found.html.php';
        require '../views/layout.html.php';
    }

}
