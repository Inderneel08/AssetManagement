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
                <h1 class="m-0">List of Users</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard / List of Users</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div class="container-fluid py-4">
    <div class="row">
    <div class="col-sm-12">
            <div style="float:right">
                {{-- {{route('add-unit-user')}} --}}
                <a class="btn btn-primary" href="{{ route('create_users') }}">Add User</a>
            </div>
            <div style="float:left">
                {{-- {{route('add-unit-user')}} --}}
                <a class="btn btn-primary" href="{{ route('home') }}">Back</a>
            </div>

            <div style="position: absolute; left: 45%;">

                <a class="btn btn-primary" href="{{ route('exportUsers') }}">Download</a>
            </div>

    </div>
        <div class="col-sm-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>List of Users</h6>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login History</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <table class="table table-sm">
                <thead >
                    <tr>
                        <th>#</th>
                        <th>Ip Address</th>
                        <th>Status</th>
                        <th>Login Time</th>
                        <th>Logout Time</th>
                    </tr>
                </thead>
                <tbody id="table_record">
                    @if( !empty($passwordHistory) )
                        @foreach($passwordHistory as $key => $val)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $val->ip_address ?? '' }}</td>
                                <td>
                                    @if( !empty($val->status) && ($val->status == 2) )
                                    Success
                                    @else
                                    Fail
                                    @endif
                                </td>
                                <td>{{ $val->created_at ?? '' }}</td>
                                <td>{{ $val->logout_at ?? '' }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div> --}}

@endsection

@push('script')
<script type="text/javascript">
    $(function () {

      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: false,
          ajax: "{{ route('getUsers') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'Id'},
              {data: 'username', name: 'Username'},
              {data: 'email', name: 'Email'},
              {data: 'role', name: 'Role', orderable: false, searchable: false},
              {data: 'status', name: 'Status', orderable: false, searchable: false},
              {data: 'designation',name:'Designation'},
              {data: 'action', name: 'Action', orderable: false, searchable: false},
          ],

            aoColumnDefs: [
                {
                    aTargets: [3],
                    mData: 'role',
                    mRender : function(data,type,row){

                        var isDisabled = row.status == 0 ? 'disabled':'';

                        return `
                            <select class="role-select" id= "role" data-user-id="${row.id}" ${isDisabled} >
                                <option value="USER" ${data=='USER' ? 'selected':''}>USER</option>
                                <option value="ADMIN" ${data=='ADMIN'? 'selected':''}>ADMIN</option>

                            </select>
                        `;
                    }
                },

                {
                    aTargets: [4],
                    mData: 'status',
                    mRender : function(data,type,row){
                        return `
                            <select class="status-select" id= "select" data-user-id="${row.id}" >
                                <option value="0" ${data==0 ? 'selected':''}>INACTIVE</option>
                                <option value="1" ${data==1? 'selected':''}>ACTIVE</option>

                            </select>
                        `;
                    }
                }
            ]

      });

    });

    $(function(){
        $('.data-table').on('change','.status-select',function(){
            // console.log("Hello World!!!");
            let userId = $(this).data('user-id');
            let newStatus = $(this).val();

            // console.log(userId);
            // console.log(newStatus);

            // console.log(typeof(userId));

            if(confirm('Do you really want to perform this action?')){
                $.ajax({
                    url: "{{ route('changeStatus') }}",
                    method: 'POST',
                    data: {
                        userId:userId,
                        newStatus:newStatus,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        $('.data-table').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        alert(response.message);
                        $('.data-table').DataTable().ajax.reload();
                    }
                });
            }
            else{
                location.reload();
            }

        });

        $('.data-table').on('change','.role-select',function(){
            let userId = $(this).data('user-id');
            let newRole = $(this).val();

            if(confirm('Do you really want to perform this action?')){
                $.ajax({
                    url: "{{ route('changeRole') }}",
                    method: 'POST',
                    data: {
                        userId:userId,
                        newRole:newRole,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        $('.data-table').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        alert(response.message);
                        $('.data-table').DataTable().ajax.reload();
                    }
                });
            }
            else{
                location.reload();
            }
        });

        $('.data-table').on('click','.delete',function(){
            // console.log("Hello World!!!");
            let userId = $(this).data('user-id');

            if(confirm('Do you really want to perform this action?')){
                $.ajax({
                    url: "{{ route('delete') }}",
                    method: 'POST',
                    data: {
                        userId:userId,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        // table.destroy();
                        // makeDataTable();
                        // table.ajax.reload();
                        $('.data-table').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        alert(response.message);
                        // table.ajax.reload();
                        $('.data-table').DataTable().ajax.reload();
                    }
                });
            }
        });
    });


</script>
@endpush



