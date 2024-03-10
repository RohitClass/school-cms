<?php

namespace App\Http\Controllers\MyParent;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookRequest;
use App\Models\MyClass;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; // Change the import to use Request directly

use function Ramsey\Uuid\v1;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('librarian', ['only' => ['destroy',] ]);
    }

    public function children()
    {
        $books = Book::with('getcalss')->get();
        $user =  Auth::user()->id;
        $classes =  MyClass::get();
        $id = null;
        return view('pages.parent.index', compact('user','books','classes', 'id'));
    }

    public function store(Request $request)
    {
        $model = new Book;
        $model->my_class_id = $request->input('user_type'); // Correct usage to get request input
        $model->name = $request->input('name');
        $model->author = $request->input('author');
        $model->book_type = $request->input('book_type');
        $model->description = $request->input('description');
        $model->location = $request->input('location');
        $model->total_copies = $request->input('total_opies');
        $model->issued_copies = $request->input('issued_opies');
        $model->book_id = "BK-".rand(1000, 9999);
        $model->save();

        return Qs::jsonStoreOk(); // Ensure this method exists and returns the appropriate response.
    }

    public function records()
    {
        $books = Book::get();
        $students = User::where('user_type','student')->get();
        $recs = BookRequest::with('book','student')->get();
        return view('pages.librarian.bookrecords', compact('recs','books','students'));
    }


    public function books_record(Request $request)
    {
        $model = new BookRequest;
        $model->book_id = $request->input('book_id'); // Correct usage to get request input
        $model->user_id = $request->input('user_id');
        $model->start_date = $request->input('start_date');
        $model->end_date = $request->input('end_date');
        $model->save();

        return Qs::jsonStoreOk(); // Ensure this method exists and returns the appropriate response.
    }

    public function status($idd)
    {
        $bookrec = BookRequest::find($idd);
        if (!$bookrec) {
            return redirect()->route('records')->with('error', 'Book not found');
        }
        $bookrec->returned = Carbon::today()->format('Y-m-d');
        $bookrec->status = "Returned";
        $bookrec->save();
        return redirect()->route('records')->with('success', 'Book deleted successfully');
    }

    public function edit($idd)
    {
        $books = Book::find($idd);
        $user =  Auth::user()->id;
        $classes =  MyClass::get();
        $id = null;
        return view('pages.parent.create', compact('user','books','classes', 'id'));
    }

    public function update(Request $request)
    {
        $model =  Book::find($request->input('id'));
        $model->my_class_id = $request->input('user_type'); // Correct usage to get request input
        $model->name = $request->input('name');
        $model->author = $request->input('author');
        $model->book_type = $request->input('book_type');
        $model->description = $request->input('description');
        $model->location = $request->input('location');
        $model->total_copies = $request->input('total_opies');
        $model->issued_copies = $request->input('issued_opies');
        $model->book_id = "BK-".rand(1000, 9999);
        $model->save();

        return Qs::jsonStoreOk(); // Ensure this method exists and returns the appropriate response.
    }

    public function delete($idd)
    {
        $book = Book::find($idd);
        if (!$book) {
            return redirect()->route('books')->with('error', 'Book not found');
        }
        $book->delete();
        return redirect()->route('books')->with('success', 'Book deleted successfully');
    }


    public function notice (){
        return 'llllll';
    }

}
