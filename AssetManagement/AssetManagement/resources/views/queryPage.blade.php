@extends('layouts.admin.app')

@section('content')

@if(session('message'))

<div class="alert alert-success">
    {{ session('message') }}
</div>

@endif

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List of Notifications</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard / Your service requests</li>
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
                    <a class="btn btn-primary" href="{{ route('create_new_query') }}">Create a new query</a>
                </div>
                <div style="float:left">
                    {{-- {{route('add-unit-user')}} --}}
                    <a class="btn btn-primary" href="{{ route('home') }}">Back</a>
                </div>

                <div style="position: absolute; left: 45%;">
                
                    <a class="btn btn-primary" href="{{ route('exportIssueForSpecificUser') }}">Download</a>
                </div>
        </div>
    </div>

</div>

{{-- Action consists of two buttons view and delete. View consists of  --}}

<div class="col-sm-12">
            
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Your Issues</h6>
        </div>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Description</th>
                    <th>Asset Type</th>
                    <th>Remarks</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Action</th>  
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@endsection





@push('script')

<script type="text/javascript">

document.addEventListener('DOMContentLoaded',function(){
    $(function () {
        var list_assets = [];

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('getIssues') }}",
            columns:[
                {data: 'DT_RowIndex', name: 'Id'},
                {data: 'description', name: 'Description'},
                {data: 'asset_type',name: 'Asset Type'},
                {data: 'remarks', name:'Remarks'},
                {data: 'status',name: 'Status'},
                // "render":function(data,type,row){
                //     if(type==='display'){
                        // if(row.status==1){
                        //     return('PENDING');
                        // }
                        // else if(row.status==0){
                        //     return('RESOLVED');
                        // }
                        // else{
                        //     return('UNRESOLVED');
                        // }
                //     }
                // }},
                {data: 'priority', name:'Priority'},
                // "render":function(data,type,row){
                //     if(type==='display'){
                        // if(row.priority==0){
                        //     return('LOW');
                        // }
                        // else if(row.priority==1){
                        //     return('MEDIUM');
                        // }
                        // else{
                        //     return('HIGH');
                        // }
                //     }
                // }},
                {data: 'action', name: 'Action', orderable: false, searchable: false},
            ],
            
            aoColumnDefs: [
                
                // list_assets=[];

                {
                    aTargets: [2],
                    "defaultContent": " ",
                    mRender: function(data,type,row){

                        list_assets.push(row.asset_id);
                        // let asset_id = row.asset_id;
                        // $.ajax({
                        //     url: '/fetchAssetId',
                        //     type: 'GET',
                        //     data: {"id": asset_id},
                        //     success: function(response){
                        //         row[2]+=response;
                        //     }
                        // });

                        // return row.asset_id

                        return row.asset_type
                    }
                } ,

                {
                    aTargets: [4],
                    mData: 'status',
                    mRender : function(data,type,row){
                        if(row.status==1){
                            return('PENDING');
                        }
                        else if(row.status==0){
                            return('RESOLVED');
                        }
                        else{
                            return('UNRESOLVED');
                        }
                    }
                } ,

                {
                    aTargets: [5],
                    mData: 'priority',
                    mRender : function(data,type,row){
                        if(row.priority==0){
                            return('LOW');
                        }
                        else if(row.priority==1){
                            return('MEDIUM');
                        }
                        else{
                            return('HIGH');
                        }
                    }
                }
            ],

        });


        console.log(list_assets);
    });

    $('.data-table').on('click','.delete',function(){
        let issue_id = $(this).data('issue-id');

        if(confirm('Are you sure you want to perform the action')){
            $.ajax({
                url: "{{ route('delete_issues') }}",
                method: 'POST',
                data: {
                    issue_id:issue_id,
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
    });
});

</script>


@endpush