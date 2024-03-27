<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $this->validate();

        if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {
            // Mensaje de error
            session()->flash('error', 'Ya te has postulado a este vacante');
        } else {
            // Almacenar el CV
            $cv = $this->cv->store('public/cv');
            $datos['cv'] = str_replace('public/cv/', '', $cv);

            // Crear el candidato a la vacante
            $this->vacante->candidatos()->create([
                'user_id' => auth()->user()->id,
                'cv' => $datos['cv']
            ]);

            // Obtener el ID de la vacante
            $id_vacante = $this->vacante->id;
            // Obtener el nombre de la vacante
            $nombre_vacante = $this->vacante->titulo;

            // Crear notificación y enviar el email
            $this->vacante->reclutador->notify(new NuevoCandidato($id_vacante, $nombre_vacante, auth()->user()->id));
            
            // Mostrar al usuario un mensaje de éxito
            session()->flash('mensaje', 'Tu curriculum fue enviado correctamente, gracias por postularte');

            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
