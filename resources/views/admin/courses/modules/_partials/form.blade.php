@csrf

@include('admin.includes.alerts')

<div class="">
    <label class="block text-sm text-gray-600" for="name">Nome *</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"  placeholder="Seu nome" aria-label="Name" value="{{ $module->name ?? old('name') }}">
</div>

<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Enviar</button>
</div>
