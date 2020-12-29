

@extends('backend.master')
@section('tenderlist')
<div class="container-fluid">
    <div class="row">
        <!-- ============================================================== -->
        <!-- data table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Data Tables - Print, Excel, CSV, PDF Buttons</h5>
                    <p>This example shows DataTables and the Buttons extension being used with the Bootstrap 4 framework providing the styling.</p>
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
                                    <th>Price | Security</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenders as $item)
                                    <tr>
                                        <td>{{$item->tender_id}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->method->method_name}}</td>
                                        <td>{{$item->district->district_name}}</td>
                                        <td>{{$item->date}}</td>
                                        <td>{{$item->price}}|{{$item->security}} </td>
                                        <td><a class="btn btn-primary center" href="/edittender/{{$item->id}}/edit"><i class="fas fa-edit"></i></a></td>
                                        {{-- <td><a href="#deleteModal{{ $item->id }}" data-toggle="modal" class="btn btn-danger">Delete</td> --}}
                                          <!-- Modal -->
                                          <td><button class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $item->id }}"><i class="fas fa-trash"></i></button></td>

                                          <div id="myModal{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title" id="myModalLabel">Tender ID:{{$item->tender_id}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <p>{{$item->description}}</p>
                                                  <p>Are You sure Delete This Tender?</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                  <form class="" action="{{route('deletetender',$item->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete Tender</button>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
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
                                    <th>Price | Security</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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
@include('frontend.partials.footer')
