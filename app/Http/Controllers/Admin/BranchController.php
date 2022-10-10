<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{

    public function index()
    {
        $branches=Branch::orderBy('branch_name','asc')->paginate(10);
        return view('admin.branch.index',compact('branches'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'branch_code' => 'required|unique:branches'
        ]);

        $branch=new Branch;
        $branch->branch_code=$request->branch_code;
        $branch->branch_name=$request->branch_name;
        $branch->save();

        return redirect()->route('branches.index')->with('success','Branch Added Successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Branch $branch)
    {
        $edit_data=$branch;
        $branches=Branch::orderBy('branch_name','asc')->paginate(10);
        return view('admin.branch.index',compact('branches','edit_data'));
    }

    public function update(Request $request, Branch $branch)
    {
        $this->validate($request, [
            'branch_code' => 'required|unique:branches,branch_code,'.$branch->id
        ]);

        $branch->branch_code=$request->branch_code;
        $branch->branch_name=$request->branch_name;
        $branch->save();

        return redirect()->route('branches.index')->with('success','Branch Updated Successfully!');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('error','Branch Deleted Successfully!');
    }
}
