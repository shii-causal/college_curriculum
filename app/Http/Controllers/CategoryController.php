<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //カテゴリーごとにPost一覧を表示
    public function index(Category $category) {
        return view('categories/index')->with(["posts" => $category->getByCategory()]);
    }
}
