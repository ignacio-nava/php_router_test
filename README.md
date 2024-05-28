# Router PHP

Este es un proyecto de prueba para implementar un enrutador (router) simple en PHP.

## Descripción

El enrutador PHP proporciona una manera fácil de manejar las solicitudes entrantes y dirigirlas a los controladores adecuados según la URI solicitada.

## Estructura del Proyecto

- **index.php:** Este archivo es el punto de entrada de la aplicación. Aquí se crea una instancia del enrutador y se definen las rutas.
- **controllers/HomeController.php:** Este archivo contiene la definición del controlador `HomeController`, que maneja las acciones relacionadas con las vistas de la página principal, contacto, acerca de, etc.
- **core/Router.php:** Este archivo contiene la implementación del enrutador PHP, que maneja el enrutamiento de las solicitudes.

## Uso

1. Clona el repositorio:

    ```bash
    git clone https://github.com/ignacio-nava/php_router_test.git
    ```

2. Navega al directorio del proyecto:

    ```bash
    cd php_router_test
    ```

3. Ejecuta un servidor PHP local. Puedes usar tu método preferido para iniciar un servidor PHP local en el directorio del proyecto.

4. Abre un navegador web y visita la URL local que corresponda al servidor PHP que has iniciado en el paso anterior para ver la página de inicio.

## Contribución

¡Las contribuciones son bienvenidas! Si encuentras algún problema o tienes alguna sugerencia de mejora, no dudes en abrir un issue o enviar un pull request.

## Autor

- [Ignacio Nava](https://github.com/ignacio-nava)

## Licencia

Este proyecto está bajo la [Licencia MIT](LICENSE).
