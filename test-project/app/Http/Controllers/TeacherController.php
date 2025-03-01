<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allTeachers = Teacher::get();

        return response()->json([
            'all teachers' => $allTeachers,
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
        $newTeacher = Teacher::create($validated);

        return response()->json([
            'message' => 'new teacher added successfully',
            'new teacher added' => $newTeacher,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $findTeacher = Teacher::findOrFail($id);

        return response()->json([
            'individual teacher' => $findTeacher,
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
            'email' => 'required|email',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date|before:today',
        ]);

        $findTeacher = Teacher::findOrFail($id);

        $findTeacher->update($validated);

        return response()->json([
            'message' => 'teacher updated successfully',
            'new teacher added' => $findTeacher,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $findTeacher = Teacher::find($id);

        $findTeacher->delete();

        return response()->json([
            'message' => ' teacher deleted successfully',
            'new teacher deleted' => $findTeacher,
        ]);
    }
}
