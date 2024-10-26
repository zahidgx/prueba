<form method="POST" action="{{ route('students.store') }}" style="max-width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
    @csrf
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; margin-bottom: 5px;">Nombre del producto</label>
        <input id="name" name="name" type="text" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="descripcion" style="display: block; margin-bottom: 5px;">Descripcion</label>
        <textarea id="descripcion" name="descripcion" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="precio" style="display: block; margin-bottom: 5px;">Precio</label>
        <input id="precio" name="precio" type="text" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="stock" style="display: block; margin-bottom: 5px;">Stock</label>
        <input id="stock" name="stock" type="number" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Save</button>
    <a href="{{ route('students.index') }}" style="margin-left: 10px; color: #f44336; text-decoration: none;">Cancel</a>
</form>


