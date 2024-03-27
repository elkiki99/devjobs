<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;

class FiltrarVacantes extends Component
{
    public $termino;
    public $salario;
    public $categoria;

    public function leerDatosBuscador()
    {
        $this->dispatch('terminosBusqueda', $this->termino, $this->salario, $this->categoria);
    }

    public function render()
    {   
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}