<?php

class View
{
    private string $template;
    private array $data;


    public function __construct(string $template, array $data = [])
    {
        $this->template = $template;
        $this->data = $this->cleanData($data);
    }

    public function render(): void
    {
        // Extraction des clés du tableau en variables
        extract($this->data);

        ob_start(); // démarrage du tampon
        require '../views/' . $this->template;
        $bodyContent = ob_get_clean(); // Récupération du contenu executé en mémoire tampon

        require '../views/layout.html.php';
    }

    // fonction récursive pour appliquer htmlspecialchars()
    private function cleanData(array $data)
    {
        return array_map(function ($value) {
            if (is_array($value)) {
                return $this->cleanData($value);
            } else if (is_object($value) || is_null($value)) {
                return $value;
            } else {
                return htmlspecialchars($value);
            }
        }, $data);
    }
}
