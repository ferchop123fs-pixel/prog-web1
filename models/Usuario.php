<?php
class Usuario {
    private $conn;
    private $table = "usuarios";

    public $id_usuario;
    public $id_rol;
    public $nombre;
    public $apellido;
    public $correo;
    public $usuario;
    public $contrasena_hash;
    public $telefono;
    public $estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT u.*, r.nombre_rol FROM " . $this->table . " u
                INNER JOIN roles r ON u.id_rol = r.id_rol
                ORDER BY u.id_usuario DESC";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create() {
        $sql = "INSERT INTO " . $this->table . " (id_rol, nombre, apellido, correo, usuario, contrasena_hash, telefono, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssssss", $this->id_rol, $this->nombre, $this->apellido, $this->correo, $this->usuario, $this->contrasena_hash, $this->telefono, $this->estado);
        return $stmt->execute();
    }

    public function update() {
        $sql = "UPDATE " . $this->table . " SET id_rol=?, nombre=?, apellido=?, correo=?, usuario=?, telefono=?, estado=? WHERE id_usuario=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issssssi", $this->id_rol, $this->nombre, $this->apellido, $this->correo, $this->usuario, $this->telefono, $this->estado, $this->id_usuario);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}