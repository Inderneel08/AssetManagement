@extends('layouts.admin.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit History Info</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard / List of Assets/ History / Edit History of Assets</li>
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
            <a class="btn btn-primary" href="/home/assets/history/{{ $id }}">Back</a>
            </div>
            </div>
        <div class="col-sm-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Add Asset History</h6>
                </div>
                <div class="card-body px-1 pt-0 pb-2">
                    
                    <form method="POST" autocomplete="off" action="{{route('saveHistory')}}">
                        @csrf

                      <div class="form-group">
                        
                        <label>Asset Id</label>
                        <br>
                        <input type="text" class="form-control" required name="asset_id" value="{{ $asset->asset_id }}" readonly>
                      </div>
                    
                      <div class="form-group">
                        <label>Asset Type</label>
                        <input type="text" required name="asset_type" class="form-control" value="{{ $asset->asset_type }}" readonly/>
                      </div>

                      <div class="form-group">
                        <label>Assigned To</label>
                        <select class="assign-select form-control" name="assignedTo" id="assign-to" title="Assign" required>
                            <option value="">--- Select an option---</option>
                            <option value="default">Not In Use</option>
                            <option value="scraped"> In Scrap </option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label>From</label>
                        <input type="date" id="date_from" name="date_from" required>
                      </div>

                      <div class="form-group">
                        <label>To</label>
                        <input type="date" id="date_to" name="date_to" required>
                      </div>


                      <input type="hidden" name="id" value="{{ $id }}">


                      <input type="submit" name="submit" class="btn btn-success"/>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@push('script')


<script type="text/javascript">

document.addEventListener('DOMContentLoaded',function(){
    let list_users=[];

    $.ajax({
        url:"{{ route('getUsers') }}",
        method: 'GET',
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // console.log(response);
            
            response.data.forEach(element => {
                list_users.push(element.username);
            });

            let username = "{{ session('username') }}";

            list_users.push(username);

            var selectElement = $('#assign-to');

            $.each(list_users,function(index,username){
                selectElement.append('<option value="' + username + '">' + username + '</option>');
            });

        },
    });

    document.getElementById('date_to').max = new Date().toISOString().split('T')[0];

    document.getElementById('date_from').max = new Date().toISOString().split('T')[0];


});


</script>


@endpush
