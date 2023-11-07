<?php
    class Vuelta{
        private $id;
        private $tiempo;

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
    }
?>