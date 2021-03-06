<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$d = Department::all();  //select * from departments
        //$d = Department::find(2);
        //$d = Department::where('name','like','%บ%')->get();
        // $d = Department::select('id','name')->orderBy('id','desc')->get();
        $d = DB::select('select * from departments order by id desc');

        $total = Department::count();

        //return response()->json($d, 200);  
        return response()->json([
            'total' => $total,
            'data'=> $d
        ], 200); 
    }

    //ค้นหาชื่อแผนก
    public function search() {
        $query = request()->query('name');
        $keyword = '%'.$query.'%';
        $d = Department::where('name','like',$keyword)->get(); //้ถ้ามี where ต้องมี get

        return response()->json([
            'data' => $d

        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Department();
        // $d->name = 'c';
        $d->name = $request->name;
        $d->save();
        
        return response()->json([
            'message' => 'เพิ่มข้อมูลเรียบร้อยแล้ว',
            'data' => $d
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
           // $d = Department::findOrFail($id);  
        $d = Department::find($id);         

        if($d == null) {
            return response()->json([
                'errors' => [
                'status_code' => 404,
                'message' => 'ไม่พบข้อมูลนี้'
                ]

            ], 404);  //404 find no found
        }
        return response()->json($d,200);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($id != $request->id) {
            return response()->json([
                'errors' => [
                'status_code' => 400,
                'message' => 'รหัสแผนกไม่ตรงกัน'
                ]
            ], 400); 

        }
        $d = Department::find($id);
        $d->name = $request->name;
        $d->save();

        return response()->json([
            'message' => 'แก้ไขข้อมูลเรียบร้อย',
            'data' => $d

        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Department::find($id);         

        if($d == null) {
            return response()->json([
                'errors' => [
                'status_code' => 404,
                'message' => 'ไม่พบข้อมูลนี้'
                ]

            ], 404);  //404 find no found
        }
        //ลบ
        $d->delete();
        return response()->json([
            'message' => 'ลบข้อมูลเรียบร้อย'
        ],200);  
    }
}
