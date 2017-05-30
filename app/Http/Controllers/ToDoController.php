<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoController extends Controller
{
    var $todos = [
        [
            'title' => '<b>ToDo</b> model and database',
            'done'  => false,
        ],
        [
            'title' => 'dynamic <b>ToDo</b> management',
            'done'  => true,
        ],
        [
            'title' => 'list git bash terminal shortcut',
            'done'  => false,
        ],
        [
            'title' => 'bug fix: cd video - cd ..',
            'done'  => true,
        ],
        [
            'title' => '[tab] as item completion',
            'done'  => true,
        ],
        [
            'title' => 'Change platform to XAMPP as service',
            'done'  => true,
        ],
        [
            'title' => '<b>cd</b> upper directory',
            'done'  => true,
        ],
        [
            'title' => 'Implement <b>cd</b> command',
            'done'  => true,
        ],
        [
            'title' => 'ctrl + l to clear screen',
            'done'  => true,
        ],
        [
            'title' => 'List ToDo using variable',
            'done'  => true,
        ],
        [
            'title' => 'Implement <b>pwd</b> command',
            'done'  => true,
        ],
        [
            'title' => 'Connecting drive D: PC to jinny',
            'done'  => true,
        ],
        [
            'title' => 'Implement <b>ls</b> command',
            'done'  => true,
        ],
        [
            'title' => 'Refactor executeCommand()',
            'done'  => true,
        ],
        [
            'title' => 'Refactor command cannot be processed',
            'done'  => true,
        ],
    ];

    public function ls() {
        $view = view('template.todo', [
            'items' => $this->todos,
        ])->render();
        return response()->json([
            'view' => $view,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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
        //
    }
}
