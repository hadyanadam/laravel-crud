<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Customer;
use \App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }


    public function create()
    {
        return view('customer.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'email' => 'required|max:25',
            'alamat' => 'max:50',
            'tempat_lahir' => 'max:15'
        ]);
        Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);
        return redirect('/customer')->with('status', 'Data customer berhasil ditambahkan');
    }


    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }


    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }


    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama' => 'required|max:25',
            'email' => 'required|max:25',
            'alamat' => 'max:50',
            'tempat_lahir' => 'max:15'
        ]);

        Customer::where('id', $customer->id)
            ->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir
            ]);

        return redirect('/customer')->with('status', 'Data customer berhasil diupdate');
    }


    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);

        return redirect('/customer')->with('status', 'Data customer berhasil didelete');
    }

    public function export()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }

    public function printPDF()
    {
       // This  $data array will be passed to our PDF blade
       $data = [
          'title' => 'First PDF for Medium',
          'heading' => 'Hello from 99Points.info',
          'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'
        ];
        $pdf = PDF::loadView('customer.pdf_view', $data);
        return $pdf->download('medium.pdf');
    }

}
