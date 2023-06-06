<?php

namespace App\Http\Controllers;

// use App\{Admin, User};
use App\Http\Requests\AdminRequest;
use App\Imports\AdminImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\{Str, Carbon};
use Illuminate\Support\Facades\{Auth, Storage};
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function addAdmin()
    {
        return view('admin.add');
    }

    public function postAddAdmin(AdminRequest $request)
    {
        // dd($request->all());
        $data = $request->all();

        $data['roles']          = 'ADMIN';
        $data['name']           = $request->nama;
        $data['email']          = $request->email;
        $data['password']       = bcrypt($request['password']);
        $data['remember_token'] = Str::random(40);
        $user = User::create($data);

        // // profile
        // $file = $request->file('profile');
        // $filenameProfile = sha1($user->name . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
        // $file->storeAs('images/profile', $filenameProfile);

        // // profile
        // $file = $request->file('ktp');
        // $filenameKtp = sha1($user->name . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
        // $file->storeAs('images/ktp', $filenameKtp);

        $data['user_id']       = $user->id;
        $data['nip']           = $request->nip;
        $data['alamat_1']      = $request->alamat_1;
        $data['alamat_2']      = $request->alamat_2;
        $data['nama']          = $user->name;
        $data['provinsi']      = $request->provinsi;
        $data['kabkota']       = $request->kabkota;
        $data['no_hp']         = $request->no_hp;
        // $data['profile']       = $filenameProfile;
        // $data['ktp']           = $filenameKtp;
        $data['tempat_lahir']  = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        Admin::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableAdmin()
    {
        $users = User::all();

        return view('admin.table', compact('users'));
    }

    public function detailAdmin($id)
    {
        $users = User::findOrFail($id);

        return view('admin.detail', compact('users'));
    }

    public function editAdmin($id)
    {
        $users = User::findOrFail($id);

        return view('admin.edit', compact('users'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $this->validate($request, [
            'email'   => 'string|email',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        DB::table('users')
            ->where('id', $users->id)
            ->update([
                'first_name'   => $request->first_name,
                'last_name'   => $request->last_name,
                'email'  => $request->email,
                'phone'  => $request->phone,
                'role'  => 'admin',
        ]);

        DB::table('users')
            ->where('id', $users->id)
            ->update([
                'first_name'          => $request->first_name,
                'last_name'         => $request->last_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function editPasswordAdmin($id)
    {
        $users = User::findOrFail($id);

        return view('admin.edit-password', compact('users'));
    }

    public function updatePasswordAdmin(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $this->validate($request,[
            'password' => 'required|string|min:8'
        ]);

        DB::table('users')
            ->where('id', $users->id)
            ->update([
                'password'  => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Password Berhasil di Ganti!');
    }

    public function destroyAdmin($id)
    {
        $users = User::findorFail($id);
        $users->delete();


        return redirect()->back()->with('success', 'Admin tersebut berhasil di hapus!');
    }

    public function logoutAdmin()
    {
        Auth::logout();

        return redirect()->route('login.admin');
    }
}
