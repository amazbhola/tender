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
                    <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('tender_store') }}"
                        method="POST">
                        @include('backend.partials.massege')
                        @csrf
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tender ID</label>
                            <div class="col-3 col-sm-3 col-lg-3">
                                <input type="number" required="required" name="tender_id" placeholder="Type Tender ID"
                                    class="form-control" data-error="enter valid username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Description</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea required="required" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Document Prise</label>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <input type="number" name="price" required="required" placeholder="Document Prise"
                                    class="form-control">
                            </div>
                            <label class="col-2 col-sm-2 col-form-label text-sm-right">Security Amount</label>
                            <div class="col-3 col-sm-3 col-lg-2">
                                <input type="number" required="required" name="security" placeholder="Security Amount"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Method</label>
                            <div class="col-3 col-sm-3 col-lg-2">
                                <select id="inputState" class="form-control" name="method">
                                    <option selected>Choose...</option>
                                    <option value="1">LTM</option>
                                    <option value="2">OTM</option>
                                    <option value="3">OSTETM</option>
                                    <option value="4">RFQ</option>
                                </select>
                            </div>
                            <label class="col-2 col-sm-2 col-form-label text-sm-right">Location</label>
                            <div class="col-12 col-sm-3 col-lg-2">
                                <select id="inputState" class="form-control" name="location">
                                    <option selected>Choose...</option>
                                    <option value="1">BHOLA</option>
                                    <option value="2">BARISAL</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Similar Work</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" required="" name="similar" placeholder="Similar Work"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Turnover</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="number" required="" name="turnover" data-parsley-min="6" placeholder="Turnover"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Liquid</label>
                            <div class="col-2 col-sm-2 col-lg-2">
                                <input type="number" name="Liquid" required="required" placeholder="Liquid"
                                    class="form-control">
                            </div>
                            <label class="col-2 col-sm-2 col-form-label text-sm-right">Depatrment</label>
                            <div class="col-12 col-sm-3 col-lg-2">
                                <select id="inputState" class="form-control" name="department">
                                    <option selected>Choose...</option>
                                    <option value="1">LGED</option>
                                    <option value="2">EED</option>
                                    <option value="3">PWD</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-sm-right">Requer Document</label>
                            <div class="col-sm-6">
                                <div class="custom-controls-stacked">
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input id="ck1" name="ck1" type="checkbox" data-parsley-multiple="groups" value="1"
                                            data-parsley-mincheck="2" data-parsley-errors-container="#error-container1"
                                            class="custom-control-input"><span class="custom-control-label">Trade
                                            License</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input id="ck2" name="ck2" type="checkbox" data-parsley-multiple="groups" value="2"
                                            data-parsley-mincheck="2" data-parsley-errors-container="#error-container1"
                                            class="custom-control-input"><span class="custom-control-label">Tin</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input id="ck3" name="ck3" type="checkbox" data-parsley-multiple="groups" value="3"
                                            data-parsley-mincheck="2" required=""
                                            data-parsley-errors-container="#error-container1"
                                            class="custom-control-input"><span class="custom-control-label">Vat 13
                                            Digit</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input id="ck3" name="ck3" type="checkbox" data-parsley-multiple="groups" value="4"
                                            data-parsley-mincheck="2" required=""
                                            data-parsley-errors-container="#error-container1"
                                            class="custom-control-input"><span class="custom-control-label">JV</span>
                                    </label>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input id="ck3" name="ck3" type="checkbox" data-parsley-multiple="groups" value="5"
                                            data-parsley-mincheck="2" required=""
                                            data-parsley-errors-container="#error-container1"
                                            class="custom-control-input"><span class="custom-control-label">Equipment &
                                            Staff</span>
                                    </label>
                                    <div id="error-container1"></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-3 col-sm-3 col-form-label text-sm-right">Last Date</label>
                            <div class="col-3 col-sm-3 col-lg-2">
                                <input data-parsley-type="date" type="date" required="" name="date" placeholder="Last Date"  class="form-control">
                            </div>
                            <label class="col-2 col-sm-2 col-form-label text-sm-right">Tender Capacity</label>
                            <div class="col-12 col-sm-3 col-lg-2">
                                <input data-parsley-type="text" type="text" required="" name="tendercapacity" placeholder="Tender Capacity" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Others</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea required="required" name="others" class="form-control"></textarea>
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
