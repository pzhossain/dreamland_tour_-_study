<?php

namespace App\Http\Controllers\BackEnd;

use Service;
use Inertia\Inertia;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ServiceSaveRequest;

class ServiceController extends Controller
{
    //service list
    public function serviceList()
    {
        $services = Services::all();
        return Inertia::render('BackEnd/Service/ServiceListPage', ['services' => $services]);
    }

    //service save page
    public function serviceSavePage(Request $request)
    {
        $service_id = $request->service_id;
        $service = Services::find($service_id);
        return Inertia::render('BackEnd/Service/ServiceSavePage', ['service' => $service]);
    }

    //save service
    public function saveService(ServiceSaveRequest $request)
    {
        $data = [
            'service_description' => $request->service_description,
        ];

        // Check if image file is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store the image in storage/app/public/service/
            $image->storeAs('service', $imageName, 'public');

            $data['image'] = $imageName;
        }

        Services::create($data);

        return back()->with('success', 'Service saved successfully!');
    }

    //update service
    public function updateService(ServiceSaveRequest $request, $id)
    {
        $service = Services::findOrFail($id);

        $data = [
            'service_description' => $request->service_description,
        ];

        // Check if image file is uploaded
        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($service->image && Storage::disk('public')->exists('service/' . $service->image)) {
                Storage::disk('public')->delete('service/' . $service->image);
            }

            // Store new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('service', $imageName, 'public');

            $data['image'] = $imageName;
        }

        $service->update($data);

        return back()->with('success', 'Service updated successfully!');
    }

    //delete service

    public function deleteService($id)
    {
        $service = Services::findOrFail($id);

        // Delete image from storage if it exists
        if ($service->image && Storage::disk('public')->exists('service/' . $service->image)) {
            Storage::disk('public')->delete('service/' . $service->image);
        }
        $service->delete();

        return back()->with('success', 'Service deleted successfully!');
    }

}
