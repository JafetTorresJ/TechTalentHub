<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-400 my-3">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-700 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-500  my-3">Empresa: <span class="normal-case font-normal">{{ $vacante->empresa }}</span></p>
            <p class="font-bold text-sm uppercase text-gray-500 my-3">Ultimo dia para postularse: <span class="normal-case font-normal">{{ $vacante->ultimo_dia}}</span></p>
            <p class="font-bold text-sm uppercase text-gray-500 my-3">Categoria: <span class="normal-case font-normal">{{ $vacante->categoria->categoria}}</span></p>
            <p class="font-bold text-sm uppercase text-gray-500 my-3">Salario: <span class="normal-case font-normal">{{ $vacante->salario->salario}}</span></p>
        </div>
        </div>
        <div class="md:grid md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
           <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ 'Imagen vacante' . $vacante->titulo }}">
            </div>
            <div class="md:col-span-4">
               <h2 class="text-2xl font-bold mb-5">Descripcion del Puesto</h2> 
               <p> {{$vacante->descripcion}} </p>
            </div>
        </div>
        @guest
            
       
        <div class="mt-5 bg-gray-700 border-dashed p-5 text-center">
            <p>
                ¿Deseas postularte a esta Vacante? <a class="font-bold text-black-50" href="{{ route('register') }}">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
        @endguest
       @cannot('create', App\Models\Vacante::class)
       <livewire:postular-vacante :vacante="$vacante"/> 
       @endcannot
      

     
    
    </div>

