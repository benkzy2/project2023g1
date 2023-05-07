<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Validator;

class CustomerController extends Controller
{
    public function index(Request $request) {
        $term = $request->term;
        $data['customers'] = Customer::when($term, function ($query, $term) {
            return $query->where('name', 'LIKE', '%' . $term . '%')
            ->orWhere('phone', 'LIKE', '%' . $term . '%');
        })
        ->orderBy('id', 'DESC')->paginate(10);
        return view('admin.customers.index', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'phone' => 'required|unique:customers',
            'name' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();

        Session::flash('success', 'Customer added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $customer = Customer::findOrFail($request->customer_id);

        $rules = [
            'phone' => [
                'required',
                Rule::unique('customers')->ignore($customer->id),
            ],
            'name' => 'required|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }


        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();

        Session::flash('success', 'Customer updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $customer = Customer::findOrFail($request->customer_id);
        $customer->delete();

        Session::flash('success', 'Customer deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $customer = Customer::findOrFail($id);
            $customer->delete();
        }

        Session::flash('success', 'Customers deleted successfully!');
        return "success";
    }
}
