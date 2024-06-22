<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use app\Helpers\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index() // Memanggi data di tabela user
    {
        $data = [
            'users' => $this->UserModel->alldata(),
        ];
        return view('v_user', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'kode_dosen' => 'required',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'kode_dosen' => $request->kode_dosen,
            'password' => Hash::make($request->password),
        ]);
        $user->attachRole($request->role_id);
        event(new Registered($user));

        if ($request->input('redirect') !== null) {
            return redirect($request->input('redirect'));
        } else {
            return redirect()->route('dashboard.users');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'kode_dosen' => 'required',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'kode_dosen' => $request->kode_dosen,
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8',
            ]);

            $userData['password'] = Hash::make($request->password);
        }

        $this->UserModel->updatedata($id, $userData);

        return redirect()->route('dashboard.users')->with('pesan', 'Data Telah Berhasil Diupdate !!!');
    }


    public function destroy($id)
    {
        if (!$this->UserModel->detailUser($id)) {
            abort(404);
        }
        $data = [
            'users' => $this->UserModel->detailUser($id),
        ];
        $this->UserModel->hapusdata($id, $data);
        return redirect()->route('dashboard.users')->with('pesan', 'Data Telah Berhasil DiHapus !!!');
    }
}
