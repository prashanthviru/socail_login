<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CountryModel;
use App\Models\ProfileModel;
use App\Models\State;
use Illuminate\Http\Request;
use Image;
use Yajra\Datatables\Datatables;

class ProfileController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {

            $query = ProfileModel::with(['profile_state','profile_country','profile_city']);
            if(isset($request->name) && !empty($request->name)){
                $query->where('name',$request->name);
            }
            if(isset($request->email) && !empty($request->email)){
                $query->where('email',$request->email);
            }
            if(isset($request->age) && !empty($request->age)){
                $query->whereYear('dob',date('Y') + $request->age);
            }
            if(isset($request->status) &&  $request->status != ""){
                $query->where('status',$request->status);
            }
            $query = $query->get();


            // print_r($query); die;
            // $query = Profile::all();

                    return Datatables::of($query)
                    ->addIndexColumn()
                    ->addColumn('profile_pic',function ($data){
                        return ' <img src="'.URL("").'/images/profiles/thumbnail/'.$data->profile_pic.'"'. '> ';
                    })
                    ->addColumn('name',function ($data){
                        return $data->name;
                    })
                    ->addColumn('email',function ($data){
                        return $data->email;
                    })
                    ->addColumn('dob',function ($data){
                        // return $data->dob;
                        return (date('Y') - date('Y',strtotime($data->dob)));
                    })
                    ->addColumn('status',function ($data){
                        if($data->status == '1'){
                            return "Active";
                        }else{
                            return "Inactive";

                        }
                    })

                    ->addColumn('action',function ($data){
                        if($data->status == 0){
                            return '<button class="btn btn-approve_reject waves-effect waves-light btn-success status_approve" onclick="status_update('.$data->PROFILE_ID.',1)"  data-id="'.$data->PROFILE_ID.'"><i class="icofont icofont-check-circled"></i></button> &nbsp; <button class="btn btn-approve_reject waves-effect waves-light btn-danger status_reject" onclick="status_update('.$data->id.',2)"  data-id="'.$data->id.'"><i class="icofont icofont-close-circled"></i></button>';
                        }else if($data->status == 1){
                            return '<button class="btn btn-approve_reject waves-effect waves-light btn-success"><i class="icofont icofont-check-circled"></i></button> &nbsp;<button class="btn btn-approve_reject waves-effect waves-light btn-success"><i class="icofont icofont-ui-delete"></i></button> &nbsp; <button class="btn btn-approve_reject waves-effect waves-light btn-success"><i class="icofont icofont-check-circled"></i></button> &nbsp;';
                        }
                    })
                    ->addColumn('edit',function ($data){

                            return ' <a href="'.url('/').'/edit_profile/'.$data->id.'"><button class="btn btn-approve_reject waves-effect waves-light btn-success"><i class="icofont icofont-ui-edit"></i></button></a> &nbsp;<button class="btn btn-approve_reject waves-effect waves-light btn-success status_approve" onclick="getProfile(`'.$data->id.'`)"  data-id="'.$data->id.'"><i class="icofont icofont-info-circle"></i></button> &nbsp; <button class="btn btn-approve_reject waves-effect waves-light  status_approve btn-danger" onclick="delete_profile('.$data->id.')"  data-id="'.$data->id.'"><i class="icofont icofont-ui-delete"></i></button> &nbsp; ';

                    })
                    ->rawColumns(['profile_pic','action','edit'])
                    ->make(true);
        }
        $profile = ProfileModel::all();
        return view('profile.list_profile')->with('profile',$profile);
    }

    public function create(){
        $countries = CountryModel::all();
        return view('profile.add_profile')->with('countries',$countries);
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'status' => 'required',
            'pincode' => 'required',
            'status' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profile = ProfileModel::where('email',$request->email)->first();
        if(!empty($profile)  ){
            return back()->withErrors(["email"=> "Email id is already taken!!"]);
        }

        // $imageName = time().'.'.$request->profile_image->extension();

        // $request->profile_image->move(public_path('images/profiles'), $imageName);

        $image = $request->file('profile_image');
        $input['product_image'] = time() . '.' . $image->extension();

        // Get path of thumbnails folder from /public
        $thumbnailFilePath = public_path('images/profiles/thumbnail');

        $img = Image::make($image->path());

        $img->resize(110, 110, function ($const) {
            $const->aspectRatio();
        })->save($thumbnailFilePath . '/' . $input['product_image']);

        // Product images folder
        $ImageFilePath = public_path('images/profiles');

        // Store product original images
        $image->move($ImageFilePath, $input['product_image']);

        if(empty($profile)){
            $profile =  new ProfileModel();
        }
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->address = $request->address;
        $profile->country_id = $request->country;
        $profile->state_id = $request->state;
        $profile->city_id = $request->city;
        $profile->dob = $request->dob;
        $profile->status = $request->status;
        $profile->education = $request->education;
        $profile->pincode = $request->pincode;
        $profile->profile_pic = $input['product_image'];;
        $profile->save();


        return redirect('/add_profile')->with('success', 'Profile added sent successfully.');
    }

    public function update(Request $request){
        $validated = $request->validate([
            'id' =>'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'status' => 'required',
            'pincode' => 'required',
            'status' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profile = ProfileModel::find($request->id);
        if(empty($profile)  ){
            return back()->withErrors(["error"=> "Some thing went wrong"]);
        }

        // $imageName = time().'.'.$request->profile_image->extension();

        // $request->profile_image->move(public_path('images/profiles'), $imageName);

        $image = $request->file('profile_image');
        if(!empty($image)){


        $input['product_image'] = time() . '.' . $image->extension();

        // Get path of thumbnails folder from /public
        $thumbnailFilePath = public_path('images/profiles/thumbnail');

        $img = Image::make($image->path());

        $img->resize(110, 110, function ($const) {
            $const->aspectRatio();
        })->save($thumbnailFilePath . '/' . $input['product_image']);

        // Product images folder
        $ImageFilePath = public_path('images/profiles');

        // Store product original images
        $image->move($ImageFilePath, $input['product_image']);
     }

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->address = $request->address;
        $profile->country_id = $request->country;
        $profile->state_id = $request->state;
        $profile->city_id = $request->city;
        $profile->dob = $request->dob;
        $profile->status = $request->status;
        $profile->education = $request->education;
        $profile->pincode = $request->pincode;
        if(!empty($image)){
            $profile->profile_pic = $input['product_image'];;
        }
        $profile->save();


        return redirect('/list_profile')->with('success', 'Profile Updated  successfully.');
    }

    public function show(Request $request,$id){
        $profile = ProfileModel::find($id);
        $countries = CountryModel::all();
        $state = State::where('country_id',$profile->country_id)->get();
        $city = City::where('state_id',$profile->state_id)->get();
        return view('profile.edit_profile')->with('profile',$profile)->with('countries',$countries)->with('state',$state)->with('city',$city);
    }

    public function delete(Request $request){
        $id = $request->id;
        $delete = ProfileModel::find($id);
        $delete->delete();

        return response()->json(array('message' => 'Profile Deleted successfully', 'success' => true ));

    }

    public function getState($id){
        $state = State::where('country_id',$id)->get();
        return response()->json($state);
    }

    public function getCity($id){
        $city = City::where('state_id',$id)->get();
        return response()->json($city);
    }

    public function getProfile(Request $request,$id){
        $profile = ProfileModel::with(['profile_state','profile_country','profile_city'])->find($id);
        return response()->json($profile);
    }
}
