<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }


    public function Penjualan()
    {
        $user = User::all();
        return view('admin.Penjualan', compact('user'));
    }

    public function User()
    {
        $user = User::all();
        return view('admin.User', compact('user'));
    }

    public function proses_CreateUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());
        
        return redirect()->route('User');
    }

    public function proses_EditUser(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'role' => 'required|in:admin,employee',
            'password' => 'nullable|min:6',
        ]);

        $edit_user = User::find($id);

        $edit_user->email = $request->email;
        $edit_user->name = $request->name;
        $edit_user->role = $request->role;

        if ($request->filled('password')) {
            $edit_user->password = Hash::make($request->password);
        }

        $edit_user->save();

        return redirect()->route('User');
    }

    public function proses_DeleteUser($id)
    {
        $delete_user = User::find($id);
        if ($delete_user) {
            $delete_user->delete();
        }
        return redirect()->route('User');
    }

    public function Product()
    {
        $Product = Product::all();
        return view('admin.Product', compact('Product'));
    }

    public function proses_TambahProduct(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $img = $request->file('img');
        $imgName = $request->name . '-' . now()->timestamp . '.' . $img->getClientOriginalExtension();
        if (!Storage::exists('cover')) {
            Storage::makeDirectory('cover');
        }
        $img->storeAs('public/cover', $imgName);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'img' => $imgName,
        ]);

        // Redirect ke halaman produk setelah berhasil
        return redirect()->route('Product');
    }

    public function proses_EditProduct(Request $request, $id)
    {
        $Product_update = Product::find($id);
        $Product_update->name = $request->name;
        $Product_update->price = $request->price;
        $img = $request->file('img');

        // Buat nama unik untuk file gambar
        $imgName = $request->name . '-' . now()->timestamp . '.' . $img->getClientOriginalExtension();

        // Simpan file gambar ke direktori penyimpanan
        if (!Storage::exists('cover')) {
            Storage::makeDirectory('cover');
        }
        $imgName->storeAs('public/cover', $imgName);

        $Product_update->img = $imgName;

        $Product_update->save();

        return redirect()->route('Product');
    }

    public function proses_UpdateStok(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required',
        ]);

        $Update_stok = Product::find($id);
        $Update_stok->stock = $request->stock;

        $Update_stok->save();

        return redirect()->route('Product');
    }

    public function proses_DeleteProduct($id)
    {
        // Menggunakan metode find untuk menemukan Produk berdasarkan id
        $Produk_delete = Product::find($id);

        // Periksa apakah Produk ditemukan sebelum mencoba menghapus
        if ($Produk_delete) {
            // Menghapus Produk
            $Produk_delete->delete();
        }

        // Mengembalikan pengguna ke rute 'Produk' setelah menghapus
        return redirect()->route('Product');
    }
}