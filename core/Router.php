<?php 


require $_SERVER['DOCUMENT_ROOT'] . "/controllers/HomeController.php";

/**
 * Clase Router que maneja el enrutamiento de las solicitudes.
 */
class Router {
    protected const HOME_CONTROLLER = "HomeController"; // Controlador predeterminado si no se encuentra una ruta
    protected $routes = []; // Almacena las rutas definidas

    /**
     * Añade una nueva ruta al enrutador.
     *
     * @param string $uri La URI de la ruta.
     * @param string $cotrollerAction La acción del controlador asociada a la ruta.
     * @return void
     */
    public function add($uri, $cotrollerAction) {
        $this->routes[$uri] = $cotrollerAction;
    }

    /**
     * Despacha la solicitud entrante a la ruta correspondiente.
     *
     * @param string $uri La URI de la solicitud.
     * @return void
     */
    public function dispatch($uri) {
        $uri = parse_url($uri, PHP_URL_PATH); // Extrae la ruta de la URL: http://example.com/path/to/resource?query=param -> /path/to/resource
        
        // Comprueba si la URI solicitada existe en las rutas definidas
        if (array_key_exists($uri, $this->routes)) {
            // Llama al método de acción correspondiente para la URI solicitada
            $this->callAction(
                ...explode("@", $this->routes[$uri])
            );
        } else {
            // Si la URI no está definida en las rutas, llama a una acción predeterminada que generará un error 404
            $this->callAction(self::HOME_CONTROLLER, "NOT_FOUND_404");
        }
    }

    /**
     * Termina la respuesta HTTP con un código de error especificado.
     *
     * @param mixed $controller El controlador que manejará la respuesta.
     * @param string $action El método del controlador que manejará la respuesta.
     * @param int $error_code El código de error HTTP.
     * @return void
     */
    protected function abort_response($controller, $action="http_response", $error_code=404) {
        http_response_code($error_code);
        if (gettype($controller) !== "object") {
            $controller = $this->createControllerInstance($controller);
        }

        $controller->$action($error_code);
        die();
    }

    /**
     * Crea una instancia del controlador especificado.
     *
     * @param string $controller El nombre del controlador.
     * @return object Una instancia del controlador.
     */
    protected function createControllerInstance($controller) {
        $controller = "Controllers\\{$controller}";
        return new $controller;
    }

    /**
     * Llama al método de acción del controlador especificado.
     *
     * @param mixed $controller El controlador.
     * @param string $action El método de acción del controlador.
     * @return mixed El resultado de la acción del controlador.
     */
    protected function callAction($controller, $action) {
        $controller = $this->createControllerInstance($controller);

        // Verifica si el método de acción existe en el controlador
        if (!method_exists($controller, $action)) {
            // Si el método no existe, genera una respuesta de error
            return $this->abort_response($controller);
        }

        // Llama al método de acción del controlador
        return $controller->$action();
    }
}