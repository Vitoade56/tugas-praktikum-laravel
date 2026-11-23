<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|max:20|unique:students,nim',
            'nama' => 'required|max:100',
            'jurusan' => 'required|max:100',
            'alamat' => 'required|max:255',
        ]);

        Student::create($data);

        return redirect('/students')->with('success', 'Data student berhasil ditambahkan');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'nim' => 'required|max:20|unique:students,nim,'.$student->id,
            'nama' => 'required|max:100',
            'jurusan' => 'required|max:100',
            'alamat' => 'required|max:255',
        ]);

        $student->update($data);

        return redirect('/students')->with('success', 'Data student berhasil diubah');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/students')->with('success', 'Data student berhasil dihapus');
    }
}