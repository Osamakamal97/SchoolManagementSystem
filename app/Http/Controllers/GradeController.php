<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradesRequest;
use App\Models\Grade;
use Exception;

class GradeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradesRequest $request)
    {
        try {
            $grade = new Grade();
            $grade->name = ['ar' => $request->name, 'en' => $request->name_en];
            $grade->notes = $request->notes;
            $grade->save();
            toastr()->success(__('messages.success'));
            return redirect()->route('grades.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage(), 'exception_error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradesRequest $request, Grade $grade)
    {
        try {
            $grade->update([
                $grade->name = ['ar' => $request->name, 'en' => $request->name_en],
                $grade->notes = $request->notes,
            ]);
            toastr()->success(__('messages.edit'));
            return redirect()->route('grades.index');
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
    public function destroy(Grade $grade)
    {
        try {
            if ($grade->classrooms()->count() >= 1){
                toastr()->error(__('messages.cant delete grade'));
                return redirect()->route('grades.index');
            }
            $grade->delete();
            toastr()->success(__('messages.delete'));
            return redirect()->route('grades.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage(), 'exception_error' => $e->getMessage()]);
        }
    }
}
