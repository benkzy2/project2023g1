<?php



namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Image;

class TableController extends Controller

{

    public function index()
    {

        $data['tables'] = Table::orderBy('table_no', 'ASC')->get();

        return view('admin.tables.index', $data);
    }



    public function store(Request $request)
    {

        $rules = [
            'status' => 'required',
            'table_no' => 'required|max:255|unique:tables',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $table = new Table;
        $table->status = $request->status;
        $table->table_no = $request->table_no;
        $table->save();

        $directory = 'assets/admin/img/tables/';

        @mkdir($directory, 0775, true);

        $fileName = uniqid();

        \QrCode::size(250)->errorCorrection('H')
            ->color(0, 0, 0)
            ->format('png')
            ->style('square')
            ->eye('square')
            ->generate(url('qr-menu') . '?table=' . $table->table_no, $directory . $fileName . '.png');



        $table->qr_image = $fileName . '.png';

        $table->save();



        Session::flash('success', 'Payment Method added successfully!');

        return "success";
    }



    public function update(Request $request)
    {
        $rules = [
            'status' => 'required',
            'table_no' => [
                'required',
                'max:255',
                Rule::unique('tables')->ignore($request->table_id)
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            $errmsgs = $validator->getMessageBag()->add('error', 'true');

            return response()->json($validator->errors());
        }



        $table = Table::findOrFail($request->table_id);
        if ($table->table_no != $request->table_no) {
            @unlink('assets/admin/img/tables/' . $table->qr_image);
            $table->delete();

            $table = new Table;
            $table->status = $request->status;
            $table->table_no = $request->table_no;
            $table->save();

            $directory = 'assets/admin/img/tables/';

            @mkdir($directory, 0775, true);

            $fileName = uniqid();

            \QrCode::size(250)->errorCorrection('H')
                ->color(0, 0, 0)
                ->format('png')
                ->style('square')
                ->eye('square')
                ->generate(url('qr-menu') . '?table=' . $table->table_no, $directory . $fileName . '.png');



            $table->qr_image = $fileName . '.png';

            $table->save();
        } else {
            $table->status = $request->status;
            $table->table_no = $request->table_no;
            $table->save();
        }



        Session::flash('success', 'Payment Method updated successfully!');
        return "success";
    }



    public function delete(Request $request)
    {

        $table = Table::findOrFail($request->table_id);

        @unlink('assets/admin/img/tables/' . $table->qr_image);

        $table->delete();



        $request->session()->flash('success', 'Table deleted successfully!');

        return back();
    }



    public function qrBuilder($tableid)
    {

        $table = Table::findOrFail($tableid);

        $data['table'] = $table;

        return view('admin.tables.qr-builder', $data);
    }



    public function qrGenerate(Request $request)
    {

        $img = $request->file('image');
        $type = $request->type;



        $table = Table::findOrFail($request->table_id);

        // set default values for all params of qr image, if there is no value for a param
        $color = hex2rgb($request->color);

        $directory = 'assets/admin/img/tables/';
        @mkdir($directory, 0775, true);
        $qrImage = uniqid() . '.png';

        // remove previous qr image

        @unlink('assets/admin/img/tables/' . $table->qr_image);

        // generate new qr image
        $qrcode = \QrCode::size($request->size)->errorCorrection('H')->margin($request->margin)
            ->color($color['red'], $color['green'], $color['blue'])
            ->format('png')
            ->style($request->style)
            ->eye($request->eye_style);

        if ($type == 'image' && $request->hasFile('image')) {

            @unlink('assets/admin/img/tables/' . $table->image);

            $mergedImage = uniqid() . '.' . $img->getClientOriginalExtension();

            $img->move('assets/admin/img/tables/', $mergedImage);

            $table->image = $mergedImage;
        }



        // generating & saving the qr code in folder

        $qrcode->generate(url('qr-menu') . '?table=' . $table->table_no, $directory . $qrImage);



        // calcualte the inserted image size

        $qrSize = $request->size;


        if ($type == 'image') {
            $imageSize = $request->image_size;

            $insertedImgSize = ($qrSize * $imageSize) / 100;



            // inserting image using Image Intervention & saving the qr code in folder

            if ($request->hasFile('image')) {

                $qr = Image::make($directory . $qrImage);



                $logo = Image::make('assets/admin/img/tables/' . $mergedImage);

                $logo->resize(null, $insertedImgSize, function ($constraint) {

                    $constraint->aspectRatio();
                });



                $logoWidth = $logo->width();

                $logoHeight = $logo->height();



                $qr->insert($logo, 'top-left', (int) (((($qrSize - $logoWidth) * $request->image_x) / 100)), (int) (((($qrSize - $logoHeight) * $request->image_y) / 100)));

                $qr->save($directory . $qrImage);
            } else {

                if (!empty($table->image) && file_exists('./' . $directory . $table->image)) {

                    $qr = Image::make($directory . $qrImage);



                    $logo = Image::make('assets/admin/img/tables/' . $table->image);

                    $logo->resize(null, $insertedImgSize, function ($constraint) {

                        $constraint->aspectRatio();
                    });



                    $logoWidth = $logo->width();

                    $logoHeight = $logo->height();



                    $qr->insert($logo, 'top-left', (int) (((($qrSize - $logoWidth) * $request->image_x) / 100)), (int) (((($qrSize - $logoHeight) * $request->image_y) / 100)));

                    $qr->save($directory . $qrImage);
                }
            }
        }



        if ($type == 'text') {
            $imageSize = $request->text_size;
            $insertedImgSize = ($qrSize * $imageSize) / 100;

            $logo = Image::canvas($request->text_width, $insertedImgSize, "#ffffff")->text($request->text, 0, 0, function ($font) use ($request, $insertedImgSize) {
                $font->file('assets/admin/fonts/Lato-Regular.ttf');
                $font->size($insertedImgSize);
                $font->color('#' . $request->text_color);
                $font->align('left');
                $font->valign('top');
            });

            $logoWidth = $logo->width();
            $logoHeight = $logo->height();

            $qr = Image::make($directory . $qrImage);

            // use callback to define details
            $qr->insert($logo, 'top-left', (int) (((($qrSize - $logoWidth) * $request->text_x) / 100)), (int) (((($qrSize - $logoHeight) * $request->text_y) / 100)));
            $qr->save($directory . $qrImage);
        }

        // store the params in database

        $table->color = $request->color;

        $table->size = $request->size;

        $table->style = $request->style;

        $table->eye_style = $request->eye_style;

        $table->qr_image = $qrImage;

        $table->type = $type;

        if ($type == 'image') {
            $table->image_size = $imageSize;

            $table->image_x = $request->image_x;

            $table->image_y = $request->image_y;
        }

        if ($type == 'text' && !empty($request->text)) {
            $table->text = $request->text;
            $table->text_color = $request->text_color;
            $table->text_size = $request->text_size;

            $table->text_x = $request->text_x;

            $table->text_y = $request->text_y;
        }

        $table->margin = $request->margin;

        $table->save();

        return url('assets/admin/img/tables/' . $qrImage);
    }
}
