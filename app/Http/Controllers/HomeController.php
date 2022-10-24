<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $uploadPath = "storage/data/";
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function store_data(Request $request){

      
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required','unique',
        ]);
        $formFileName = "photo_file";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $data = new Data;
        $data->name = $request->name;
        $data->email = $request->email;
        if ($fileFinalName != "") {
            $data->profile_image = $fileFinalName;
        }
        $data->phone = $request->phone;
        $data->dob = $request->dob;
        $data->address = $request->address;
        $data->state = $request->state;
        $data->gender = $request->gender;
        $data->save();
        
        return redirect()->route('dashboard')->with('done message');
    }

    public function display_data(){
        $data = Data::paginate(10);

        return view('dashboard')->with('data' , $data);
    }
    
}
