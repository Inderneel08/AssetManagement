@extends('layouts.admin.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit User/Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard / List of Users/ Edit User</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div class="container-fluid py-4">
    <div class="row">
    <div class="col-sm-12">
        {{-- {!!displayAlert()??''!!} --}}
            <div style="float:left">
                {{-- {{route('add-unit-user')}} --}}
            <a class="btn btn-primary" href="{{ route('list_users') }}">Back</a>
            </div>
            </div>
        <div class="col-sm-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit User/Admin</h6>
                </div>
                <div class="card-body px-1 pt-0 pb-2">
                    {{-- <h1>{{ $id }}</h1> --}}
                    <form method="POST" autocomplete="off" action="{{route('editunituser')}}">
                        @csrf
                        {{-- {{ getNewCsrfTokenvalue() }} --}}
                        {{-- <input type="hidden" name="_verifytoken" id="_verifytoken" value="" /> --}}
                      <div class="form-group">
                        {{-- <label>Select Unit</label> --}}
                        {{-- <select class="form-control" required name="unit_id"> --}}
                            {{-- <option value="">---Select Unit---</option> --}}
                            {{-- @foreach($unit as $u)
                            <option value="0">Yantra India Limited (यंत्र इंडिया लिमिटेड)</option>
                            <option value="{{$u->id}}">{{$u->en_unit_name ??''}}  ({{$u->hi_unit_name ??''}})</option>
                            @endforeach --}}
                        {{-- </select> --}}
                        <label>Username</label>
                        <br>
                        <input type="username" class="form-control" readonly name="username" value="{{ $user->username }}">
                      </div>  
                      {{-- <div class="form-group"> --}}
                        {{-- <label>Role</label> --}}
                        {{-- <select class="form-control" required name="role"> --}}
                            {{-- <option value="">---Select Role---</option> --}}
                            {{-- <option value="USER">USER</option> --}}
                            {{-- <option value="ADMIN">Admin</option> --}}
                            {{-- <option value="9">Super Admin</option>     
                            <option value="11">Reports Type</option>
                            <option value="15">Top Management</option>                      --}}
                        {{-- </select> --}}
                      {{-- </div>   --}}
                        
                      <input type="hidden" name="id" value="{{ $id }}">

                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" maxlength="45" required name="email" class="form-control" value="{{ $user->email }}"/>
                      </div>

                      <div class="form-group">
                        <label>Designation</label>
                        <input type="text" maxlength="45" required name="designation" class="form-control" value="{{ $user->designation }}"/>
                      </div>
                      
                      <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="password" class="form-control">
                      </div>                        
                            <input type="submit" name="submit" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection