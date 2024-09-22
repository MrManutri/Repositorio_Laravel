<?php


class Animal {
  
    private $nombre;
    
    // Constructor para inicializar atributos
    public function __construct($nombre) {
        $this->nombre = $nombre;
    }
    
    // Método público para obtener el nombre
    public function getNombre() {
        return $this->nombre;
    }
    
    // Método protegido para ser sobrescrito en clases hijas
    protected function emitirSonido() {
        return "Hace un sonido";
    }
    
    // Método público que usa el método protegido
    public function hacerSonido() {
        return $this->emitirSonido();
    }
}

// Herencia
class Perro extends Animal {
    // Sobrescribir el método protegido
    protected function emitirSonido() {
        return "Ladra";
    }
}

class Gato extends Animal {
    // Sobrescribir el método protegido
    protected function emitirSonido() {
        return "Maúlla";
    }
}


function hacerSonarAnimal(Animal $animal) {
    echo $animal->getNombre() . " " . $animal->hacerSonido() . "<br>";
}


$perro = new Perro("Rex");
$gato = new Gato("Miau");

// Usar los objetos y métodos
hacerSonarAnimal($perro);
hacerSonarAnimal($gato);

?>
