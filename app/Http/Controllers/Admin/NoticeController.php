<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{

    public function index()
    {
        $notices = Notice::orderBy('id','desc')->paginate(10);

        return view('admin.notice.index',compact('notices'));
    }

    public function create()
    {
        return view('admin.notice.create');
    }

    public function store(Request $request)
    {
        Notice::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'is_published'=>$request->is_published
        ]);

        return redirect()->route('admin-notices.index')->with('success','Notice Created Successfully!');
    }

    public function show(Request $request,$id)
    {
        Notice::where('id',$id)->update([
            'is_published'=>$request->status
        ]);

        return redirect()->route('admin-notices.index')->with('success','Notice Status Updated Successfully!');
    }

    public function edit($id)
    {
        $notice = Notice::find($id);
        return view('admin.notice.edit',compact('notice'));
    }

    public function update(Request $request, $id)
    {
        Notice::where('id',$id)->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'is_published'=>$request->is_published
        ]);

        return redirect()->route('admin-notices.index')->with('success','Notice Updated Successfully!');
    }

    public function destroy($id)
    {
        Notice::where('id',$id)->delete();

        return back()->with('error','Notices Deleted Successfully!');
    }

    public function vendorNoticesIndex()
    {
        $notices = Notice::where('is_published',1)->orderBy('id','desc')->paginate(10);

        return view('vendor.notice.index',compact('notices'));
    }

    public function vendorNoticesShow($id)
    {
        $notice = Notice::where('is_published',1)->where('id',$id)->first();

        return view('vendor.notice.show',compact('notice'));
    }
}
