<?php

namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;
use App\Models\MyClass;
use App\Models\Notice;
use Illuminate\Http\Request; // Change the import to use Request directly
use Qs;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('teamSA', ['only' => ['destroy',] ]);
    }

    public function notice (){
        $classes =  MyClass::get();
        $notice = Notice::with('class')->get();
        return view('pages.teacher.notice',compact('classes','notice'));
    }

    public function store (Request $request){

        $model = new Notice;
        $model->my_class_id = $request->input('my_class_id');
        $model->notice = $request->input('notice');
        $model->save();
        return Qs::jsonStoreOk();

    }

    public function delete($idd)
    {
        $model =  Notice::find($idd);
        $model->delete();
        return back()->with('flash_success', __('msg.del_ok'));
    }


}
