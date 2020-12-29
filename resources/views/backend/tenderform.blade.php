@extends('backend.master')
@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- valifation types -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Add New Tender</h5>
                <div class="card-body">
                    @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                    @endif
                    <form id="validationform" data-parsley-validate=""  novalidate="" action="{{ route('tender_store') }}"
                        method="POST">
                        @include('backend.partials.massege')
                        @csrf
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tender ID</label>
                            <div class="col-3 col-sm-3 col-lg-3">
                            <input type="number" value="{{old('tender_id')}}"  name="tender_id" placeholder="Type Tender ID"
                                    class="form-control" data-error="enter valid username" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Description</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea  name="description" value="{{old('description')}}" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Document Prise</label>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <input type="number" name="price" value="{{old('price')}}" placeholder="Document Prise"
                                    class="form-control" required>
                            </div>
                            <label class="col-2 col-sm-2 col-form-label text-sm-right">Security Amount</label>
                            <div class="col-3 col-sm-3 col-lg-2">
                                <input type="number" required name="security" value="{{old('security')}}" placeholder="Security Amount"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Tender Method</label>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <select id="inputState" class="form-control" name="method_id" value="{{old('method_id')}}">
                                    <option selected>Choose...</option>
                                    @foreach ($methods as $mitem)
                                        <option value="{{$mitem->id}}">{{$mitem->method_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a class="nav-link" href="{{route('methodform')}}" ><i class="fas fa-plus"></i></a>
                            <label class="col-2 col-form-label text-sm-right">District</label>
                            <div class="col-1 ">
                                <select id="inputState" class="form-control" name="location_id" value="{{old('location_id')}}">
                                    <option selected>Choose...</option>
                                    @foreach ($districts as $item)
                                      <option value="{{$item->id}}">{{$item->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a class="nav-link" href="{{route('districtform')}}" ><i class="fas fa-plus"></i></a>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Similar Work</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" required="" value="{{old('similar')}}" name="similar" placeholder="Similar Work"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Turnover</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" value="{{old('turnover')}}" required="" name="turnover" data-parsley-min="6" placeholder="Turnover"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Liquid</label>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <input type="number" name="Liquid" value="{{old('Liquid')}}" required placeholder="Liquid"
                                    class="form-control">
                            </div>
                            <label class="col-1 col-sm-1 col-form-label text-sm-left">Depatrment</label>
                            <div class="col-2 col-sm-2 col-lg-2 text-sm-left">
                                <select id="inputState" class="form-control" name="department_id">
                                    <option selected>Choose...</option>
                                    @foreach ($departments as $depar)
                                    <option value="{{$depar->id}}">{{$depar->department_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <a class="nav-link text-sm-right" href="{{route('departmentform')}}"><i class="fas fas fa-plus"></i></a>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-sm-right">Requer Document</label>
                            <div class="col-sm-6">
                                <div class="custom-controls-stacked">
                                    @php
                                        $requerdocuments_arr = array(
                                            "Trade License","Tin","Vat 13 Digit","JV","Equipment & Employee", "BlueBook"
                                        )
                                    @endphp
                                    @foreach ($requerdocuments_arr as $document)
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input id="ck1" name="requerdocument[]" type="checkbox" data-parsley-multiple="groups" value="{{$document}}"
                                                data-parsley-mincheck="2" data-parsley-errors-container="#error-container1"
                                                class="custom-control-input"><span class="custom-control-label">{{$document}}</span>
                                        </label>
                                    @endforeach
                                    <div id="error-container1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Last Date</label>
                            <div class="col-3 col-sm-3 col-lg-2">
                                <input data-parsley-type="date" value="{{old('date')}}" type="date" required=""  name="date" placeholder="Last Date"  class="form-control">
                            </div>
                            <label class="col-2 col-sm-2 col-form-label text-sm-right">Tender Capacity</label>
                            <div class="col-12 col-sm-3 col-lg-2">
                                <input data-parsley-type="text" type="text" value="{{old('tendercapacity')}}" required name="tendercapacity" placeholder="Tender Capacity" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Others</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea required="required" name="others" value="{{old('others')}}" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <button class="btn btn-space btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- ============================================================== -->
        <!-- end valifation types -->
        <!-- ============================================================== -->
    </div>
@endsection

