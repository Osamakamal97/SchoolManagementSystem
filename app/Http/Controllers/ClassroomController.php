<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classrooms\{StoreClassroomRequest, UpdateClassroomRequest};
use App\Models\{Classroom, Grade};
use Exception;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        $grades = Grade::all();
        return view('classrooms.index', compact(['classrooms', 'grades']));
    }

    public function gradeFilter(Request $request)
    {
        $classrooms = Classroom::where('grade_id', $request->grade_id)->get();
        $grades = Grade::all();
        return view('classrooms.index', compact(['classrooms', 'grades']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassroomRequest $request)
    {
        try {
            $classrooms_list = $request->classrooms_list;
            foreach ($classrooms_list as $room) {
                $classroom = new Classroom();
                $classroom->name = ['ar' => $room['name'], 'en' => $room['name_en']];
                $classroom->grade_id = $room['grade_id'];
                $classroom->save();
            }
            toastr()->success(__('messages.success'));
            return redirect()->route('classrooms.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage(), 'exception_error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        try {
            $classroom->update([
                $classroom->name = ['ar' => $request->name, 'en' => $request->name_en],
                $classroom->grade_id = $request->grade_id,
            ]);
            toastr()->success(__('messages.edit'));
            return redirect()->route('classrooms.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage(), 'exception_error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        try {
            $classroom->delete();
            toastr()->success(__('messages.delete'));
            return redirect()->route('classrooms.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage(), 'exception_error' => $e->getMessage()]);
        }
    }
}
