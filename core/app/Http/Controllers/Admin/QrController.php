<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicExtended;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;

class QrController extends Controller
{
    public function qrCode() {
        $abe = BasicExtended::first();

        if (empty($abe->qr_image) || !file_exists('./assets/front/img/' . $abe->qr_image)) {
        	$directory = 'assets/front/img/';
            @mkdir($directory, 0775, true);
            $fileName = uniqid() . '.png';

            \QrCode::size(250)->errorCorrection('H')
                ->color(0, 0, 0)
                ->format('png')
                ->style('square')
                ->eye('square')
                ->generate(url('qr-menu'), $directory . $fileName);

            $extendeds = BasicExtended::all();
            foreach ($extendeds as $key => $extended) {
	            $extended->qr_image = $fileName;
	            $extended->save();
            }

        }

        $data['abe'] = $abe;

        return view('admin.qr-code', $data);
    }

    public function generate(Request $request)
    {
        $img = $request->file('image');
        $type = $request->type;

        $abe = BasicExtended::first();

        // set default values for all params of qr image, if there is no value for a param
        $color = hex2rgb($request->color);

        $directory = 'assets/front/img/';
        @mkdir($directory, 0775, true);
        $qrImage = uniqid() . '.png';

        // remove previous qr image
        @unlink($directory . $abe->qr_image);

        // new QR code init
        $qrcode = \QrCode::size($request->size)->errorCorrection('H')->margin($request->margin)
            ->color($color['red'], $color['green'], $color['blue'])
            ->format('png')
            ->style($request->style)
            ->eye($request->eye_style);

        if ($type == 'image' && $request->hasFile('image')) {

            @unlink($directory . $abe->qr_inserted_image);
            $mergedImage = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move($directory, $mergedImage);
        }



        // generating & saving the qr code in folder
        $qrcode->generate(url('qr-menu'), $directory . $qrImage);



        // calcualte the inserted image size
        $qrSize = $request->size;


        if ($type == 'image') {
            $imageSize = $request->image_size;
            $insertedImgSize = ($qrSize * $imageSize) / 100;


            // inserting image using Image Intervention & saving the qr code in folder
            if ($request->hasFile('image')) {

                $qr = Image::make($directory . $qrImage);
                $logo = Image::make($directory . $mergedImage);
                $logo->resize(null, $insertedImgSize, function ($constraint) {
                    $constraint->aspectRatio();
                });


                $logoWidth = $logo->width();
                $logoHeight = $logo->height();


                $qr->insert($logo, 'top-left', (int) (((($qrSize - $logoWidth) * $request->image_x) / 100)), (int) (((($qrSize - $logoHeight) * $request->image_y) / 100)));
                $qr->save($directory . $qrImage);
            } else {

                if (!empty($abe->qr_inserted_image) && file_exists('./' . $directory . $abe->qr_inserted_image)) {

                    $qr = Image::make($directory . $qrImage);
                    $logo = Image::make($directory . $abe->qr_inserted_image);
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

        $extendeds = BasicExtended::all();
        // store the params in database
        foreach ($extendeds as $key => $extended) {
	        $extended->qr_color = $request->color;
	        $extended->qr_size = $request->size;
	        $extended->qr_style = $request->style;
	        $extended->qr_eye_style = $request->eye_style;
	        $extended->qr_image = $qrImage;
	        $extended->qr_type = $type;

	        if ($type == 'image') {
	        	if ($request->hasFile('image')) {
	            	$extended->qr_inserted_image = $mergedImage;
	        	}
	            $extended->qr_inserted_image_size = $imageSize;
	            $extended->qr_inserted_image_x = $request->image_x;
	            $extended->qr_inserted_image_y = $request->image_y;
	        }

	        if ($type == 'text' && !empty($request->text)) {
	            $extended->qr_text = $request->text;
	            $extended->qr_text_color = $request->text_color;
	            $extended->qr_text_size = $request->text_size;
	            $extended->qr_text_x = $request->text_x;
	            $extended->qr_text_y = $request->text_y;
	        }

	        $extended->qr_margin = $request->margin;
	        $extended->save();
        }


        return url($directory . $qrImage);
    }
}
