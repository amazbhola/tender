<td><button class="btn btn-danger" data-toggle="modal" data-target="#DistrictModal{{ $item->id }}"><i
            class="fas fa-trash"></i></button></td>

<div id="DistrictModal{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">District Name</h4>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                    @endif
                    <form id="validationform" data-parsley-validate="" novalidate="" action="{{ route('district_store') }}"
                        method="POST">
                        @include('backend.partials.massege')
                        @csrf
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">District Name</label>
                            <div class="col-3 col-sm-3 col-lg-3">
                                <input type="text" required="" name="district_name" placeholder="Type District Name"
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
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <form class="" action="{{ route('deletetender', $item->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete Tender</button>
                </form>
            </div>
        </div>
    </div>
</div>
