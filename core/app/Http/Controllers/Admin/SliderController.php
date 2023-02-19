<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Language;
use Validator;
use Session;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id = $lang->id;
        $data['sliders'] = Slider::where('language_id', $lang_id)->orderBy('id', 'DESC')->get();
           
       
        $data['abe'] = $lang->basic_extended;
       

        $data['lang_id'] = $lang_id;
        return view('admin.home.hero.slider.index', $data);
    }

    public function edit($id)
    {
        $data['slider'] = Slider::findOrFail($id);
        return view('admin.home.hero.slider.edit', $data);
    }


    public function store(Request $request)
    {
        $m_image = $request->file('main_image');
        $bg_img = $request->file('bg_image');
        
        $allowedExts = array('jpg', 'png', 'jpeg');

        $rules = [
            'language_id' => 'required',
            'title' => 'required|max:255',
            'text' => 'required|max:255',
            'serial_number' => 'required|integer',

            'main_image' => [
                function ($attribute, $value, $fail) use ($m_image, $allowedExts) {
                    if (!empty($m_image)) {
                        $ext = $m_image->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],

            'bg_image' => [
                function ($attribute, $value, $fail) use ($bg_img, $allowedExts) {
                    if (!empty($bg_img)) {
                        $ext = $bg_img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
            
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $input = $request->all();

        if ($request->hasFile('main_image')) {
            $main_image = time() . '.' . $m_image->getClientOriginalExtension();
            $request->file('main_image')->move('assets/front/img/sliders/', $main_image);
            $input['image'] = $main_image;
        }

        if ($request->hasFile('bg_image')) {
            $bg_image = time() . '.' . $bg_img->getClientOriginalExtension();
            $request->file('bg_image')->move('assets/front/img/sliders/bg_image/', $bg_image);
            $input['bg_image'] = $bg_image;
        }
        


        $slider = new Slider;
        $slider->create($input);

        Session::flash('success', 'Slider added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $m_image = $request->file('main_image');
        $bg_img = $request->file('bg_image');
        $allowedExts = array('jpg', 'png', 'jpeg');

        $rules = [
            'title' => 'required|max:255',
            'text' => 'required|max:255',
            'serial_number' => 'required|integer',

            'main_image' => [
                function ($attribute, $value, $fail) use ($m_image, $allowedExts) {
                    if (!empty($m_image)) {
                        $ext = $m_image->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],

            'bg_image' => [
                function ($attribute, $value, $fail) use ($bg_img, $allowedExts) {
                    if (!empty($bg_img)) {
                        $ext = $bg_img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
            
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $input = $request->all();

        $slider = Slider::findOrFail($request->slider_id);

        if ($request->hasFile('main_image')) {
            $main_image = time() . '.' . $m_image->getClientOriginalExtension();
            $request->file('main_image')->move('assets/front/img/sliders/', $main_image);
                @unlink('assets/front/img/sliders/' . $slider->image);
            $input['image'] = $main_image;
        }

        if ($request->hasFile('bg_image')) {
            $bg_image = time() . '.' . $bg_img->getClientOriginalExtension();
            $request->file('bg_image')->move('assets/front/img/sliders/bg_image/', $bg_image);

                @unlink('assets/front/img/sliders/bg_image/' . $slider->bg_image);

            $input['bg_image'] = $bg_image;
        }

        


        $slider->update($input);
        Session::flash('success', 'Slider updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $slider = Slider::findOrFail($request->slider_id);
        @unlink('assets/front/img/sliders/' . $slider->image);
        @unlink('assets/front/img/sliders/bg_image/' . $slider->bg_image);
        
        $slider->delete();

        Session::flash('success', 'Slider deleted successfully!');
        return back();
    }
}
