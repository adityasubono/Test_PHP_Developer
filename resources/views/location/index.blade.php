@extends('layouts/main')

@section('title', 'Location')

@section('container-fluid')


@if (session('status'))
<div class="alert alert-success" id="alert">
    {{ session('status') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger" id="alert">
    {{ session('error') }}
</div>
@endif


<h3 class="text-left">Location</h3>
<button class="btn btn-success float-right mb-3"
        data-toggle="modal"
        data-target="#confirm_add_location"
        data-backdrop="static"
        data-keyboard="false">Add Location
</button>


<div class="modal fade" id="confirm_add_location" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Add Location
                </h5>
                <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                        aria-label="Close">
                    <i class="text-white">x</i>
                </button>
            </div>
            <div class="modal-body text-left text-black-50">
                <form action="/location/store" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="code">Code Location</label><br>
                            <input type="text"
                                   class="form-control @error('code') is-invalid @enderror"
                                   id="code"
                                   name="code"
                                   placeholder="Insert Code Location">
                            @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="name">Name Location</label><br>
                            <input type="text"
                                   class="form-control @error('code') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   placeholder="Insert Name Location">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button type="button"
                            class="btn btn-danger float-right mt-3"
                            data-dismiss="modal">
                        <span class="icon text-white-50"></span>
                        <span class="text">Cancel</span>
                    </button>

                    <button type="submit"
                            class="btn btn-success float-right mt-3 mr-3">
                        <span class="icon text-white-50"></span>
                        <span class="text">Save</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Code</th>
        <th scope="col">Name</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $data_location as $data )
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$data->code}}</td>
        <td>{{$data->name}}</td>
        <td>
            <button class="btn btn-warning"
                    data-toggle="modal"
                    data-target="#confirm_edit{{$data->id}}"
                    data-backdrop="static"
                    data-keyboard="false">EDIT
            </button>

            <button class="btn btn-danger"
                    data-toggle="modal"
                    data-target="#confirm_delete{{$data->id}}"
                    data-backdrop="static"
                    data-keyboard="false">DELETE
            </button>
        </td>
    </tr>

    <div class="modal fade" id="confirm_edit{{$data->id}}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit Data Location
                    </h5>
                    <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                            aria-label="Close">
                        <i class="text-white">x</i>
                    </button>
                </div>
                <div class="modal-body text-black-50 text-left">
                    <form action="/location/update/{{$data->id}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="code">Code</label><br>
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <input type="text"
                                       class="form-control @error('code') is-invalid @enderror"
                                       id="code"
                                       name="code"
                                       placeholder="Insert Code Location"
                                       value="{{$data->code}}">
                                @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Name</label><br>
                                <input type="hidden" name="name" value="{{$data->id}}">
                                <input type="text"
                                       class="form-control @error('code') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       placeholder="Insert Name Location"
                                       value="{{$data->name}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <button type="button"
                                class="btn btn-danger float-right mt-3"
                                data-dismiss="modal">
                            <span class="icon text-white-50"></span>
                            <span class="text">Cancel</span>
                        </button>

                        <button type="submit"
                                class="btn btn-success float-right mt-3 mr-3">
                            <span class="icon text-white-50"></span>
                            <span class="text">Save</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirm_delete{{$data->id}}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Delete Location
                    </h5>
                    <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                            aria-label="Close">
                        <i class="text-white">x</i>
                    </button>
                </div>
                <div class="modal-body text-black-50">
                    <form action="/location/delete/{{$data->id}}" method="post">
                        @csrf
                        @method('delete')
                        <h4 class="text-center">Do you want to delete this ID {{$data->id}} ?</h4>

                        <button type="button"
                                class="btn btn-danger float-right mt-3"
                                data-dismiss="modal">
                            <span class="icon text-white-50"></span>
                            <span class="text">Cancel</span>
                        </button>

                        <button type="submit"
                                class="btn btn-success float-right mt-3 mr-3">
                            <span class="icon text-white-50"></span>
                            <span class="text">Delete</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endforeach

    </tbody>
</table>


<script type="text/javascript">
    window.setTimeout(function () {
        $("#alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

@endsection



