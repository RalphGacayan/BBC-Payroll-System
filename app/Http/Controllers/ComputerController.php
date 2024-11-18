<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Computer;
use App\Http\Requests\ComputerRequest;
use Illuminate\Support\Facades\File;


class ComputerController extends Controller
{
    public function index()
    {
        $computers = Computer::all();
        return view('computer.index',  compact('computers'));

    }

    public function create()
    {
      
        return view('computer.create');

    }

   
    public function store(ComputerRequest $request)
    {
        $data = $request->validated();
    	$computer = new Computer;
        $computer->unit = $data['Unit'];
        $computer->item_name = $data['Item'];
        $computer->model = $data['Model'];
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = time() .'.'. $file->getClientOriginalExtension();
            $file->move('uploads/computer/', $filename);
            $computer->image = $filename;
        } 
        $computer->serial_number = $data['Serial_no'];
        $computer->status = $data['Status'];
        $computer->date = $data['Date'];
        $computer->company = $data['Company'];
        $computer->no = Computer::max('no') + 1;
        $computer->save();
        return redirect('/computer')->with('message','Computer added Succesfully');

    }
  
    public function edit($computer_id)
    {
        $computer = Computer::find($computer_id);
        return view('computer.edit', compact('computer'));
    }

     public function update(ComputerRequest $request, $computer_id)

    {
        $data = $request->validated();

        $computer =  Computer::find($computer_id);
        $computer->unit =$data['Unit'];
        $computer->item_name =$data['Item'];
        $computer->model =$data['Model'];
        
        if ($request->hasFile('image')) 
        {
            $destination = 'uploads/computer/'.$computer->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extention;
            $file->move('uploads/computer/', $filename);
            $computer->image = $filename;
        } 
            $computer->status =$data['Status'];
            $computer->date =$data['Date'];
            $computer->company =$data['Company'];
            $computer->update();
            return redirect('/computer')->with('message','Computer Updated Succesfully');
    }
    public function destroy($computer_id)
    {
        $computer = Computer::find($computer_id);
        if($computer)
        {
          $computer->delete();
          return redirect('/computer')->with('message','Computer Deleted Successfully');
        }
        else
        {
          return redirect('/computer')->with('messasge','No Computer Id Found');

        }
    }

}

