<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Bottomlink;
use Validator;
use Session;

class BlinkController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;
        $data['bottoms'] = Bottomlink::where('language_id', $lang_id)->get();
        $data['lang_id'] = $lang_id;
        return view('admin.footer.ulink.bottom_link', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id' => 'required',
            'name' => 'required|max:255',
            'url' => 'required|max:255'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $blink = new Bottomlink;
        $blink->language_id = $request->language_id;
        $blink->name = $request->name;
        $blink->url = $request->url;
        $blink->save();


        Session::flash('success', 'Bottom link added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'url' => 'required|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $blink = Bottomlink::findOrFail($request->link_id);
        $blink->name = $request->name;
        $blink->url = $request->url;
        $blink->save();

        Session::flash('success', 'Bottom link updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $ulink = Bottomlink::findOrFail($request->bottom_id);
        $ulink->delete();

        Session::flash('success', 'Bottom link deleted successfully!');
        return back();
    }
}
