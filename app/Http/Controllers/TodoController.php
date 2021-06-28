<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\CreateRequest;
use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageSize = $request->has('pageSize') ? $request->pageSize : 10;
        $uid = $request->user()->id;
        $todo = Todo::where('uid',$uid)
        ->when($request->search,function($query,$search){
            return $query->where('title','like',$search.'%');
        })
        ->paginate($pageSize);
        return response($todo, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $request->validated();
        $todo = $request->only(['title','description']);
        $todo['uid'] = $request->user()->id;
        try{
            Todo::create($todo);
            return response('Todo created',200);
        }catch(Exception $e){
            Log::error('Error storing todo '.$e->getMessage());
            return response('Error in creating todo',400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $todo = Todo::find($id);
        if($todo && $todo->uid == $request->user()->id){
            return response($todo,200);
        }else{
            return response('Record not found',404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $todo = Todo::find($id);
        if($todo && $todo->uid == $request->user()->id){
            return response($todo,200);
        }else{
            return response('Record not found',404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request,$id)
    {
        $request->validated();
        $todo = Todo::find($id);
        if($todo && $todo->uid == $request->user()->id){
            $todo->title = $request->title;
            $todo->description = $request->description;
            $todo->update();
            return response('Record updated',200);
        }else{
            return response('Record not found',404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $todo = Todo::find($id);
        if($todo && $todo->uid == $request->user()->id){
            $todo->delete();
            return response('Record deleted',200);
        }else{
            return response('Record not found',404);
        }
    }
}
