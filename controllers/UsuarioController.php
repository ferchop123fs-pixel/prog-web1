<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $db;
    private $usuario;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    public function index() {
        $result = $this->usuario->getAll();
        require __DIR__ . '/../views/usuarios/index.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->id_rol = $_POST['id_rol'];
            $this->usuario->nombre = $_POST['nombre'];
            $this->usuario->apellido = $_POST['apellido'];
            $this->usuario->correo = $_POST['correo'];
            $this->usuario->usuario = $_POST['usuario'];
            $this->usuario->contrasena_hash = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
            $this->usuario->telefono = $_POST['telefono'];
            $this->usuario->estado = $_POST['estado'];

            if ($this->usuario->create()) {
                header('Location: index.php?accion=index');
                exit;
            } else {
                echo "Error al crear usuario";
            }
        } else {
            require __DIR__ . '/../views/usuarios/crear.php';
        }
    }

    public function editar() {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->id_usuario = $id;
            $this->usuario->id_rol = $_POST['id_rol'];
            $this->usuario->nombre = $_POST['nombre'];
            $this->usuario->apellido = $_POST['apellido'];
            $this->usuario->correo = $_POST['correo'];
            $this->usuario->usuario = $_POST['usuario'];
            $this->usuario->telefono = $_POST['telefono'];
            $this->usuario->estado = $_POST['estado'];

            if ($this->usuario->update()) {
                header('Location: index.php?accion=index');
                exit;
            } else {
                echo "Error al actualizar usuario";
            }
        } else {
            $datos = $this->usuario->getById($id);
            require __DIR__ . '/../views/usuarios/editar.php';
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->usuario->delete($id);
        header('Location: index.php?accion=index');
        exit;
    }
}