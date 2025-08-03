<?php

namespace App\Http\Controllers\FrontEnd;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\CountryDetail;
use App\Http\Controllers\Controller;

class CountryPageController extends Controller
{
    //country by id
    public function countryById($id)
    {
        $country = CountryDetail::find($id);
        return Inertia::render('FrontEnd/CountrySelectByIDPage', [
            'country' => $country,
        ]);
    }
}
