<?php
require_once __DIR__ . '/controllers/UsuarioController.php';

$accion = $_GET['accion'] ?? 'index';
$controller = new UsuarioController();

switch ($accion) {
    case 'index':
        $controller->index();
        break;
    case 'crear':
        $controller->crear();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    default:
        $controller->index();
        break;
}