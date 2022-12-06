<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchService extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store()
    {
        $this->request->validate([
            'branch_name' => ['required', 'unique:branches,name'],
            'branch_code' => ['required', 'unique:branches,code'],
            'city_id' => ['required', 'exists:cities,id'],
        ], [
            'branch_name.required' => 'هذا الحقل مطلوب',
            'branch_code.required' => 'هذا الحقل مطلوب',
            'branch_name.unique' => 'اسم الفرع موجود مسبقا',
            'branch_code.unique' => 'كود القسم موجود مسبقا',
        ]);

        $branch = Branch::create([
            'name' => $this->request->branch_name,
            'code' => $this->request->branch_code,
            'city_id' => $this->request->city_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => '👍 تم تحديث الفروع بنجاح',
        ]);

        // return redirect()->route('panel.branchs')->with('message', '👍 تم تحديث الفروع بنجاح');
    }

    public function edit($id)
    {
        $branch = Branch::find($id);

        $branch->update([
            'name' => $this->request->branch_name,
            'code' => $this->request->branch_code,
            'city_id' => $this->request->city_id,
        ]);

        return redirect()->route('panel.branchs')->with('message',  '👍 تم تحديث الفرع بنجاح');
    }

    public function update($branch, $validatedData)
    {
        $branch->update([
            'name' => $validatedData['branch_name'],
            'code' => $validatedData['branch_code'],
            'city_id' => $validatedData['city_id'],
        ]);

        return true;
    }



    public function changeBranchStatus($branch_id)
    {
        $branch = Branch::find($branch_id);
        if ($branch->status == 1) {
            $branch->update(['status' => 2]);
        } elseif ($branch->status == 2) {
            $branch->update(['status' => 1]);
        }

        return redirect()->route('panel.branchs')->with('message',  '👍 تم تحديث حالة الفرع بنجاح',);
    }
}
