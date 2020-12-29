@extends('frontend.master')
@section('content')


<div class="row">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header p-4 text-center ">
                <div class="pt-2 d-inline-block "> <h2 class="mb-0">LIVE TENDER BD</h2></div>
            </div>
            <div class="card-body">
                <div class="row ">
                    <div class="col-4"><h4>Tender/Proposal ID :</h4></div>
                    <div class="col-8"><p>{{$tender->tender_id}}</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Tender/Proposal Package No. and Description :</h4></div>
                    <div class="col-8 mb-4 text-justify"><p>{{$tender->description}}</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Tender/Proposal Document Price (In BDT) :</h4></div>
                    <div class="col-8"><p>{{$tender->price}}.00 TK</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Procurement Method :</h4></div>
                    <div class="col-8"><p>{{$tender->method->method_name}}</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Department</h4></div>
                    <div class="col-8"><p>{{$tender->department->department_name}}</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Location</h4></div>
                    <div class="col-8"><p>{{$tender->district->district_name}}</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Security Amount</h4></div>
                    <div class="col-8"><p>{{$tender->security}}.00 TK</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Similar Work</h4></div>
                    <div class="col-8"><p>{{$tender->similar}}.00TK</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Average annual construction turnover Last 5 Year.</h4></div>
                    <div class="col-8"><p>{{$tender->turnover}}.00 TK</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Tender/Proposal security
                        (Amount in BDT)</h4></div>
                    <div class="col-8"><p>{{$tender->Liquid}}.00 TK</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Tender Capacity</h4></div>
                    <div class="col-8"><p>{{$tender->tendercapacity}}.00 Tk</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Requer Documents</h4></div>
                    <div class="col-8"><p>Trade License, Tin, Vat, Equipment and Employe List with Certificate</p></div>
                </div>
                <div class="row ">
                    <div class="col-4"><h4>Tender/Proposal Document last selling /
                        downloading</h4></div>
                    <div class="col-8"><p>{{$tender->date}}</p></div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">&copy; Copyright 2020. <a href="http://">www.livetenderbd.com</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
