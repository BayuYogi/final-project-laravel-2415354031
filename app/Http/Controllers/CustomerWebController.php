<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Wajib di-import untuk interaksi ke database query

class CustomerWebController extends Controller
{
    /**
     * Menampilkan daftar customer di halaman utama
     */
    public function index()
    {
        // Mengambil seluruh baris data dari tabel customers
        $customers = DB::table('customers')->get();

        // Mengirimkan data variable $customers ke file index.blade.php
        return view('customers.index', compact('customers'));
    }

    /**
     * Menyimpan data baru yang dikirim dari Modal Form Add Data
     */
    public function store(Request $request)
    {
        // 1. Jalankan Validasi Data terlebih dahulu
        $request->validate([
            'customer_id' => 'required',
            'name'        => 'required',
            'email'       => 'required|email',
            'address'     => 'required',
            'status'      => 'required',
        ]);

        // 2. Query Insert Data ke dalam tabel 'customers'
        DB::table('customers')->insert([
            'customer_id' => $request->customer_id,
            'name'        => $request->name,
            'email'       => $request->email,
            'address'     => $request->address,
            'status'      => $request->status,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        // 3. Mengalihkan halaman kembali ke index bersama flash session 'success'
        return redirect()->route('customers.index')->with('success', 'Data Customer baru berhasil disimpan!');
    }
}