<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;

class HomeVacantes extends Component
{
    protected $listeners = ['terminosBusqueda' => 'buscar'];
    public $termino;
    public $salario;
    public $categoria;

    public function buscar($termino, $salario, $categoria)
    {   
        $this->termino = $termino;
        $this->salario = $salario;
        $this->categoria = $categoria;
    }

    public function render()
    {
        //$vacantes = Vacante::all();
 
        $vacantes = Vacante::when($this->termino, function($query) {
            $query->where( 'titulo','LIKE', "%" . $this->termino . "%" );
        })
        ->when($this->categoria, function($query) {
            if($this->categoria !== '-- Seleccione --')
            $query->where('categoria_id',$this->categoria);
        })
        ->when($this->salario, function($query) {
            if($this->salario !== '-- Seleccione --')
            $query->where('salario_id',$this->salario);
        })
        ->paginate(10);
        
        return view('livewire.home-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
 
}

