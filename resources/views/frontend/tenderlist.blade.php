

@extends('frontend.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- ============================================================== -->
        <!-- data table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Print, Excel, CSV, PDF Buttons</h5>
                    <p></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tender ID</th>
                                    <th>Description</th>
                                    <th>Method</th>
                                    <th>Location</th>
                                    <th>Last Date</th>
                                    <th>Doc Price</th>
                                    <th>Security</th>
                                    <th>View Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenders as $item)
                                    <tr>
                                        <td>{{$item->tender_id}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->method_name}}</td>
                                        <td>{{$item->district_name}}</td>
                                        <td>{{$item->date}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->security}}</td>
                                        <td><a href="{{route('singletender',$item->id)}}">Details View</a></td>
                                    </tr>

                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tender ID</th>
                                    <th>Description</th>
                                    <th>Method</th>
                                    <th>Location</th>
                                    <th>Last Date</th>
                                    <th>Doc Price</th>
                                    <th>Security</th>
                                    <th>View Details</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end data table  -->
        <!-- ============================================================== -->
    </div>
</div>
@endsection
