<?php

namespace App\Http\Controllers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Lesson;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::paginate(10);

        if (!$lessons) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $lessons,
            200
        );
    }

    public function show($id)
    {
        if (!$id) {
           throw new HttpException(400, "Invalid id");
        }

        $lesson = Lesson::find($id);

        return response()->json([
            $lesson,
        ], 200);

    }

    public function store(Request $request)
    {
        $lesson = new Lesson;
        $lesson->title = $request->input('title');
        $lesson->body = $request->input('body');


        if ($lesson->save()) {
            return $lesson;
        }

        throw new HttpException(400, "Invalid data");
    }

    public function update(Request $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $leesson = Lesson::find($id);
        $lesson->title = $request->input('title');
        $lesson->body = $request->input('body');

        if ($lesson->save()) {
            return $lesson;
        }

        throw new HttpException(400, "Invalid data");
    }

    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $lesson = Lesson::find($id);
        $lesson->delete();

        return response()->json([
            'message' => 'Lesson deleted',
        ], 200);
    }
}
