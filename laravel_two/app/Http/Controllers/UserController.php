<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function setup()
    {
        return View('setup');
    }
    public function author()
    {
        return view('author');
    }
    public function xesog()
    {
        return view('xesog');
    }
    public function setin(Request $request)
    {
        $name = $request->name;
        $login = $request->login;
        $password = $request->password;
        //echo $_POST['name1'];
        DB::insert('insert into users_from_ru (name, login, password) values (?,?,?)', [$name, $login, $password]);
    }
}