<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use Response;
class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return Response::json([
            'data' => $this->transform($lessons)
        ],200);
    }

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
    public function create()
    {
        return view('lessons.create');
    }

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
        //need to return success
    }

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
            // 500
        }
        return Response::json([
            'data' => [$lesson['title'] , $lesson['body'] , (boolean) $lesson['some_bool']]
        ],200);
    }

    public function edit($id)
    {
        $lesson = Lesson::find($id);
        return view('lessons.edit',compact('lesson'));
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $lesson->title = $request->input('title');
        $lesson->body = $request->input('body');
        $lesson->some_bool = $request->input('some_bool');
        $lesson->update();
        return Response::json([
            'data' => [$lesson['title'] , $lesson['body'] , (boolean) $lesson['some_bool']]
        ],200);
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return Response::json([
            'data' => null,
            'message' => 'lesson deleted'
        ],204);
        // 202
    }

}
