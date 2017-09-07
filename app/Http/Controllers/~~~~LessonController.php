<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Response;
class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return Response::json([
            'data' => $this->transform($lessons)
        ],200);
    }

    // private function transformCollection($lessons)
    // {
    //     return array_map([$this,'transform'],$lessons->toArray());
    // }
    // private function transform($lesson)
    // {

    //         return [
    //             'title' => $lesson['title'],
    //             'body' => $lesson['body'],
    //             'active' => (boolean) $lesson['some_bool']
    //         ];

    // }

    public function  transform($lessons)
    {
        return array_map(function($lesson)
            {
                return [
                    'title' => $lesson['title'],
                    'body' => $lesson['body'],
                    'active' => (boolean) $lesson['some_bool']
                ];
            },$lessons->toArray());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson = new Lesson();
        $lesson->title = $request->input('title');
        $lesson->body = $request->input('body');
        $lesson->some_bool = $request->input('some_bool');
        $lesson->save();
        return Response::json([
            'data' => [$lesson['title'] , $lesson['body'] , (boolean) $lesson['some_bool']]
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        if(!$lesson)
        {
            return Response::json([
                'error' => [
                    'message' => 'Lesson does not exist!',
                    'status_code' => 404
                ]
            ],404);
        }
        return Response::json([
            'data' => [$lesson['title'] , $lesson['body'] , (boolean) $lesson['some_bool']]
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        return view('lessons.edit',compact('lesson'));
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
        $lesson = Lesson::find($id);
        dd($request['some_bool']);
        $lesson->update($request->all());
        // return Response::json([
        //     'data' => [$lesson['title'] , $lesson['body'] , (boolean) $lesson['some_bool']]
        // ],200);
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
