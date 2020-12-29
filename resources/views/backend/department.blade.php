@extends('backend.master')
@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- valifation types -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Add New Department</h5>
                <div class="card-body">
                    @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                    @endif
                    <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('department_store') }}"
                        method="POST">
                        @include('backend.partials.massege')
                        @csrf
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Department Name</label>
                            <div class="col-3 col-sm-3 col-lg-3">
                                <input type="text" required="required" name="department_name" placeholder="Type Department Name"
                                    class="form-control" data-error="enter valid username">
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
