<?php

namespace App\Http\Controllers\BackEnd;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCategorySaveRequest;

class ServiceCategoryController extends Controller
{
    //service category list
    public function ServiceCategoryList()
    {
        $serviceCategories = ServiceCategory::all();
        return Inertia::render('BackEnd/ServiceCategory/ServiceCategoryListPage', ['serviceCategories' => $serviceCategories]);
    }

    //service category save page
    public function serviceCategorySavePage(Request $request)
    {
        $serviceCategory=ServiceCategory::find($request->service_category_id);
        return Inertia::render('BackEnd/ServiceCategory/ServiceCategorySavePage',['serviceCategory'=>$serviceCategory]);
    }

    //save service category
    public function saveServiceCategory(ServiceCategorySaveRequest $request)
    {
        ServiceCategory::create([
            'service_name'=>$request->service_name,
            'service_title'=>$request->service_title
        ]);
        return redirect()->back()->with(['status'=>true,'message'=>'Service Category Saved Successfully']);
    }

    //update service category
    public function updateServiceCategory(ServiceCategorySaveRequest $request,$id)
    {
        ServiceCategory::where('id',$id)->update([
            'service_name'=>$request->service_name,
            'service_title'=>$request->service_title
        ]);
        return redirect()->back()->with(['status'=>true,'message'=>'Service Category Updated Successfully']);
    }

    //delete service category
    public function deleteServiceCategory($id)
    {
        ServiceCategory::where('id',$id)->delete();
        return redirect()->back()->with(['status'=>true,'message'=>'Service Category Deleted Successfully']);
    }
}
