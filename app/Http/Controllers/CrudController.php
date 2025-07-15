<?php

namespace App\Http\Controllers;
use App\Models\crudModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use Alert;
use DB;
use Illuminate\Support\Facades\Hash;

class CrudController extends Controller
{
   
    



    public function index()

    {
    //   DB::enableQueryLog();
     //  $index=crudModel::all();   

     $index=crudModel::all();
     

    //    $queries = DB::getQueryLog($index);
    //    dd($queries);
             return view('index',compact('index'));
    }

    







    public function create()
    {
     
        return view('create'); 
    }

   








    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required', 
                'string', 
                'max:30',
            ],
            'email' => 'required|email|unique:studentdetails,email',
            'mobile' => 'required|numeric',
            'birthdate' => 'required|date',
            'username' => 'required|string',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/'
            ],
            'gender' => 'required|string',
            'country' => 'required|in:India,SriLanka,Others',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        //   crudModel::insert($request->all());
            $insert=new crudModel;
            $insert->name = $request->name;
            $insert->email = $request->email;
            $insert->mobile=$request->mobile;
            $insert->birthdate=$request->birthdate;
            $insert->username=$request->username;
            $insert->password = Hash::make($request->password); 
            $insert->gender=$request->gender;
            $insert->country=$request->country;

            $insert->save();

         

            //  return redirect('/post')->with('success', 'Form submitted successfully!') ;
            //  return redirect()->back()->with('success', 'Form submitted successfully');
            //  return redirect('/post.index');
            // return redirect()->route('post.index')->with('success', 'Form submitted successfully!');
            return redirect()->route('post.create')->with('alert', 'Form submitted successfully!');
        
    }







    public function show(string $id)
    {


        $show=crudModel::findOrFail($id);


        return view('show',compact('show'));
        
    }







    public function edit(string $id)
    {

         $edit=crudModel::findorFail($id);
         

         return view('edit',compact('edit'));

    }











    public function update(Request $request, string $id)
    {
        $request->validate([
            'password' => [
                'sometimes', 
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/'
            ],
        ],[
            'password.regex' => 'Password should contains One uppercase,One lowercase,One numeric and One Special Character',
        ]);
    
     
        $update = crudModel::find($id);
    
        if ($update) {
            if ($request->filled('password')) {
                $update->password = $request->password;
            }
            $update->update($request->except('password'));
    
            return redirect()->route('post.edit', ['post' => $id])->with('alert', 'Record updated successfully!');
        }
        return redirect()->back()->with('error', 'Record not found.');
    }
    
        // }


        // if ($request->filled('password')) {
        //     $update->password = $request->password;
      
        // }
        // else{
        // // Update other fields as necessary
        // $update->name = $request->name;
        // $update->email = $request->email;
        // $update->birthdate=$request->birthdate;
        // $update->username=$request->username;
        // $update->password=$request->password;
        // $update->gender=$request->gender;
        // $update->country=$request->country;


        // $update->save();
        // }
        // return redirect()->route('post.edit', ['post' => $id])->with('alert', 'Record updated successfully!');


 



        
    








   
    public function destroy(string $id)
    {
        $delete=crudModel::findorFail($id);
        $delete->delete();
         return redirect('/post');
    }



    public function deletedRecords()
    {

       $deletedRecords = CrudModel::onlyTrashed()->get();

       return view('restore', compact('deletedRecords'));
     }




    public function restore($id)
    {
        $record = CrudModel::withTrashed()->find($id);

        if ($record) 
        {
            $record->restore();
            return redirect()->route('post.index')->with('alert', 'Record restored successfully!');
        }

        return redirect()->route('post.index')->with('alert', 'Record not found!');
    }
 
}
