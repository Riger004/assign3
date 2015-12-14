<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\register;
use App\sec;


class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $var1=DB::select('select sec1 from section');

        $num1=0;

        foreach ($var1 as $key ) {
            $num1=$key->sec1;
        } 

        $var2=DB::select('select sec2 from section');

        $num2=0;

        foreach ($var2 as $key ) {
            $num2=$key->sec2;
        }

        $var3=DB::select('select sec3 from section');

        $num3=0;

        foreach ($var3 as $key ) {
            $num3=$key->sec3;
        }        

        $var1=DB::select('select sec1 from section');

        $num1=0;

        foreach ($var1 as $key ) {
            $num1=$key->sec1;
        }   

        $var4=DB::select('select sec4 from section');

        $num4=0;

        foreach ($var4 as $key ) {
            $num4=$key->sec4;
        }   

        return view('pages.home',compact('num1','num2','num3','num4'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

     $name=DB::select('select name from registration where student_id=:id',['id'=>$request->student_id]);

     if(!empty($name)){

        //return 'here in the name';
         return redirect()->back()->with('error','sorry this student is already registered');
     }

     $email=DB::select('select email from registration where email=:id',['id'=>$request->email]);

     if(!empty($email)){
        return redirect()->back()->with('email','sorry this student is already registered');
     }



    // $dbFormat = date('H:i:s', strtotime('6:30 PM'));
    //$mySqlTime = time();


     
    $student=new register;

    $student->name=$request->name;
    $student->email=$request->email;
    $student->student_id=$request->student_id;
    if($request->sec==1){


        $sec=DB::select('select sec1 from section');

        if(empty($sec)){

            $class= new sec;
            $class->sec1=1;
            $class->save();
        }else{
            $count=0;

            foreach ($sec as $key ) {
                $count=$key->sec1;
            }
            if($count>7){
                //return $count;
               return redirect()->back()->with('full','sorry sec1 is already full');
            }
            DB::table('section')->increment('sec1');
        }

      $dbFormat = date('H:i:s', strtotime('3 PM'));
      $student->sec=$request->sec;
      $student->day='sunday';
      $student->class_time=$dbFormat;
    }elseif ($request->sec==2) {


        $sec=DB::select('select sec2 from section');

        if(empty($sec)){

            $class= new sec;
            $class->sec2=1;
            $class->save();
        }else{

             $count=0;

            foreach ($sec as $key ) {
                $count=$key->sec2;
            }
            if($count>7){
               return redirect()->back()->with('full','sorry sec2 is already full');
            }

            DB::table('section')->increment('sec2');
        }

        $dbFormat = date('H:i:s', strtotime('8 AM'));
        $student->sec=$request->sec;
        $student->day='monday';
        $student->class_time=$dbFormat;
    }elseif ($request->sec==3) {


        $sec=DB::select('select sec3 from section');

        if(empty($sec)){

            $class= new sec;
            $class->sec3=1;
            $class->save();
        }else{

             $count=0;

            foreach ($sec as $key ) {
                $count=$key->sec3;
            }

            
            if($count>7){
               return redirect()->back()->with('full','sorry sec3 is already full');
            }

            DB::table('section')->increment('sec3');
        }

        $dbFormat = date('H:i:s', strtotime('2 PM'));
        $student->sec=$request->sec;
        $student->day='tuesday';
        $student->class_time=$dbFormat;
    }else if ($request->sec==4){


        $sec=DB::select('select sec4 from section');

        if(empty($sec)){

            $class= new sec;
            $class->sec4=4;
            $class->save();
        }else{

             $count=0;

            foreach ($sec as $key ) {
                $count=$key->sec4;
            }
            if($count>7){
               return redirect()->back()->with('full','sorry sec4 is already full');
            }

            DB::table('section')->increment('sec4');
        }

        $dbFormat = date('H:i:s', strtotime('6 PM'));
        $student->sec=$request->sec;
        $student->day='wednesday';
        $student->class_time=$dbFormat;
    }
    $student->class_time=$dbFormat;
    $student->save();

    return redirect()->back()->with('message','thanks');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $var1=DB::select('select name from registration where sec=1');

        $var2=DB::select('select name from registration where sec=2');

        $var3=DB::select('select name from registration where sec=3');

        $var4=DB::select('select name from registration where sec=4');



        return view('pages.show',compact('var1','var2','var3','var4'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
