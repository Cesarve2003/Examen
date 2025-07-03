<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Formulario de Producto Agrícola</h2>

    <form wire:submit.prevent="guardar" class="space-y-4">
        <div>
            <label>Nombre*</label>
            <input type="text" wire:model="nombre" class="w-full border rounded p-2">
            @error('nombre') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Variedad</label>
            <input type="text" wire:model="variedad" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Origen*</label>
            <input type="text" wire:model="origen" class="w-full border rounded p-2">
            @error('origen') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Fecha de Cosecha*</label>
            <input type="date" wire:model="fecha_cosecha" class="w-full border rounded p-2">
            @error('fecha_cosecha') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Peso (kg)*</label>
            <input type="number" step="0.01" wire:model="peso" class="w-full border rounded p-2">
            @error('peso') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Precio por kilo*</label>
            <input type="number" step="0.01" wire:model="precio_kilo" class="w-full border rounded p-2">
            @error('precio_kilo') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Calidad*</label>
            <select wire:model="calidad" class="w-full border rounded p-2">
                <option value="primera">Primera</option>
                <option value="segunda">Segunda</option>
                <option value="tercera">Tercera</option>
            </select>
            @error('calidad') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="bg-green-600 text-black  *:">Guardar</button>
        </div>
    </form>

    <hr class="my-6">

    <h2 class="text-xl font-bold mb-4">Productos Registrados</h2>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Nombre</th>
                <th class="py-2 px-4 border">Variedad</th>
                <th class="py-2 px-4 border">Origen</th>
                <th class="py-2 px-4 border">Fecha de Cosecha</th>
                <th class="py-2 px-4 border">Peso (kg)</th>
                <th class="py-2 px-4 border">Precio/kg</th>
                <th class="py-2 px-4 border">Calidad</th>
                <th class="py-2 px-4 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td class="py-2 px-4 border">{{ $producto->id }}</td>
                    <td class="py-2 px-4 border">{{ $producto->nombre }}</td>
                    <td class="py-2 px-4 border">{{ $producto->variedad }}</td>
                    <td class="py-2 px-4 border">{{ $producto->origen }}</td>
                    <td class="py-2 px-4 border">{{ $producto->fecha_cosecha }}</td>
                    <td class="py-2 px-4 border">{{ $producto->peso }}</td>
                    <td class="py-2 px-4 border">{{ $producto->precio_kilo }}</td>
                    <td class="py-2 px-4 border">{{ $producto->calidad }}</td>
                    <td class="py-2 px-4 border">
                        <button wire:click="eliminar({{ $producto->id }})" class="bg-red-500 text-black px-4 py-2 rounded">
                            Eliminar
                        </button>
                        <button wire:click="editar({{ $producto->id }})" class="bg-yellow-500 text-black px-4 py-2 rounded ml-2">
                           Editar
                         </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
