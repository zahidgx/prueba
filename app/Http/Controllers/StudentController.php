<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(3); 
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000', // Validación para descripción
            'precio' => 'required|numeric',
            'stock' => 'required|integer',   
        ]);

        Student::create($request->all()); 

        return redirect()->route('students.index')->with('success', 'Estudiante creado exitosamente.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id); 
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000', // Validación para descripción
            'precio' => 'required|numeric',  
            'stock' => 'required|integer',  
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->descripcion = $request->descripcion; // Actualizar descripción
        $student->precio = $request->precio; 
        $student->stock = $request->stock;  
        $student->save();

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}



