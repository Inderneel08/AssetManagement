@extends('layouts.admin.app')

@section('content')

<script src="{{asset('front_assets/js/jquery.min.js')}}"></script>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Raise a service request</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard / Raise Service request </li>
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
            <a class="btn btn-primary" href="{{ route('raise_request') }}">Back</a>
            </div>
            </div>
        <div class="col-sm-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Create a new service request</h6>
                </div>
                <div class="card-body px-1 pt-0 pb-2">
                    
                    <form method="POST" autocomplete="off" action="{{route('create_issue')}}">
                        @csrf
                        {{-- {{ getNewCsrfTokenvalue() }} --}}
                        {{-- <input type="hidden" name="_verifytoken" id="_verifytoken" value="" /> --}}

                        <div class="form-group">
                            <div style="display: flex; flex-direction: row;">
                                <label>Asset Id</label>
                                <label style="position: relative; left: 84%;">Asset Type:</label>
                                <label id="toChange" style="position: relative; left: 86%;"></label>
                            </div>
                            <select class="form-control" name="asset_id" id="asset_id" required>
                                <option value="">---Select Asset Id---</option>

                                @foreach($assetsOwned as $assets)

                                    <option value="{{ $assets->asset_id }}">{{ $assets->asset_id }}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" required name="description" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Priority</label>
                            <select class="form-control" name="priority" id="priority" required>
                                <option value=0> LOW </option>
                                <option value=1> MEDIUM </option>
                                <option value=2> HIGH </option>
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label>Choose the Admin</label>
                            <select class="form-control" name="assignedTo" id="assignedTo" required>
                                <option value="">---Select Admin---</option>
                            </select>
                        </div>   --}}

                      <input type="submit" name="submit" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    var assetsOwned = @json($assetsOwned);

    $('#asset_id').on('change',function(){
        var assetId = $('#asset_id').val();

        if(assetId===""){
            $('#toChange')[0].innerHTML="";
        }
        else{
            assetsOwned.forEach((asset)=>{
                if(asset.asset_id===assetId){
                    $('#toChange')[0].innerHTML=asset.asset_type;
                }
            });
        }
    });


</script>

@endsection


@push('script')


{{-- <script type="text/javascript">

document.addEventListener('DOMContentLoaded',function(){
    // let getAdminNames = [];

    $.ajax({
        url:"{{ route('getlistOfAdmins') }}",
        method: 'GET',
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // console.log(response);

            response.forEach(element => {

                var option = $('<option>',{
                    value:element.email,
                    text:element.username
                });

                $('#assignedTo').append(option);

            });

            // let username = "{{ session('username') }}";

            // getAdminNames.push(username);

            // console.log(list_users);

            // for(let i=0;i<list_users.length;i++){
            //     console.log(list_users[i]);
            // }
        },
    });

});




</script> --}}





@endpush