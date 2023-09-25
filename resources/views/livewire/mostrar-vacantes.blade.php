<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ( $vacantes as $vacante)
         <div class="p-6 text-gray-900 dark:text-gray-200 md:flex md:justify-between md:items-center">
        <div class="leading-10">
       <a href="{{ route('vacantes.show', $vacante->id)}}"  class="text-xl font-bold">
        {{ $vacante->titulo }}
       </a>
       <p class="text-sm text-gray-400 font-bold">{{ $vacante->empresa }}</p>
      <p class="text-sm text-gray-500">Ultimo dia para postularse: {{ $vacante->ultimo_dia }}</p>    
    </div>

    <div class="flex flex-col md:flex-row items-stretch gap-3  mt-5 md:mt-0">
        <a href="{{ route('candidatos.index', $vacante)}}" class=" text-center bg-gray-500 py-2 px-4 rounded-lg text-white text-xs font-bold"> {{$vacante->candidatos->count()}} Candidatos</a>
        <a href="{{ route('vacantes.edit', $vacante->id)}}" class="text-center bg-blue-500 py-2 px-4 rounded-lg text-white text-xs font-bold">Editar</a>
        <button wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }})" class="text-center bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold">Eliminar</button>
    </div>
    </div>
    @empty
    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
    @endforelse
   
    <div class="mt-10 mb-3">
        {{ $vacantes->links() }}
    </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
    <script>
        document.addEventListener('livewire:initialized', () => {
 
            Livewire.on('mostrarAlerta', (vacanteId) => {
                Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "una vacante eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    // eliminar la vacante desd el servidor
                    Livewire.dispatch('eliminarVacante', {vacante: vacanteId})
                    Swal.fire(
                    'Eliminado!',
                    'La vacante ha sido eliminada',
                    'success'
                    )
                }
                })
            })
        })
    </script>
@endpush

