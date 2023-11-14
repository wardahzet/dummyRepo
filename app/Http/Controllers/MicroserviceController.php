<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Syllabus;

class MicroserviceController extends Controller
{
    public function response($data) 
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function getCourses() 
    {
        return $this->response(Course::all());
    }

    public function findCourse($id)
    {
        return $this->response(Course::find($id));
    }

    public function getUsers()
    {
        return $this->response(User::all());
    }

    public function findUser($id)
    {
        return $this->response(User::find($id));
    }

    public function getSyllabi($course)
    {
        return $this->response(Syllabus::where('course_id', $course)->get());
    }

    public function findSyllabus($id)
    {
        return $this->response(Syllabus::find($id));
    }
}
