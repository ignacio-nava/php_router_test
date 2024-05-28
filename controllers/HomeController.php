<?php

namespace Controllers;

/**
 * Clase HomeController que gestiona las vistas relacionadas con la página principal.
 */
class HomeController {
    protected const CONTROLLERS_PATH = "./views/"; // Ruta base de las vistas
    protected const FILE_EXTENSION = ".php"; // Extensión de los archivos de vista

    /**
     * Método para mostrar la vista de la página de inicio.
     *
     * @return void
     */
    public function index() {
        return $this->view(__FUNCTION__); // Llama al método view con el nombre de la función actual
    }

    /**
     * Método para mostrar la vista de la página de contacto.
     *
     * @return void
     */
    public function contact() {
        return $this->view(__FUNCTION__); // Llama al método view con el nombre de la función actual
    }

    /**
     * Método para mostrar la vista de la página "Acerca de".
     *
     * @return void
     */
    public function about() {
        return $this->view(__FUNCTION__); // Llama al método view con el nombre de la función actual
    }

    /**
     * Método para mostrar una vista de respuesta HTTP.
     *
     * @param int $code El código de respuesta HTTP.
     * @return void
     */
    public function http_response($code) {
        return $this->view(__FUNCTION__ . $code); // Llama al método view con el nombre de la función actual y el código HTTP
    }

    /**
     * Método para incluir y mostrar una vista específica.
     *
     * @param string $controller El nombre de la vista a incluir.
     * @return void
     */
    protected function view($controller) {
        $controllerFile = self::CONTROLLERS_PATH; // Ruta base de las vistas
        $controllerFile .= $controller; // Agrega el nombre de la vista
        $controllerFile .= self::FILE_EXTENSION; // Agrega la extensión del archivo de vista
        require $controllerFile; // Incluye el archivo de vista
        return; // Retorna void
    }
}
