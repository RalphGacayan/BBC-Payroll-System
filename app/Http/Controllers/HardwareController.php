<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hardware;
use Illuminate\Http\Request;
use App\Http\Requests\HardwareRequest;
use Illuminate\Support\Facades\File;

class HardwareController extends Controller
{
    public function index()
    {
        $hardwares = Hardware::all();
        return view('hardware.index',  compact('hardwares'));

    }

    public function create()
    {
      
        return view('hardware.create');

    }

   
    public function store(HardwareRequest $request)
    {
        $data = $request->validated();
    	$hardware = new Hardware;
        $hardware->unit = $data['Unit'];
        $hardware->asset_name = $data['Asset'];
        $hardware->model = $data['Model'];
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = time() .'.'. $file->getClientOriginalExtension();
            $file->move('uploads/hardware/', $filename);
            $hardware->image = $filename;
        } 
        $hardware->serial_number = $data['Serial_no'];
        $hardware->status = $data['Status'];
        $hardware->date = $data['Date'];
        $hardware->company = $data['Company'];
        $hardware->manufacturer = $data['Manufacturer'];
        $hardware->remarks = $data['Remarks'];
        $hardware->assigned_to = $data['Assigned'];
        $hardware->no = Hardware::max('no') + 1;
        $hardware->save();
        return redirect('/hardware')->with('message','Hardware added Succesfully');

    }
  
    public function edit($hardware_id)
    {
        $hardware = Hardware::find($hardware_id);
        return view('hardware.edit', compact('hardware'));
    }

     public function update(HardwareRequest $request, $hardware_id)

    {
        $data = $request->validated();

        $hardware =  Hardware::find($hardware_id);
        $hardware->unit =$data['Unit'];
        $hardware->item_name =$data['Item'];
        $hardware->model =$data['Model'];
        
        if ($request->hasFile('image')) 
        {
            $destination = 'uploads/hardware/'.$hardware->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extention;
            $file->move('uploads/hardware/', $filename);
            $hardware->image = $filename;
        } 
            $hardware->status =$data['Status'];
            $hardware->date =$data['Date'];
            $hardware->company =$data['Company'];
            $hardware->update();
            return redirect('/hardware')->with('message','Hardware Updated Succesfully');
    }
    public function destroy($hardware_id)
    {
        $hardware = Hardware::find($hardware_id);
        if($hardware)
        {
          $hardware->delete();
          return redirect('/hardware')->with('message','Hardware Deleted Successfully');
        }
        else
        {
          return redirect('/hardware')->with('messasge','No Hardware Id Found');

        }
    }

}
