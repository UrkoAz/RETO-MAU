<?php
    class Corredor{
        private $id;
        private $nombre;
        private $apellido;
        private $usuario;
        private $contrasena;
        private $huella;
        private $equipo_id;
        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of apellido
         */ 
        public function getApellido()
        {
                return $this->apellido;
        }

        /**
         * Set the value of apellido
         *
         * @return  self
         */ 
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
        }
        
        /**
         * Get the value of usuario
         */ 
        public function getUsuario()
        {
                return $this->usuario;
        }

        /**
         * Set the value of usuario
         *
         * @return  self
         */ 
        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        /**
         * Get the value of contrasena
         */ 
        public function getContrasena()
        {
                return $this->contrasena;
        }

        /**
         * Set the value of contrasena
         *
         * @return  self
         */ 
        public function setContrasena($contrasena)
        {
                $this->contrasena = $contrasena;

                return $this;
        }

        /**
         * Get the value of huella
         */ 
        public function getHuella()
        {
                return $this->huella;
        }

        /**
         * Set the value of huella
         *
         * @return  self
         */ 
        public function setHuella($huella)
        {
                $this->huella = $huella;

                return $this;
        }

        /**
         * Get the value of equipo_id
         */ 
        public function getEquipo_id()
        {
                return $this->equipo_id;
        }

        /**
         * Set the value of equipo_id
         *
         * @return  self
         */ 
        public function setEquipo_id($equipo_id)
        {
                $this->equipo_id = $equipo_id;

                return $this;
        }
    }
?>