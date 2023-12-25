<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function courseee($category_id) {
        dd($category_id);
        $courses = Course::where('category_id', '=', $category_id);
        return view("category", [
            "courses"=>$courses,
        ]);
    }

    public function create(Request $request) {
        $category_info = $request->all();

        Category::create([
            "title" => $category_info["title"],
        ]);
        return redirect()->back();
    }
}
