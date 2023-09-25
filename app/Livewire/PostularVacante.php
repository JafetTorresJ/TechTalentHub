<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;


    
    use WithFileUploads;
    protected $rules =[
        'cv' => 'required|mimes:pdf'
    ];
    public function mount(Vacante $vacante){
      $this->vacante = $vacante;
    }
    public function postularme(){
        $datos = $this->validate();

        //alamcenar el cv
         
      $cv = $this->cv->store('public/cv');
      $datos['cv'] = str_replace('public/cv/', '', $cv);

        //crear el candidato a la vacante
         
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);


        //crear notificacion y enviar email
          $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));
        //mostrar el usuario un mensaje de ok se envio correctamente la informacion
        session()->flash('mensaje', 'Se envio correctamente tu postulacion, mucha suerte');

        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
