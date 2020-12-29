<?php

namespace App\Http\Controllers;

use App\District as AppDistrict;
use App\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\District;
use App\department;
use App\method;
use App\tendernotice;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        return view('frontend.indexone');
    }


// ======================================================================
// Search function
    public function search(Request $request)
    {
      $search = $request->search;
      if (!empty($search)) {

        $tenders = DB::table('tenders')
            ->join('methods','methods.id',"=",'tenders.method_id')
            ->join('districts','districts.id',"=",'tenders.location_id')
            ->join('departments','departments.id',"=",'tenders.department_id')
            ->join('tendernotices','tendernotices.id',"=",'tenders.tendernoticeno_id')
            ->select('tenders.*', 'methods.*','districts.*','departments.*')
            ->orWhere('tender_id', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->orWhere('district_name', 'like', '%'.$search.'%')
            ->orWhere('method_name', 'like', '%'.$search.'%')
            ->orWhere('date', 'like', '%'.$search.'%')
            ->orWhere('department_name', 'like', '%'.$search.'%')
            ->get();


        // $tenders = Tender::with('district','method')->orWhere('tender_id', 'like', '%'.$search.'%')
        // ->orWhere('description', 'like', '%'.$search.'%')
        // ->orWhere('location_id', 'like', '%'.$search.'%')
        // ->orWhere('method_id', 'like', '%'.$search.'%')
        // ->orWhere('date', 'like', '%'.$search.'%')
        // ->orWhere('department_id', 'like', '%'.$search.'%')
        // // $districts = District::Where('district_name', 'like', '%'.$search.'%');
        // // $methods = Method::Where('method_name', 'like', '%'.$search.'%');
        // // $departments = Department::Where('department_name', 'like', '%'.$search.'%')
        // ->paginate(10);
        return view('frontend.tenderlist',compact('search', 'tenders'));
      } else {

          return view('frontend.indexone');
      }

      // $date = $request->date;
      // $location = $request->location;

    }
    public function tenderform()
    {
        $tenders = Tender::all();
        $districts = District::orderBy('id', 'asc')->get();
        $departments = Department::orderBy('id', 'asc')->get();
        $methods = method::orderBy('id', 'asc')->get();

        // $status = Status::orderBy('id', 'asc')->get();
        return view('backend.tenderform', compact('tenders','districts', 'departments', 'methods'));
    }



    public function listview()
    {


        $tenders = Tender::with('district','method')->orderBy('date', 'desc')->get();
        return view('backend.tenderlistview', compact('tenders'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'tender_id' => 'required',
            'price' => 'required',
            'Liquid' => 'required',
            'location_id' => 'required',
            'department_id' => 'required',
            'requerdocument' => 'required',
            'date' => 'required',
        ]);
        $tender = new Tender();
        $tender->tender_id = $request->tender_id;
        $tender->description = $request->description;
        $tender->price = $request->price;
        $tender->security = $request->security;
        $tender->method_id = $request->method_id;
        $tender->location_id = $request->location_id;
        $tender->department_id = $request->department_id;
        $tender->tendercapacity = $request->tendercapacity;
        $tender->similar = $request->similar;
        $tender->turnover = $request->turnover;
        $tender->Liquid = $request->Liquid;
        $tender->requerdocument = implode(",", $request->requerdocument);
        $tender->others = $request->others;
        $tender->date = $request->date;
        $tender->save();

        return redirect('/tenderform')->with('status', 'Tender Data Save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = DB::table('tenders')
        //     ->join('methods','methods.id',"=",'tenders.method_id')
        //     ->join('districts','districts.id',"=",'tenders.location_id')
        //     ->join('departments','departments.id',"=",'tenders.department_id')
        //     ->select('tenders.*', 'methods.*','districts.*','departments.*')
        //     ->get();
        $tender = Tender::with('district','method','department')->findOrFail($id);
        return view('frontend.singletender', compact('tender'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = District::orderBy('id', 'asc')->get();
        $department = Department::orderBy('id', 'asc')->get();
        $method = method::orderBy('id', 'asc')->get();

        $data = Tender::findorFail($id);

        return view('backend.editform', compact('data', 'district','department','method','tendernotice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tenders = Tender::findOrFail($id);
        $new_tender = $request->all();
        $tenders->update( $new_tender);
        return redirect('/backendlistview')->with('status', 'Tender Data Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tender = Tender::findorFail($id);
        if (!is_null($tender)) {
          $tender->delete();
          return back();
        }
    }
}
