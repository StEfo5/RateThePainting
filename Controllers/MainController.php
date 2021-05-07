<?php

namespace App\Http\Controllers;

use App\Painting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class MainController extends Controller
{    
    public function upload()
    {
        return view('upload');
    }

    public function upload_intoDB(Request $request){
    	$userId = Auth::user()->id;

    	$valid = $this->validate($request, [
    		'image' => 'required|max:64',
    		'name' => 'required|max:31',
    		'description' => 'required|min:15|max:511',
    		'price' => 'required'
    	]);

    	$imagetmp=file_get_contents($_FILES['image']['tmp_name']);
    	$imageType = $_FILES['image']['type'];

    	$image = new Painting();
    	$image->image = $imagetmp;
    	$image->name = $request->input('name');
    	$image->description = $request->input('description');
    	$image->authorPrice = $request->input('price');
    	$image->userPrice = $request->input('price');
    	$image->authorId = $userId;
    	$image->type = $imageType;

    	$image->save();

    	DB::table('users')->where('id', $userId)->update(['havePainting' => 1]);

    	return redirect()->route('upload');
    }

    public function grade(){
    	$userId = Auth::user()->id;
    	$users = DB::table('users')->where([
    		['id','!=', $userId],
    		['havePainting', 1],
    	])->orderBy('numberOfPoints', 'desc')->get();
    	$user = $users[rand(0,rand(0,count($users)-1))];
    	$paintings = DB::table('paintings')
    		->where('authorId', $user->id)
    		->orderBy('created_at', 'desc')
    		->get();
    	$painting = $paintings[rand(0, rand(0, count($paintings)-1))];
    	return view('grade', ['painting' => $painting]);
    }

    public function grade_decision(Request $request){
    	$bonusForGrade = 2;
    	$bonusForCorrectness = 1;
    	$percentСhange = 0.1;
    	$userId = Auth::user()->id;
    	$numberOfPoints = DB::table('users')
    		->where('id', $userId)
    		->value('numberOfPoints')+$bonusForGrade;
    	DB::table('users')
    		->where('id', $userId)
    		->update(['numberOfPoints' => $numberOfPoints]);
    	if ($request->input('equally')!=Null) {
    		$authorsNumberOfPoints = DB::table('users')
    			->where('id', $request->input('authorId'))
    			->value('numberOfPoints')+$bonusForCorrectness;
    		DB::table('users')
    			->where('id', $request->input('authorId'))
    			->update(['numberOfPoints' => $authorsNumberOfPoints]);
    	}
    	else {
    		$price = DB::table('paintings')
    			->where('id', $request->input('id'))
    			->value('userPrice');
    		if($request->input('less')!=Null) $price *= (1-$percentСhange);
    		else $price *= (1+$percentСhange);
    		DB::table('paintings')
    			->where('id', $request->input('id'))
    			->update(['userPrice' => $price]);
    	} 
    	return redirect()->route('grade');
    }

    public function paintings() {
    	$paintings = DB::table('paintings')
    		->join('users', 'paintings.authorId', '=', 'users.id')	
    		->select('paintings.*', 'users.name as authorName')
    		->orderBy('userPrice', 'desc')
    		->get();;
    	return view('paintings', ['paintings' => $paintings]);
    }

    public function users() {
    	$users = DB::table('users')
    		->orderBy('numberOfPoints', 'desc')
    		->get();
    	return view('users', ['users' => $users]);
    }

    public function profile() {
    	$paintings = DB::table('paintings')
    		->where('authorId', Auth::user()->id)
    		->orderBy('userPrice', 'desc')
    		->get();
    	return view('profile', ['paintings' => $paintings]);
    }

    public function profile_change(Request $request){
    	$valid = $this->validate($request, [
    		'name' => 'required',
    		'email' => 'required',
    		'avatar' => 'max:64'
    	]);
    	if ($_FILES['avatar']['tmp_name']!=Null) {
    		$avatarTmp=file_get_contents($_FILES['avatar']['tmp_name']);
    	}
    	else $avatarTmp = Null;
    	$avatarType = $_FILES['avatar']['type'];
    	DB::table('users')
    		->where('id', Auth::user()->id)
    		->update([
    			'name' => $request->input('name'),
    			'email' => $request->input('email'),
    			'avatar' =>	$avatarTmp,
    			'avatarType' => $avatarType
    		]);
    	return redirect()->route('profile');
    }
}
