<div class="bg-gray-500 p-5 mt-10 flex--col justify-center items-center">
    {{-- Because she competes with no one, no one can compete with her. --}}
<h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>
@if (session()->has('mensaje'))
  <div class="uppercase border border-green-600 bg-green-200 text-green-600 font-bold p-2 my-5 text-sm">
    {{ session('mensaje') }}
  </div>
  @else
  <form wire:submit.prevent='postularme' class="w-96 mt-5">
    <div class="mb-4">
      <label for="cv" :value="__('Curriculum o Hoja de vida (PDF)')" >
      <input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full"/>
    </div>
    <x-input-error :messages="$errors->get('cv')" class="mt-2" />
    <x-primary-button class="my-5">
      Postularme
    </x-primary-button>
</form>
@endif

</div>
