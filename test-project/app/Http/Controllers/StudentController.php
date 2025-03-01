<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $allStudents = Student::get();

        return response()->json([
            'all Students' => $allStudents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date|before:today',
        ]);
        $newStudent = Student::create($validated);

        return response()->json([
            'message' => 'new Student added successfully',
            'new Student added' => $newStudent,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $findStudent = Student::findOrFail($id);

        return response()->json([
            'individual Student' => $findStudent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => "required|email|unique:students,email,{$id}",
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date|before:today',
        ]);

        $findStudent = Student::findOrFail($id);

        $findStudent->update($validated);

        return response()->json([
            'message' => 'Student updated successfully',
            'new Student added' => $findStudent,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $findStudent = Student::find($id);

        $findStudent->delete();

        return response()->json([
            'message' => ' Student deleted successfully',
            'new Student deleted' => $findStudent,
        ]);
    }
}
