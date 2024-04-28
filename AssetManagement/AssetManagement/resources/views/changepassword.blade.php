@extends('layouts.admin.app')

@section('content')

@if(session('message'))

<div class="alert alert-success">
    {{ session('message') }}
</div>

@endif

@if(session('error'))

<div class="alert alert-danger">
    {{ session('error') }}
</div>

@endif

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Change Password</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard / Change Password</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<div class="col-sm-12">

    <br>

    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Change Password</h6>
        </div>

        <div class="card-body px-1 pt-0 pb-2">
            <form method="POST" autocomplete="off" action="{{route('savePassword')}}">
                @csrf
              <div class="form-group">
                <label>Old Password</label>
                <br>
                <input type="password" id="oldPassword" required class="form-control" name="oldPassword" value="">
              </div>  

              <div class="form-group">
                <label>New Password</label>
                <input type="password" id="newPassword" required name="newPassword" class="form-control" value=""/>
              </div>

              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" id="confirmPassword" required name="confirmPassword" class="form-control" value=""/>
              </div>
                    
              <input type="submit" name="submit" class="btn btn-success"/>
            </form>
        </div>
    </div>




@endsection


@push('script')


<script type="text/javascript">




</script>


@endpush