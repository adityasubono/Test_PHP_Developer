@extends('layouts/main')

@section('title', 'Location')

@section('container-fluid')

<div class="container">
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


    <h3 class="text-left">Employee</h3>
    <button class="btn btn-success float-right mb-3"
            data-toggle="modal"
            data-target="#confirm_add_employee"
            data-backdrop="static"
            data-keyboard="false">Add Employee
    </button>

    <button class="btn btn-primary float-right mb-3 mr-3"
            data-toggle="modal"
            data-target="#confirm_search"
            data-backdrop="static"
            data-keyboard="false">Search
    </button>

    <div class="modal fade" id="confirm_search" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Add Employee
                    </h5>
                    <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                            aria-label="Close">
                        <i class="text-white">x</i>
                    </button>
                </div>
                <div class="modal-body text-black-50 text-left">
                    <form action="/employee/search" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="age">Age</label><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="age">
                                        <option selected>--Selected Age--</option>
                                        @for ($i = 18; $i < 100; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="location_code">Choose Name Location</label><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="location_code">
                                        <option selected>--Your Location--</option>
                                        @foreach($data_location as $location)
                                        <option value="{{$location->code}}">{{$location->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                            <span class="text">Search</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirm_add_employee" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Add Employee
                    </h5>
                    <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                            aria-label="Close">
                        <i class="text-white">x</i>
                    </button>
                </div>
                <div class="modal-body text-black-50 text-left">
                    <form action="/employee/store" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="name">Name</label><br>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       placeholder="Insert Name">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="location_code">Choose Name Location</label><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="location_code">
                                        <option selected>--Your Location--</option>
                                        @foreach($data_location as $location)
                                        <option value="{{$location->code}}">{{$location->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-lg-4">
                                <label for="birth_date">Birth Date</label><br>
                                <input type="date"
                                       class="form-control @error('birth_date') is-invalid @enderror"
                                       id="birth_date"
                                       name="birth_date"
                                       placeholder="Insert Birth Date">
                                @error('birth_date')
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
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col">Birth Date</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ( $data_employee as $data )
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$data->employee_name}}</td>
            <td>{{$data->location_name}}</td>

            <td>
                @php
                $day = strftime("%d", strtotime($data->birth_date));
                $mount = strftime("%B", strtotime($data->birth_date));
                $year = strftime("%Y", strtotime($data->birth_date));
                $m = mb_substr($mount,0, 3);
                echo $day." ".$m." ".$year ;
                @endphp

            </td>
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
            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Edit Data Employee
                        </h5>
                        <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                                aria-label="Close">
                            <i class="text-white">x</i>
                        </button>
                    </div>
                    <div class="modal-body text-black-50 text-left">
                        <form action="/employee/update/{{$data->id}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="name">Name</label><br>
                                    <input type="text"
                                           class="form-control @error('code') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           placeholder="Insert Code Location"
                                           value="{{$data->employee_name}}">
                                    @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <label for="location_code">Choose Name Location</label><br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="location_code">
                                            <option disabled>--Your Location--</option>
                                            @foreach($data_location as $location)
                                            @if($location->name == $data->location_name)
                                            <option value="{{$location->code}}" selected>{{$location->name}}</option>
                                            @else
                                            <option value="{{$location->code}}">{{$location->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <label for="birth_date">Birth Date</label><br>
                                    <input type="date"
                                           class="form-control @error('birth_date') is-invalid @enderror"
                                           id="birth_date"
                                           name="birth_date"
                                           placeholder="Insert Birth Date"
                                           value="{{$data->birth_date}}">
                                    @error('birth_date')
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
                                <span class="text">Edit</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="confirm_delete{{$data->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Delete Employee
                        </h5>
                        <button type="button" class="close bg-danger p-sm-4" data-dismiss="modal"
                                aria-label="Close">
                            <i class="text-white">x</i>
                        </button>
                    </div>
                    <div class="modal-body text-black-50 text-left">
                        <form action="/employee/delete/{{$data->id}}" method="post">
                            @csrf
                            @method('delete')
                            <h4 class="text-center">Do you want to delete this ID Employee {{$data->id}} ?</h4>

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

        @empty

        <td colspan="5"><h3 class="text-center text-danger">Data Tidak Ditemukan</h3>
            <form action="/employee/search/" method="post">
                @csrf
                <button type="submit"
                        class="btn btn-primary float-right mt-3 mr-3">
                    <span class="icon text-white-50"></span>
                    <span class="text">Reset</span>
                </button>
            </form>
        </td>

        @endforelse

        </tbody>
    </table>
</div>

<script type="text/javascript">
    window.setTimeout(function () {
        $("#alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
</script>

@endsection



