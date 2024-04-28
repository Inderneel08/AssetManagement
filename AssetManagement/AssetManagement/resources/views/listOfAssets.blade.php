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
                <h1 class="m-0">List of Assets</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard / List of Assets</li>
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
                <a class="btn btn-primary" href="{{ route('create_assets') }}">Add Asset</a>
            </div>
            <div style="float:left">
                {{-- {{route('add-unit-user')}} --}}
                <a class="btn btn-primary" href="{{ route('home') }}">Back</a>
            </div>

            <div style="position: absolute; left: 45%;">
                
                <a class="btn btn-primary" href="{{ route('exportAssets') }}">Download</a>
            </div>

    </div>
        <div class="col-sm-12">
            
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>List of Assets</h6>
                </div>
                <table class="table table-bordered Data-Table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Asset Id</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Asset Type</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Action</th>
                            <th>IP Address</th>
                            <th>MAC ID</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<br>
<br>


@endsection


@push('script')


<script type="text/javascript">


// document.addEventListener('DOMContentLoaded',function(){
    
    $(function () {
        
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
                    if(element.status==1){
                        list_users.push(element.username);
                    }
                });

                let username = "{{ session('username') }}";

                list_users.push(username);

                // console.log(list_users);

                // for(let i=0;i<list_users.length;i++){
                //     console.log(list_users[i]);
                // }
            },
        });
        

        var table = $('.Data-Table').DataTable({
            processing: true,
            serverSide: false,
            select: true,
            ajax: "{{ route('getAssets') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'Id'},
                {data: 'asset_id', name: 'Asset Id'},
                {data: 'make', name: 'Make'},
                {data: 'model', name: 'Model'},
                {data: 'asset_type', name: 'Asset Type'},
                {data: 'status', name:'Status', orderable: false, searchable: true},
                // {data: 'created_on',name: 'Asset Creation Date', orderable: false, searchable: false},
                {data: 'assignedTo', name:'Assigned To', orderable: false, searchable: true},
                {data: 'action', name: 'Action', orderable: false, searchable: false},
                {data: 'ip', name: 'IP Address'},
                {data: 'mac_id',name: 'MAC ID'},
            ],

            aoColumnDefs:[
                {
                    aTargets: [5],
                    mData: 'status',
                    mRender : function(data,type,row){

                        return ` 
                                <select class="status-select searchable-dropdown" id= "select" data-search="Open" data-user-id="${row.id}" >
                                    <option value="0" ${data==0 ? 'selected':''}>INACTIVE</option>
                                    <option value="1" ${data==1? 'selected':''}>ACTIVE</option>

                                </select>
                        `;
                    }
                },

                // {
                //     aTargets: [6],
                //     mData: 'created_on',
                //     mRender : function(data,type,row){
                //         return ` 

                //             <input type="date" id="created_on" name="created_on" data-created-on="${row.id}" value="${data}"> 

                //         `;
                //     }

                // },

                {
                    aTargets: [6],
                    mData: 'assignedTo',
                    mRender : function(data,type,row){

                        var isDisabled = row.status == 0 ? 'disabled':'';

                        return ` 
                                <select class="assign-select searchable-dropdown" id="select-user" data-search="Open" title="Assign" data-asset-id="${row.id}" data-selected="${data}" ${isDisabled}>
                                    <option value="default" ${row.assignedTo==='default' ? 'selected':''}>Not In Use</option>
                                    <option value="scraped" ${row.assignedTo==='scraped'? 'selected':''}> In Scrap </option>
                                </select>
                        `;
                    }
                }

            ],
        });


        table.on('draw.dt',function(){

            table.rows().every(function(){
            var row = this.node();
            var select = $(row).find('.assign-select');

                if(select[0].length<=2){
                    list_users.forEach(function(users){
                        var option = $('<option>',{
                            value:users,
                            text:users
                        });

                        var dataSelected = select.data('selected');

                        if(dataSelected===users){
                            option.prop('selected',true);
                        }
                        
                        select.append(option);
                    });
                }
            });
        });

        table.on('click','.delete',function(){

            let assetId = $(this).data('asset-id');

            if(confirm('Are you sure you want to perform the action')){
                $.ajax({
                    url: "{{ route('deleteAssets') }}",
                    method: 'POST',
                    data: {
                        assetId:assetId,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        // location.reload();
                        $('.Data-Table').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        alert(response.message);
                        // location.reload();
                        $('.Data-Table').DataTable().ajax.reload();
                    }
                });
            }

        });

        table.on('change','.status-select',function(){
            // console.log("Hello World!!!");
            let userId = $(this).data('user-id');
            let newStatus = $(this).val();

            console.log(userId);
            console.log(newStatus);

            if(confirm('Are you sure you want to perform the action')){
                $.ajax({
                    url: "{{ route('changeStatusOfAsset') }}",
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
                        // location.reload();
                        $('.Data-Table').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        alert(response.message);
                        // location.reload();
                        $('.Data-Table').DataTable().ajax.reload();
                    }
                });        
            }
            else{
                location.reload();
            }
        });

        table.on('change','.assign-select',function(){

            let assetId = $(this).data('asset-id');

            let user = $(this).val();

            if(confirm('Are you sure you want to perform the action')){
                $.ajax({
                    url: "{{ route('assignTo') }}",
                    method: 'POST',
                    data: {
                        assetId:assetId,
                        user:user,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // alert(response.message);
                        $('.Data-Table').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        // alert(response.message);
                        $('.Data-Table').DataTable().ajax.reload();
                    }
                });   
            }
            else{
                location.reload();
            }
        });

    });



    // Data Table version 1.13.4

    // table.row.add({
    //     status: 'Status',
    // }).draw();

    // table.settings().draw();



// });

</script>


@endpush