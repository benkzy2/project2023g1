<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableBook;
use App\Models\BasicSetting;
use Session;

class ResevationsController extends Controller
{
    public function all(Request $request)
    {
        $data['tables'] =
        TableBook::orderBy('id', 'DESC')->paginate(10);
        return view('admin.home.table_book.index', $data);
    }

    public function pending(Request $request)
    {
        $search = $request->search;
        $data['tables'] = TableBook::where('status', '1')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.home.table_book.index', $data);
    }

    public function accepted(Request $request)
    {

        $data['tables'] = TableBook::where('status', 2)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.home.table_book.index', $data);
    }

    public function rejected(Request $request)
    {
        $data['tables'] = TableBook::where('status', 3)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.home.table_book.index', $data);
    }


    public function status(Request $request)
    {

        $po = TableBook::find($request->table_id);
        $po->status = $request->status;
        $po->save();

        Session::flash('success', 'table resevations status changed successfully!');
        return back();
    }

    public function delete(Request $request)
    {
        $table = TableBook::findOrFail($request->table_id);
        $table->delete();
        Session::flash('success', 'table resevations deleted successfully!');
        return back();
    }

    public function bulkTableDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $table = TableBook::findOrFail($id);
            $table->delete();
        }

        Session::flash('success', 'table resevations deleted successfully!');
        return "success";
    }


    public function visibility()
    {
        $data['abs'] = BasicSetting::first();
        return view('admin.reservations.visibility', $data);
    }

    public function updateVisibility(Request $request) {
        $bss = BasicSetting::all();
        foreach ($bss as $key => $bs) {
            $bs->is_quote = $request->is_quote;
            $bs->save();
        }

        $request->session()->flash('success', 'Page status updated successfully!');
        return back();
    }


}
