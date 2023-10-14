<?php

class mysql
{
    private $host = 'localhost';    // Host de la base de datos
    private $user = 'root';         // Usuario de la base de datos
    private $password = '';         // Contraseña de la base de datos
    private $db = 'apiweb';         // Nombre de la base de datos
    private $connection;            // Objeto de conexión a la base de datos

    public function __construct($host, $user, $password, $db)
    {
        // Constructor de la clase que permite especificar los datos de conexión
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
        $this->connect();  // Llama a la función de conexión al construir la instancia
    }

    private function connect()
    {
        // Función privada para establecer la conexión a la base de datos
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);

        if ($this->connection->connect_error) {
            die("Connection Error: " . $this->connection->connect_error);
        }
    }

    public function close()
    {
        // Cierra la conexión a la base de datos
        $this->connection->close();
    }

    public function selectQuery($id)
    {
        try {
            $this->connect();  // Abre la conexión

            // Construye la consulta SELECT con un posible filtro por ID
            $sql = ($id === null) ? "SELECT * FROM users ORDER BY id DESC" : "SELECT * FROM users WHERE id='$id'";
            $result = $this->connection->query($sql);

            if ($result) {
                $data = array();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                    echo json_encode($data);
                } else {
                    echo json_encode(['message' => 'No results found']);
                }
            } else {
                die("Query Error: " . $this->connection->error);
            }
        } catch (\Throwable $th) {
            die("Query Error: " . $this->connection->error);
        } finally {
            // $this->close();
        }
    }

    public function insertQuery()
    {
        try {
            $this->connect();  // Abre la conexión

            $data = json_decode(file_get_contents('php://input'), true);

            if ($data) {
                $name = $data['name'];
                $email = $data['email'];

                // Construye la consulta de inserción
                $sql = "INSERT INTO users (NAME, email) VALUES('$name','$email') ;";
                $result = $this->connection->query($sql);

                if ($result) {
                    $data['id'] = $this->connection->insert_id;
                    echo json_encode($data);
                }
            } else {
                echo json_encode(array(['error' => 'Error Creating User']));
            }
        } catch (\Throwable $th) {
            echo json_encode(array(['error' => 'Error Creating User']));
        } finally {
            // $this->close();
        }
    }

    public function deleteQuery($id)
    {
        try {
            $this->connect();  // Abre la conexión

            // Construye la consulta de eliminación
            $sql = "DELETE FROM users WHERE id = $id;";

            $result = $this->connection->query($sql);

            if ($result && $this->connection->affected_rows > 0) {
                echo json_encode(array(['message' => 'User Deleted Successfully']));
            } else {
                echo json_encode(array(['error' => 'Error Deleting User']));
            }
        } catch (\Throwable $th) {
            die("Query Error: " . $this->connection->error);
        } finally {
            // $this->close();
        }
    }

    public function updateQuery($id)
    {
        try {
            $this->connect();  // Abre la conexión

            $data = json_decode(file_get_contents('php://input'), true);

            if ($data) {
                $name = $data['name'];
                $email = $data['email'];

                // Construye la consulta de actualización
                $sql = "UPDATE users SET NAME= '$name', email = '$email' WHERE id = '$id';";

                $result = $this->connection->query($sql);

                if ($result && $this->connection->affected_rows > 0) {
                    echo json_encode(array(['message' => 'User Updated Successfully']));
                } else {
                    echo json_encode(array(['error' => 'Error Updating User']));
                }
            } else {
                echo json_encode(array(['error' => 'Error Updating User']));
            }
        } catch (\Throwable $th) {
            die("Query Error: " . $this->connection->error);
        } finally {
            // $this->close();
        }
    }
}
