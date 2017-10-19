<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retrieve data using DB
        $categories = Category::orderBy('created_at','DESC')->paginate(10);
        // $categories = DB::table('categories')->select('name','desc')->orderBy('created_at','DESC')->paginate(10);
        // return view('admin.category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,
            [
            'name' => 'required',
            'desc' => 'required',
            ],
            [
            'name.required' => 'အမျိုးအစား နာမည်ထည့်ပေးပါရန်',
            'desc.required' => 'အမျိုးအစားအကြောင်း ဖော်ပြပေးပါရန်'
            ]);
        // using query
        DB::table('categories')->insert(['name' => $request->name, 'desc' => $request->desc]);
        // Category::create(['name' => $request->name, 'desc' => $request->desc]);
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',['category'=>$category]);
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
        $this->Validate($request,
            [
            'name' => 'required',
            'desc' => 'required',
            ],
            [
            'name.required' => 'အမျိုးအစား နာမည်ထည့်ပေးပါရန်',
            'desc.required' => 'အမျိုးအစားအကြောင်း ဖော်ပြပေးပါရန်'
            ]);
        // using query builder
        // DB::table('categories')->where('id',$id)->update(['name'=>$request->name,'desc'=>$request->desc]);

        // using eloquent
        // $category = Category::find($id);
        // $category->name = $request->name;
        // $category->desc = $request->desc;
        // $category->save();

        // using model need to declare clomn name in model
        Category::where('id',$id)->update(['name'=>$request->name,'desc'=>$request->desc]);
        return redirect('admin/categories');
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
