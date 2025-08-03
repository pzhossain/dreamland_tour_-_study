<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Logo;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogoSaveRequest;

class LogoController extends Controller
{
    //logo list
    public function logoList(){
       $logos = Logo::all();
       return Inertia::render('BackEnd/Logo/LogoListPage', ['logos' => $logos]);
    }

    //logo save page
    public function logoSavePage(Request $request){
        $logo=Logo::find($request->logo_id);
        return Inertia::render('BackEnd/Logo/LogoSavePage',['logo'=>$logo]);
    }

    //logo save
    public function logoSave(LogoSaveRequest $request){

    }

}
