<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\WithdrawRequestDataTable;
use App\Http\Controllers\Controller;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    function index(WithdrawRequestDataTable $dataTable) {
        return $dataTable->render('admin.withdraw.index');
    }

    function show(string $id) {
        $request = WithdrawRequest::findOrFail($id);
        return view('admin.withdraw.show', compact('request'));
    }

    function update(Request $request, string $id) {
        $request->validate([
            'status' => ['required', 'in:pending,paid,declined']
        ]);

        $withdraw = WithdrawRequest::findOrFail($id);
        $withdraw->status = $request->status;
        $withdraw->save();

        toastr('Updated successfully!');

        return redirect()->route('admin.withdraw.index');
    }
}
