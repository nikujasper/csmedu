<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Session as Session;
use App\Models\FormData;
use App\Models\State;
use App\Models\User;

class anoController extends Controller
{
    public function joinUsingORM(Request $request)
    {
        $getst = User::join('states', 'states.scode', '=', 'users.scode')
            ->select('users.name', 'states.sname', 'users.scode')
            ->get();

        $st = DB::table('states')->get();

        $scode = $request->input('scode');
        $u_s_data = DB::table('users as u')
            ->select('s.sname', 'u.name')
            ->leftJoin('states as s', 's.scode', '=', 'u.scode')
            ->where('s.scode', $scode)
            ->get();


        return view('stateJoinORM', compact('getst', 'st', 'u_s_data'));
    }


    public function getState2()
    {
        $getst = User::with('fetchState')
            ->where(['id' => 2])->get();
        dd($getst);
    }






    public function FillState(Request $request)
    {
        $arr = $request->all();
        State::create([
            'sname' => $arr['sname'],
            'scode' => $arr['scode']
        ]);
        return view('state');
    }

    public function FormData(Request $request)
    {
        $arr = $request->all();

        $data = FormData::create([

            // 'name'=>"Raja",
            // 'mobile'=>'9090909090',
            // 'email'=>'raja@gmail.com'
            'name' => $arr['name'],
            'mobile' => $arr['mobile'],
            'email' => $arr['email'],
        ]);
        return view('form');
    }



    public function samepageEditAjax(Request $request)
    {
        $email = $request->email;
        $user = DB::select("select name,id,email,mobile,role,status from user_master where email='$email'");
        return  json_encode($user);
    }



    public function samepageDeleteAjax(Request $request)
    {
        $email = $request->email;
        DB::delete("DELETE FROM user_master WHERE email = ?", [$email]);
        $users = DB::table('user_master')->get();
        return json_encode($users);
    }



    public function samepageedit(Request $request)
    {
        $email = $request->email;
        $user = DB::select("select * from user_master where email='$email'");
        $user1 = DB::table('user_master')->get();
        return view('samepage', ['result' => $user, 'users' => $user1]);
    }




    public function samepageupdate(Request $request)
    {
        $arr = $request->all();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageData = file_get_contents($image->getRealPath());
            $imageName = $image->getClientOriginalName();
        } else {
            // If no new photo is provided, retain the existing values
            $imageName = $arr['image_name'] ?? null;
            $imageData = $arr['image_data'] ?? null;
        }
        DB::update("update user_master set name=?,mobile=?,status=?,role=?, image_name=?, image_data=? where email=?", [$arr['name'], $arr['mobile'], $arr['status'], $arr['role'], $imageName, $imageData, $arr['email']]);
        $user = DB::table('user_master')->get();
        return view('samepage', ['users' => $user]);
        // return json_encode($arr);
    }





    public function samepageupdateajax(Request $request)
    {
        $arr = $request->all();
        DB::update("update user_master set name=?,mobile=?,status=?,role=? where email=?", [$arr['name'], $arr['mobile'], $arr['status'], $arr['role'], $arr['email']]);
        // $user = DB::table('user_master')->get();
        // return view('samepage', ['users' => $user]);
        return json_encode($arr);
    }

    public function samepagedelete(Request $request)
    {
        $email = $request->email;
        DB::delete("delete from user_master where email='$email'");
        $user = DB::table('user_master')->get();
        return view('samepage', ['users' => $user]);
    }



    public function update(Request $request)
    {
        $arr = $request->all();
        DB::update("update user_master set name=?,mobile=?,status=?,role=? where email=?", [$arr['name'], $arr['mobile'], $arr['status'], $arr['role'], $arr['email']]);

        $user = DB::table('user_master')->get();
        return view('viewusers', ['users' => $user]);
    }


    public function deleteuser(Request $request)
    {
        $email = $request->email;
        DB::delete("delete from user_master where email='$email'");
        $user = DB::table('user_master')->get();
        return view('viewusers', ['users' => $user]);
    }


    public function edituser(Request $request)
    {
        $email = $request->email;
        DB::select("select * from user_master where email=',$email'");
        $user = DB::table('user_master')->get();
        return view('edit', ['users' => $user]);
    }



    public function add(Request $request)
    {
        $input = $request->all();
        $result = $input["fno"] + $input["sno"];
        $result = "Result is:" . $result;
        return view('add', ['result' => $result]);
    }




    public function registerfun(Request $request)
    {
        // dd("Register function");
        $input = $request->all();
        DB::table('user_master')->insert(['name' => $request->name, 'email' => $input['email'], 'password' => $input['password'], 'mobile' => $input['mobile'], 'role' => $input['role'], 'status' => '1']);
        $message = "Registration Successful";
        return view('register', ['message' => $message]);
    }




    public function loginfun(Request $request)
    {
        $input = $request->all();
        $user = DB::table('user_master')->where('email', $input['email'])->where('password', $input['password'])->first();
        if ($user) {
            // $message = "Login success..!!";
            // return view('login', ['message' => $message]);
            session::put('name', $user->name);
            Session::put('email', $user->email);
            return view('userhome');
        } else {
            $message = "Invalid login details";
            return view('login', ['message' => $message]);
        }
    }




    public function getState(Request $request)
    {
        $c = $request->c;
        if ($c == "India") {
            return response()->json([
                '101' => 'Odisha',
                '102' => 'Gujrat',
            ]);
        }
        if ($c == "pakistan") {
            return response()->json([
                '101' => 'Balochistan',
                '102' => 'Punjab',
            ]);
        }
    }



    public function getDistrict(Request $request)
    {
        $c = $request->c;
        if ($c == "Balochistan") {
            return response()->json([
                '1011' => 'Awaran',
                '1012' => 'Barkhan',
            ]);
        }
        if ($c == "Punjab") {
            return response()->json([
                '1021' => 'Attock',
                '1022' => 'Chiniot',
            ]);
        }
        if ($c == "Odisha") {
            return response()->json([
                '1021' => 'Angul',
                '1022' => 'Deogarh',
            ]);
        }
        if ($c == "Gujrat") {
            return response()->json([
                '1021' => 'Ahmedabad',
                '1022' => 'Jamnagar',
            ]);
        }
    }
}
