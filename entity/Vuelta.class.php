<?php
    class Vuelta{
        private $id_v;
        private $tiempo;
        private $n_vuelta;
        private $id_corredor;

        /**
         * Get the value of id
         */ 
        public function getid_v()
        {
                return $this->id_v;
        }

        /**
         * Set the value of id_v
         *
         * @return  self
         */ 
        public function setid_v($id_v)
        {
                $this->id_v = $id_v;

                return $this;
        }

        /**
         * Get the value of tiempo
         */ 
        public function getTiempo()
        {
                return $this->tiempo;
        }

        /**
         * Set the value of tiempo
         *
         * @return  self
         */ 
        public function setTiempo($tiempo)
        {
                $this->tiempo = $tiempo;

                return $this;
        }

        /**
         * Get the value of id_corredor
         */ 
        public function getId_corredor()
        {
                return $this->id_corredor;
        }

        /**
         * Set the value of id_corredor
         *
         * @return  self
         */ 
        public function setId_corredor($id_corredor)
        {
                $this->id_corredor = $id_corredor;

                return $this;
        }

        /**
         * Get the value of n_vuelta
         */ 
        public function getN_vuelta()
        {
                return $this->n_vuelta;
        }

        /**
         * Set the value of n_vuelta
         *
         * @return  self
         */ 
        public function setN_vuelta($n_vuelta)
        {
                $this->n_vuelta = $n_vuelta;

                return $this;
        }
    }
?>