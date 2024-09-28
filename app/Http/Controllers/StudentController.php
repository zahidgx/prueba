<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); 
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
        'age' => 'required|integer',
    ]);

    Student::create($request->all()); // Método de creación masiva

    return redirect()->route('students.index')->with('success', 'Estudiante creado exitosamente.');
}

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
{
    $student = Student::findOrFail($id); // Asegúrate de que sea findOrFail
    return view('students.edit', compact('student'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
    ]);

    $student = Student::findOrFail($id); // Asegúrate de que sea findOrFail
    $student->name = $request->name;
    $student->age = $request->age;
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
