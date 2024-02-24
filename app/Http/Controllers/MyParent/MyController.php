<?php

namespace App\Http\Controllers\MyParent;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\MyClass;
use Illuminate\Support\Facades\Auth;
use Request;

class MyController extends Controller
{

    public function children()
    {
        $books = Book::get();
        $user =  Auth::user()->id;
        $classes =  MyClass::get();
        $id = null;
        return view('pages.parent.index', compact('user','books','classes', 'id'));
    }


    public function store(Request $request)
    {
        return $request;
    }

    public function update(Request $request)
    {
        return $request;
    }

}
