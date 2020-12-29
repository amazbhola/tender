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
                    <form id="validationform" data-parsley-validate=""  novalidate="" action="{{route('updatetender',$data->id)}}"
                        method="POST">
                        @include('backend.partials.massege')
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Tender Notice No</label>
                           <div class="col-2 col-sm-2 col-lg-2">
                           <input type="text" name="tendernoticeno_id" value="{{old('tendernoticeno_id')}}" list="noticeno" class="form-control" >
                            <datalist id="noticeno" {{ $data->tendernotice_id }} >
                                @foreach ($tendernotice as $tendernotice)
                                    <option value="{{$tendernotice->id}}">{{$tendernotice->tendernoticeno_no}}</option>
                                @endforeach
                            </datalist>
                               {{-- <select id="inputState" class="form-control" name="tendernoticeno_id">
                                   <option selected>Choose...</option>
                                   @foreach ($tendernotices as $tendernotice)
                                       <option value="{{$tendernotice->id}}">{{$tendernotice->tendernoticeno_no}}</option>
                                   @endforeach
                               </select> --}}
                           </div>
                       </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tender ID</label>
                            <div class="col-3 col-sm-3 col-lg-3">
                                <input type="number"  name="tender_id" value="{{ $data->tender_id }}" placeholder="Type Tender ID"
                                    class="form-control" data-error="enter valid username" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Description</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                            <textarea  name="description"  class="form-control">{{old('description', $data->description)}}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Document Prise</label>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <input type="number" name="price" value="{{ $data->price }}" placeholder="Document Prise"
                                    class="form-control" required>
                            </div>
                            <label class="col-2 col-sm-2 col-form-label text-sm-right">Security Amount</label>
                            <div class="col-3 col-sm-3 col-lg-2">
                                <input type="number" required value="{{ $data->security }}" name="security" placeholder="Security Amount"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Tender Method</label>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <select id="inputState" class="form-control" name="method_id" >
                                    <option  selected>{{ $data->method_id }}</option>
                                    @foreach ($method as $mitem)
                                        <option  value="{{$mitem->id}}">{{$mitem->method_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <a class="nav-link" href="{{route('methodform')}}" ><i class="fas fa-plus"></i></a>
                            <label class="col-2 col-form-label text-sm-right">District</label>
                            <div class="col-1 ">
                                <select id="inputState" class="form-control" name="location_id">
                                    <option selected>{{ $data->location_id }}</option>
                                    @foreach ($district as $item)
                                    <option value="{{$item->id}}">{{$item->district_name}}</option>
                                    @endforeach


                                </select>

                            </div>
                            <a class="nav-link" href="{{route('districtform')}}" ><i class="fas fa-plus"></i></a>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Similar Work</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" required="" value="{{ $data->similar }}" name="similar" placeholder="Similar Work"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Turnover</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" required="" value="{{ $data->turnover }}" name="turnover" data-parsley-min="6" placeholder="Turnover"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Liquid</label>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <input type="number" name="Liquid" value="{{ $data->Liquid }}" required placeholder="Liquid"
                                    class="form-control">
                            </div>
                            <label class="col-1 col-sm-1 col-form-label text-sm-left">Depatrment</label>
                            <div class="col-2 col-sm-2 col-lg-2 text-sm-left">
                                <select id="inputState" class="form-control" name="department_id">
                                    <option selected>{{ $data->department_id }}</option>
                                    @foreach ($department as $departments)
                                        <option value="{{$departments->id}}">{{$departments->department_name}}</option>
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
                                    @foreach ($requerdocuments_arr as $key=> $document)
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input id="ck1" name="requerdocument[]" type="checkbox" data-parsley-multiple="groups" value="{{$document}}" class="custom-control-input"><span class="custom-control-label">{{$document}}</span>

                                        </label>
                                    @endforeach
                                    <div id="error-container1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Last Date</label>
                            <div class="col-3 col-sm-3 col-lg-2">
                                <input data-parsley-type="date" type="date" required="" value="{{ $data->date }}" name="date" placeholder="Last Date"  class="form-control">
                            </div>
                            <label class="col-2 col-sm-2 col-form-label text-sm-right">Tender Capacity</label>
                            <div class="col-12 col-sm-3 col-lg-2">
                                <input data-parsley-type="text" type="text" required="" value="{{ $data->tendercapacity }}" name="tendercapacity" placeholder="Tender Capacity" class="form-control">
                            </div>
                        </div>
              {{--           <div class="form-group row offset-3">
                             <label class="col-3 col-sm-3 col-form-label text-sm-right">Tender Method</label>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <select id="inputState" class="form-control" name="method">
                                    <option selected>Choose...</option>
                                    @foreach ($method as $mitem)
                                        <option value="{{$mitem->id}}">{{$mitem->method_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Others</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                            <textarea required="required" name="others" class="form-control">{{ old('others',$data->others) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary">Update Tender</button>
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
