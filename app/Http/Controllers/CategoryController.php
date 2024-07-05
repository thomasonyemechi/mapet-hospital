<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        $val = Validator::make($request->all(), [
            'category' => 'required|string|unique:categories,category',
            'description' => 'string'
        ])->validate();

        // return $request;

        Category::create([
            'category' => $request->category,
            'description' => $request->description
        ]);

        return back()->with('success', 'Item category has been added scuessfully');
    }


    public function updateCat(Request $request)
    {
        Validator::make($request->all(), [
            'category' => 'string|unique:categories,category',
            'description' => 'string'
        ])->validate();
    }


    function index()
    {
        $categories = Category::paginate(25);
        return view('pos.add_category', compact('categories'));
    }



    // manage department ]


    function deptIndex()
    {
        $departments = Department::paginate(24);
        return view('admin.manage_department', compact(['departments']));
    }

    function createDept(Request $request)
    {
        $val = Validator::make($request->all(), [
            'title' => 'string|required|unique:departments,title'
        ])->validate();

        Department::create([
            'title' => $request->title,
            'created_by' => auth()->user()->id
        ]);

        return back()->with('success', 'Department has been created successfuly');
    }
}
