<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <a href="{{ route('students.create') }}">Create</a>
                </div>

                <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                    <thead style="background-color: #4CAF50; color: white;">
                        <tr>
                            <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
                            <th style="padding: 12px; border: 1px solid #ddd;">Name</th>
                            <th style="padding: 12px; border: 1px solid #ddd;">Precio</th> <!-- Cambiado de Age a Precio -->
                            <th style="padding: 12px; border: 1px solid #ddd;">Stock</th>  <!-- Nueva columna Stock -->
                            <th style="padding: 12px; border: 1px solid #ddd;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr style="background-color: #f9f9f9;">
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $student->id }}</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $student->name }}</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $student->precio }}</td> <!-- Mostrar Precio -->
                            <td style="padding: 12px; border: 1px solid #ddd;">{{ $student->stock }}</td>  <!-- Mostrar Stock -->
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <a href="{{ route('students.edit', $student->id) }}" style="color: #4CAF50; text-decoration: none;">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Enlaces de paginación -->
                <div class="pagination">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {
        alertify.confirm("¿Estás seguro de que quieres eliminar este estudiante?", function (e) {
            if (e) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = `/students/${id}`;
                form.innerHTML = `@csrf @method('DELETE')`;
                document.body.appendChild(form);
                form.submit();
            } else {
                return false;
            }
        });
    }
</script>
