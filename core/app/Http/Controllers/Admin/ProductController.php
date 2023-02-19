<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\BasicExtended as BE;
use App\Models\BasicSetting as BS;
use App\Models\Language;
use App\Models\Pcategory;
use App\Models\ProductImage;
use App\Models\Product;
use Purifier;
use Validator;
use Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id = $lang->id;
        $data['products'] = Product::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);
        $data['lang_id'] = $lang_id;
        return view('admin.product.index',$data);
    }


    public function create(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();
        $categories = Pcategory::where('status',1)->get();
        return view('admin.product.create',compact('categories'));
    }

    public function sliderstore(Request $request)
    {


        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg');

        $rules = [
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    $ext = $img->getClientOriginalExtension();
                    if (!in_array($ext, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg images are allowed");
                    }
                },
            ]
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $filename = uniqid() . '.jpg';

        $img->move('assets/front/img/product/sliders/', $filename);

        $pi = new ProductImage;
        if (!empty($request->product_id)) {
            $pi->product_id = $request->product_id;
        }
        $pi->image = $filename;
        $pi->save();

        return response()->json(['status' => 'success', 'file_id' => $pi->id]);
    }

    public function sliderrmv(Request $request)
    {
        $pi = ProductImage::findOrFail($request->fileid);
        @unlink('assets/front/img/product/sliders/' . $pi->image);
        $pi->delete();
        return $pi->id;
    }

    public function getCategory($langid)
    {
        $category = Pcategory::where('language_id', $langid)->get();
        return $category;
    }


    public function store(Request $request)
    {
        $img = $request->file('feature_image');
        $allowedExts = array('jpg', 'png', 'jpeg');
        $slug = make_slug($request->title);

        $rules = [
            'language_id' => 'required',
            'title' => 'required|max:255',
            'category_id' => 'required',
            'stock' => 'required',
            'current_price' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'slider_images' => 'required',
            'status' => 'required',

            'feature_image' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
        ];

        $messages = [
            'language_id.required' => 'The language field is required',
            'category_id.required' => 'The category field is required'
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $in = $request->all();
        if ($request->hasFile('feature_image')) {
            $filename = time() . '.' . $img->getClientOriginalExtension();
            $request->file('feature_image')->move('assets/front/img/product/featured/', $filename);
            $in['feature_image'] = $filename;
        }



        $in['language_id'] = $request->language_id;
        $in['slug'] = $slug;
        $in['description'] = Purifier::clean($request->description);

        $product = Product::create($in);

        $slders = $request->slider_images;
        $pis = ProductImage::findOrFail($slders);
        foreach ($pis as $key => $pi) {
            $pi->product_id = $product->id;
            $pi->save();
        }

        Session::flash('success', 'Product added successfully!');
        return "success";
    }


    public function edit(Request $request, $id)
    {
        $lang = Language::where('code', $request->language)->first();
        $categories = $lang->pcategories()->where('status',1)->get();
        $data = Product::findOrFail($id);
        return view('admin.product.edit',compact('categories','data'));
    }

    public function images($portid)
    {
        $images = ProductImage::where('product_id', $portid)->get();
        return $images;
    }

    public function update(Request $request)
    {
        $img = $request->file('feature_image');
        $allowedExts = array('jpg', 'png', 'jpeg');
        $slug = make_slug($request->title);

        $rules = [

            'title' => 'required|max:255',
            'category_id' => 'required',
            'stock' => 'required',
            'current_price' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'status' => 'required',
            'feature_image' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],

        ];

        $messages = [
            'category_id.required' => 'Service category is required'
        ];



        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $in = $request->all();
        $product = Product::findOrFail($request->product_id);

        if ($request->hasFile('feature_image')) {
            @unlink('assets/front/img/product/featured/' . $product->feature_image);
            $filename = time() . '.' . $img->getClientOriginalExtension();
            $request->file('feature_image')->move('assets/front/img/product/featured/', $filename);
            $in['feature_image'] = $filename;
        }

        $in['slug'] = $slug;
        $in['description'] = Purifier::clean($request->description);

        $product = $product->fill($in)->save();

        Session::flash('success', 'Product updated successfully!');
        return "success";
    }


    public function delete(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        foreach ($product->product_images as $key => $pi) {
            @unlink('assets/front/img/product/sliders/' . $pi->image);
            $pi->delete();
        }

        @unlink('assets/front/img/product/featured/' . $product->feature_image);
        $product->delete();

        Session::flash('success', 'Product deleted successfully!');
        return back();
    }


    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $product = Product::findOrFail($id);
            foreach ($product->product_images as $key => $pi) {
                @unlink('assets/front/img/product/sliders/' . $pi->image);
                $pi->delete();
            }
        }

        foreach ($ids as $id) {
            $product = product::findOrFail($id);
            @unlink('assets/front/img/product/featured/' . $product->feature_image);
            $product->delete();
        }

        Session::flash('success', 'Product deleted successfully!');
        return "success";
    }


    public function FeatureCheck($data)
    {
        $info = explode(',',$data);
        $id = $info[0];
        $value = $info[1];


        Product::where('id',$id)->update([
        'is_feature' => $value
        ]);

        Session::flash('success', 'Product Update successfully!');
        return 'done';
    }


    public function SpecialCheck($data)
    {
        $info = explode(',',$data);
        $id = $info[0];
        $value = $info[1];


        Product::where('id',$id)->update([
        'is_special' => $value
        ]);

        Session::flash('success', 'Product Update successfully!');
        return 'done';
    }
}
