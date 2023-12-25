<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index() 
    {
        $categories = Category::all();
        $courses = Course::paginate(1);
        return view("index", [
            "courses"=>$courses,
            "categories"=>$categories
        ]);
    }

    public function create(Request $request) 
    {
        $course_info = $request->all();

        $file = $request->file("image");
        
        $file_name = md5($file->getClientOriginalName().time()). "." .$file->getClientOriginalExtension();

        Storage::putFileAs("public/image",$file,$file_name);

            Course::create([
                "title"=>$course_info["title"],
                "description"=>$course_info["description"],
                "duration"=>$course_info["duration"],
                "cost"=>$course_info["cost"],
                "category_id"=>$course_info["category"],
                "image"=>$file_name,
            ], [
                "title.required" => "Поле название курса не заполнено!",
                "title.max" => "Название курса должно быть не более 200 символов!",
                "cost.required" => "Поле стоимость курса не заполнено!",
                "cost.numeric" => "Введите числовое значение!",
                "duration.numeric" => "Введите числовое значение!",
                "duration.required" => "Поле длительность курса не заполнено!",
                "description.required" => "Поле описание курса не заполнено!",
                "image.required" => "Выберите фото!",
            ]);
            return redirect()->back();
    }
}
