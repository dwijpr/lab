<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;

class ToDoController extends Controller
{
    public function undone($id) {
        return $this->_done($id, true);
    }

    public function done($id) {
        return $this->_done($id);
    }

    function _done($id, $revert = false) {
        $todo = ToDo::findOrFail($id);
        $response = [
            'success' => true,
        ];
        $todo->update([
            'done' => $revert?false:true,
        ]);
        return response()->json($response);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = @request()->options;
        $todos = ToDo::orderBy('updated_at', 'desc')->get();
        $view = view('template.todo', [
            'items' => $todos,
            'options' => @$options,
        ])->render();
        return response()->json([
            'view' => $view,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = [
            'message' => 'initial',
        ];
        $title = $request->desc;
        $todo = ToDo::create([
            'title' => $title,
        ]);
        if ($todo) {
            $response = [
                'success' => true,
            ];
        }
        return response()->json($response);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = ToDo::findOrFail($id);
        $response = [
            'message' => 'initial',
        ];
        if ($todo->delete()) {
            $response = [
                'success' => true,
            ];
        }
        return response()->json($response);
    }
}
