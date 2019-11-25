<?php
    class Select {
        private $name;
        private $value;
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getName(){
            return $this->name;
        }
    
        public function setValue($value){
            if (!is_array($value)){
                die ("Erro: a variável não é um array.");
            }
            $this->value = $value;
        }
    
        public function getValue(){
            return $this->value;
        }
    
        private function buildSelect($value){
            foreach($value as $v){
                echo '<option value="' . $v["id"] . '">' . $v["descricao"] . "</option>\n";
            }
        }
    
        public function makeSelect(){
            echo '<select class="form-control" name="' .$this->getName(). '">\n';
            $this->buildSelect($this->getValue());
            echo "</select>" ;
        }
    }
?>