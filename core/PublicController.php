<?php

require '../core/View.php';

abstract class PublicController
{
    /**
     * DOC VARIABLE
     * @param string $template
     * @param array $data
     * @return void
     */

    public function render(string $template, array $data = []): void
    {
        $view = new View($template, $data);
        $view->render();
    }
}
