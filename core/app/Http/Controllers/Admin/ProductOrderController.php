<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MegaMailer;
use App\Models\BasicExtended;
use App\Models\ProductOrder;
use App\Models\BasicSetting;
use App\Models\OfflineGateway;
use App\Models\OrderTime;
use App\Models\ServingMethod;
use App\Models\TimeFrame;
use Carbon\Carbon;
use Session;
use Validator;

class ProductOrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $type = $request->orders_from;
        $servingMethod = $request->serving_method;
        $orderStatus = $request->order_status;
        $paymentStatus = $request->payment_status;
        $completed = $request->completed;
        $orderDate = $request->order_date;
        $deliveryDate = $request->delivery_date;

        $data['orders'] = ProductOrder::when($search, function ($query, $search) {
            return $query->where('order_number', 'LIKE', '%' . $search . '%');
        })->when($type, function ($query, $type) {
            return $query->where('type', $type);
        })->when($servingMethod, function ($query, $servingMethod) {
            return $query->where('serving_method', $servingMethod);
        })->when($orderStatus, function ($query, $orderStatus) {
            return $query->where('order_status', $orderStatus);
        })->when($paymentStatus, function ($query, $paymentStatus) {
            return $query->where('payment_status', $paymentStatus);
        })->when($completed, function ($query, $completed) {
            return $query->where('completed', $completed);
        })->when($orderDate, function ($query, $orderDate) {
            return $query->whereDate('created_at', Carbon::parse($orderDate));
        })->when($deliveryDate, function ($query, $deliveryDate) {
            return $query->where('delivery_date', $deliveryDate);
        })
        ->orderBy('id', 'DESC')->paginate(10);

        return view('admin.product.order.index', $data);
    }

    public function settings() {
        return view('admin.product.order.settings');
    }

    public function resetToken(Request $request) {
        $bss = BasicSetting::all();
        foreach ($bss as $key => $bs) {
            $bs->token_no_start = $request->token_no;
            $bs->token_no = $request->token_no - 1;
            $bs->save();
        }

        Session::flash('success', 'Token no reset successfully');
        return back();
    }

    public function updateSettings(Request $request) {
        $bss = BasicSetting::all();
        foreach ($bss as $key => $bs) {
            $bs->postal_code = $request->postal_code;
            $bs->save();
        }

        $bes = BasicExtended::all();
        foreach ($bes as $key => $be) {
            $be->delivery_date_time_status = $request->delivery_date_time_status;
            $be->delivery_date_time_required = $request->delivery_date_time_required;
            $be->save();
        }
        Session::flash('success', 'Settings updated successfully');
        return back();
    }

    public function status(Request $request)
    {

        $po = ProductOrder::find($request->order_id);
        $po->order_status = $request->order_status;
        $po->save();

        $bs = BasicSetting::first();

        $status = $request->order_status;
        $servingMethod = $po->serving_method;
        $templateType = 'pending';

        if ($status == 'received') {
            $templateType = 'order_received';
        } elseif ($status == 'preparing') {
            $templateType = 'order_preparing';
        } elseif ($status == 'ready_to_pick_up' && $servingMethod == 'home_delivery') {
            $templateType = 'order_ready_to_pickup';
        } elseif ($status == 'ready_to_pick_up' && $servingMethod == 'pick_up') {
            $templateType = 'order_ready_to_pickup_pick_up';
        } elseif ($status == 'picked_up' && $servingMethod == 'home_delivery') {
            $templateType = 'order_pickedup';
        } elseif ($status == 'picked_up' && $servingMethod == 'pick_up') {
            $templateType = 'order_pickedup_pick_up';
        } elseif ($status == 'delivered') {
            $templateType = 'order_delivered';
        } elseif ($status == 'cancelled') {
            $templateType = 'order_cancelled';
        } elseif ($status == 'served') {
            $templateType = 'order_served';
        } elseif ($status == 'ready_to_serve') {
            $templateType = 'order_ready_to_serve';
        } else {
            Session::flash('success', 'Order status changed successfully!');
            return back();
        }

        $mailer = new MegaMailer();
        $data = [
            'toMail' => $po->billing_email,
            'toName' => $po->billing_fname,
            'customer_name' => $po->billing_fname,
            'order_number' => $po->order_number,
            'order_link' => "<a href='" . route('user-orders-details', $po->id) . "'>" . route('user-orders-details', $po->id) . "</a>",
            'website_title' => $bs->website_title,
            'templateType' => $templateType,
            'type' => 'foodOrderStatus'
        ];
        $mailer->mailFromAdmin($data);

        Session::flash('success', 'Order status changed!');
        return back();
    }

    public function completed(Request $request) {
        $po = ProductOrder::find($request->order_id);
        $po->completed = $request->completed;
        $po->save();
        Session::flash('success', 'Complete status changed!');
        return back();
    }

    public function payment(Request $request) {
        $po = ProductOrder::find($request->order_id);
        $po->payment_status = $request->payment_status;
        $po->save();
        Session::flash('success', 'Payment status changed!');
        return back();
    }

    public function details($id)
    {
        $order = ProductOrder::findOrFail($id);
        return view('admin.product.order.details', compact('order'));
    }


    public function bulkOrderDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $order = ProductOrder::findOrFail($id);
            @unlink('assets/front/invoices/product/' . $order->invoice_number);
            @unlink('assets/front/receipt/' . $order->receipt);
            foreach ($order->orderitems as $item) {
                $item->delete();
            }
            $order->delete();
        }

        Session::flash('success', 'Orders deleted successfully!');
        return "success";
    }

    public function orderDelete(Request $request)
    {
        $order = ProductOrder::findOrFail($request->order_id);
        @unlink('assets/front/invoices/product/' . $order->invoice_number);
        foreach ($order->orderitems as $item) {
            $item->delete();
        }
        $order->delete();

        Session::flash('success', 'product order deleted successfully!');
        return back();
    }

    public function qrPrint(Request $request) {
        $order = ProductOrder::find($request->order_id);

        if ($order->method == 'paypal') {
            $url = route('product.paypal.apiRequest', $request->order_id);
        } elseif ($order->method == 'mollie') {
            $url = route('product.mollie.apiRequest', $request->order_id);
        }

        $fileName = uniqid() . '.svg';
        \QrCode::size(150)
        ->color(0,0,0)
        ->format('svg')
        ->generate($url, 'assets/front/img/' . $fileName);

        return url('assets/front/img/' . $fileName);
    }

    public function servingMethods() {
        $servingMethods = ServingMethod::all();
        $data['servingMethods'] = $servingMethods;
        $data['ogateways'] = OfflineGateway::where('status', 1)->get();

        return view('admin.product.order.serving_methods.index', $data);
    }

    public function servingMethodStatus(Request $request) {
        // return $request;
        $website = ServingMethod::where('website_menu', 1)->count();
        $qr = ServingMethod::where('qr_menu', 1)->count();

        if ($website == 1 && $request->website_menu == 0) {
            Session::flash('warning', 'Minimum 1 serving method must be activated for Website Menu.');
            return back();
        }
        if ($qr == 1 && $request->qr_menu == 0) {
            Session::flash('warning', 'Minimum 1 serving method must be activated for QR Menu.');
            return back();
        }

        $sm = ServingMethod::find($request->serving_method);
        $sm->website_menu = $request->website_menu;
        $sm->qr_menu = $request->qr_menu;
        $sm->pos = $request->pos;
        $sm->save();

        Session::flash('success', 'Status updated successfully!');
        return back();
    }

    public function servingMethodGateways(Request $request) {
        $sm = ServingMethod::find($request->serving_method);
        $sm->gateways = json_encode($request->gateways);
        $sm->save();

        Session::flash('success', 'Gateways status updated successfully!');
        return back();
    }

    public function qrPayment(Request $request) {
        $sm = ServingMethod::find($request->serving_method);
        $sm->qr_payment = $request->qr_payment;
        $sm->save();

        Session::flash('success', 'QR scan payment status updated successfully!');
        return back();
    }

    public function servingMethodUpdate(Request $request) {
        $sm = ServingMethod::find($request->serving_method);
        $sm->serial_number = $request->serial_number;
        $sm->note = $request->note;
        $sm->save();

        Session::flash('success', 'Updated successfully!');
        return back();
    }

    public function ordertime() {
        $data['ordertimes'] = OrderTime::all();
        return view('admin.product.order.order-time', $data);
    }

    public function updateOrdertime(Request $request) {
        $start = $request->start_time;
        $end = $request->end_time;
        $ots = OrderTime::all();

        for ($i=0; $i < count($ots); $i++) {
            $ots[$i]->start_time = $start[$i];
            $ots[$i]->end_time = $end[$i];
            $ots[$i]->save();
        }

        session()->flash('success', 'Order times updated successfully');
        return back();
    }

    public function deliverytime() {
        return view('admin.product.order.delivery_time.index');
    }

    public function timeframes(Request $request) {
        $data['timeframes'] = TimeFrame::where('day', $request->day)->get();
        return view('admin.product.order.delivery_time.timeframes', $data);
    }

    public function timeframeStore(Request $request) {
        $rules = [
            'start' => 'required',
            'end' => 'required',
            'max_orders' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $tf = new TimeFrame;
        $tf->day = $request->day;
        $tf->start = $request->start;
        $tf->end = $request->end;
        $tf->max_orders = $request->max_orders;
        $tf->save();

        Session::flash('success', 'Time frame added successfully!');
        return "success";
    }

    public function timeframeUpdate(Request $request) {
        $rules = [
            'start' => 'required',
            'end' => 'required',
            'max_orders' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $tf = TimeFrame::find($request->timeframe_id);
        $tf->start = $request->start;
        $tf->end = $request->end;
        $tf->max_orders = $request->max_orders;
        $tf->save();

        Session::flash('success', 'Time frame updated successfully!');
        return "success";
    }

    public function timeframeDelete(Request $request)
    {

        $tf = TimeFrame::findOrFail($request->timeframe_id);
        $tf->delete();

        Session::flash('success', 'Time frame deleted successfully!');
        return back();
    }

    public function deliveryStatus(Request $request) {
        $bes = BasicExtended::all();
        foreach ($bes as $key => $be) {
            $be->delivery_date_time_status = $request->delivery_date_time_status;
            $be->delivery_date_time_required = $request->delivery_date_time_required;
            $be->save();
        }

        Session::flash('success', 'Status updated successfully!');
        return back();
    }

    public function orderclose(Request $request) {
        $rules = [
            'order_close' => 'required',
        ];

        $messages = [];

        if ($request->order_close == 1) {
            $rules['order_close_message'] = 'required|max:255';
            $messages['order_close_message.required'] = 'The message field is required';
            $messages['order_close_message.max'] = 'The message field cannot contain more than 255 characters';
        }

        $request->validate($rules, $messages);

        $bes = BasicExtended::all();
        foreach ($bes as $key => $be) {
            $be->order_close = $request->order_close;
            if ($request->order_close == 1) {
                $be->order_close_message = $request->order_close_message;
            }
            $be->save();
        }

        Session::flash('success', 'Status updated successfully!');
        return back();
    }

}
