<?php
class Usuarios
{
    private static $instancia;
    private $dbh;
 
    private function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=eat-app', 'root', '');
            $this->dbh->exec("SET CHARACTER SET utf8");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
 
    public static function singleton() 
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    // INSERT NEW USER
    public function insert_user($nombre, $correo, $password, $rol)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO users (nombre, correo, password, rol) VALUE(?,?,?,?)");
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $correo);
            $query->bindParam(3, $password);
            $query->bindParam(4, $rol);
           $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET USER
    public function get_user($email, $password)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM users WHERE correo = ? AND password = ?");
            $query->bindParam(1, $email);
            $query->bindParam(2, $password);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET EMAIL
    public function get_email($email)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM users WHERE correo = ?");
            $query->bindParam(1, $email);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // ISERT DATA DONADOR
    public function insert_full_data_user($nombre_e, $nombre_r, $telefono, $estado, $dir, $id_user)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO datos_users (nombre_establecimiento,
                                                                   nombre_responsable,
                                                                   telefono,
                                                                   estado,
                                                                   direccion,
                                                                   id_user) VALUE (?,?,?,?,?,?)");
            $query->bindParam(1, $nombre_e);
            $query->bindParam(2, $nombre_r);
            $query->bindParam(3, $telefono);
            $query->bindParam(4, $estado);
            $query->bindParam(5, $dir);
            $query->bindParam(6, $id_user);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // ISERT DATA ORGANIZATION
    public function insert_full_data_user_organization($razon_social, $cluni, $rfc, $representante, $tipo_organizacion, 
                                          $direccion, $estado, $telefono, $id_user)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO datos_usuarios_organizacion (razon_social,
                                                                   cluni,
                                                                   rfc_osc,
                                                                   representante_legal,
                                                                   tipo_organizacion,
                                                                   direccion,
                                                                   estado,
                                                                   telefono,
                                                                   id_user) VALUE (?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $razon_social);
            $query->bindParam(2, $cluni);
            $query->bindParam(3, $rfc);
            $query->bindParam(4, $representante);
            $query->bindParam(5, $tipo_organizacion);
            $query->bindParam(6, $direccion);
            $query->bindParam(7, $estado);
            $query->bindParam(8, $telefono);
            $query->bindParam(9, $id_user);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET FULL DATA DONADOR
    public function get_full_data_user($id_user)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM datos_users WHERE id_user = ?");
            $query->bindParam(1, $id_user);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET FULL DATA ORGANIZATION
    public function get_full_data_user_organization($id_user)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM datos_usuarios_organizacion WHERE id_user = ?");
            $query->bindParam(1, $id_user);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // UPDATE FULL DATA DONADOR
    public function update_full_data_user($nombre_e, $nombre_r, $telefono, $estado, $dir, $id_user)
    {
        try {
            $query = $this->dbh->prepare("UPDATE datos_users SET nombre_establecimiento = ?,
                                                                 nombre_responsable = ?,
                                                                 telefono = ?,
                                                                 estado = ?, 
                                                                 direccion = ? WHERE id_user = ?");
            $query->bindParam(1, $nombre_e);
            $query->bindParam(2, $nombre_r);
            $query->bindParam(3, $telefono);
            $query->bindParam(4, $estado);
            $query->bindParam(5, $dir);
            $query->bindParam(6, $id_user);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // UPDATE FULL DATA ORGANIZATION
    public function update_full_data_user_organization($razon_social, $cluni, $rfc, 
                                                       $representante, $tipo_organizacion, 
                                                       $direccion, $estado, $telefono, $id_user)
    {
        try {
            $query = $this->dbh->prepare("UPDATE datos_usuarios_organizacion SET razon_social = ?,
                                                                 cluni = ?,
                                                                 rfc_osc = ?,
                                                                 representante_legal = ?,
                                                                 tipo_organizacion = ?,
                                                                 direccion = ?,
                                                                 estado = ?,
                                                                 telefono = ?
                                                                 WHERE id_user = ?");
            $query->bindParam(1, $razon_social);
            $query->bindParam(2, $cluni);
            $query->bindParam(3, $rfc);
            $query->bindParam(4, $representante);
            $query->bindParam(5, $tipo_organizacion);
            $query->bindParam(6, $direccion);
            $query->bindParam(7, $estado);
            $query->bindParam(8, $telefono);
            $query->bindParam(9, $id_user);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // UPDATE DATA DONATION
    public function update_data_ganization($status, $id_donacion)
    {
        try {
            $query = $this->dbh->prepare("UPDATE donaciones SET estado = ? WHERE id = ?");
            $query->bindParam(1, $status);
            $query->bindParam(2, $id_donacion);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // INSERT DONATION
    public function insert_donation($producto, $unidades, $fecha, $causa, $id_user)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO donaciones (producto,
                                                                   unidades_kg,
                                                                   fecha,
                                                                   causa,
                                                                   id_user) VALUE (?,?,?,?,?)");
            $query->bindParam(1, $producto);
            $query->bindParam(2, $unidades);
            $query->bindParam(3, $fecha);
            $query->bindParam(4, $causa);
            $query->bindParam(5, $id_user);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }


// GET DONATION BY ID USER
    public function get_full_data_donation($id_user)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM donaciones WHERE id_user = ?");
            $query->bindParam(1, $id_user);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET DONATION BY ID USER AND STATUS
    public function get_data_success_donation($id_user, $status)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM donaciones WHERE id_user = ? AND estado = ?");
            $query->bindParam(1, $id_user);
            $query->bindParam(2, $status);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET FULL DONATIONS
    public function get_full_donations()
        {
            try {
                $query = $this->dbh->prepare("SELECT * FROM donaciones WHERE estado = 0 AND fecha >= DATE(NOW())");
                $query->execute();
                return $query->fetchAll();
                $this->dbh = null;
            }catch (PDOException $e) {
                $e->getMessage();
            }
        }


    // GET FULL DATA DONACIONES WITH ID
    public function get_data_donaction_by_id($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM donaciones WHERE id = ?");
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET FULL DATA DONACIONES BY ID DONOR
    public function get_data_donaction_by_id_donor($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM datos_users WHERE id_user = ?");
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // INSERT FULL DATA DONACIONES BY ID DONOR
    public function insert_data_programming_donaction($nombre_r, $fecha, $id_donacion, $id_user_d, $id_user_a, $status)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO programacion (nombre_recolector,
                                                                   fecha,
                                                                   id_donacion,
                                                                   id_user_donante,
                                                                   id_user_asociacion,
                                                                   estado) VALUE (?,?,?,?,?,?)");
            $query->bindParam(1, $nombre_r);
            $query->bindParam(2, $fecha);
            $query->bindParam(3, $id_donacion);
            $query->bindParam(4, $id_user_d);
            $query->bindParam(5, $id_user_a);
            $query->bindParam(6, $status);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET FULL DATA DONATION PROGRAMMING BY ID ASOCIATION
    public function get_data_programming_donaction_by_id_asosciation($id_user_a, $status)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM programacion WHERE id_user_asociacion = ? AND estado = ?");
            $query->bindParam(1, $id_user_a);
            $query->bindParam(2, $status);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET FULL DATA DONATION PROGRAMMING BY ID DONATOR
    public function get_data_programming_donaction_by_id_donante($id_user_d, $status)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM programacion WHERE id_user_donante = ? AND estado = ?");
            $query->bindParam(1, $id_user_d);
            $query->bindParam(2, $status);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // UPDATE DATA PROGRAMMING
     public function update_data_programming($status, $id_donacion)
     {
         try {
             $query = $this->dbh->prepare("UPDATE programacion SET estado = ? WHERE id_donacion = ?");
             $query->bindParam(1, $status);
             $query->bindParam(2, $id_donacion);
             $query->execute();
             return $query->fetchAll();
             $this->dbh = null;
         }catch (PDOException $e) {
             $e->getMessage();
         }
     }

    // GET FULL DONATIONS OUT RANGE DATE
    public function get_full_donations_out_range_date_and_not_req()
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM donaciones WHERE estado = 0 AND fecha < DATE(NOW())");
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // GET FULL DATA PROGRAMMING OUT RANGE DATE
    public function get_full_programming_out_range_date_and_not_req()
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM programacion WHERE estado = 0 AND fecha < DATE(NOW())");
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    

}
?>