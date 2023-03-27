<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MegaMailer;
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
        return view('admin.reservations.reservations', $data);
    }

    public function pending(Request $request)
    {
        $search = $request->search;
        $data['tables'] = TableBook::where('status', '1')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.reservations.reservations', $data);
    }

    public function accepted(Request $request)
    {

        $data['tables'] = TableBook::where('status', 2)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.reservations.reservations', $data);
    }

    public function rejected(Request $request)
    {
        $data['tables'] = TableBook::where('status', 3)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.reservations.reservations', $data);
    }


    public function status(Request $request)
    {
        $bs = BasicSetting::first();

        $res = TableBook::find($request->table_id);
        $res->status = $request->status;
        $res->save();

        if ($request->status == 2) {
            $templateType = 'reservation_accept';
        } elseif ($request->status == 3) {
            $templateType = 'reservation_reject';
        }

        $mailer = new MegaMailer();
        $data = [
            'toMail' => $res->email,
            'toName' => $res->name,
            'customer_name' => $res->name,
            'website_title' => $bs->website_title,
            'templateType' => $templateType,
            'type' => 'reservationStatus'
        ];
        $mailer->mailFromAdmin($data);

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
