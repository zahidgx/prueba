<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <form method="POST" action="{{ route('students.update', $student->id) }}" style="max-width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                    @csrf
                    @method('PUT')
                    
                    <div style="margin-bottom: 15px;">
                        <label for="name" style="display: block; margin-bottom: 5px;">Nombre del producto</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $student->name) }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="descripcion" style="display: block; margin-bottom: 5px;">Descripcion</label>
                        <textarea id="descripcion" name="descripcion" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">{{ old('descripcion', $student->descripcion) }}</textarea>
                    </div>
                
                    <div style="margin-bottom: 15px;">
                        <label for="precio" style="display: block; margin-bottom: 5px;">Precio</label>
                        <input id="precio" name="precio" type="text" value="{{ old('precio', $student->precio) }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="stock" style="display: block; margin-bottom: 5px;">Stock</label>
                        <input id="stock" name="stock" type="number" value="{{ old('stock', $student->stock) }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                
                    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Update</button>
                    <a href="{{ route('students.index') }}" style="margin-left: 10px; color: #f44336; text-decoration: none;">Cancel</a>
                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>


