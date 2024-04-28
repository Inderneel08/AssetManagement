@extends('layouts.admin.app')

@section('content')

{{-- @if(session('message'))

<div class="alert alert-success">
    {{ session('message') }}
</div>

@endif --}}

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List of Service Requests</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard / List of Service Requests</li>
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
                <div style="float:left">
                    {{-- {{route('add-unit-user')}} --}}
                    <a class="btn btn-primary" href="{{ route('home') }}">Back</a>
                </div>

                <div style="position: absolute; left: 45%;">
                
                    <a class="btn btn-primary" href="{{ route('exportIssueHistory') }}">Download</a>
                </div>
        </div>
    </div>

</div>

{{-- Action consists of two buttons view and delete. View consists of  --}}

<div class="col-sm-12">
            
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>List of Issues</h6>
        </div>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Asset Type</th>
                    <th>Asset Id</th>
                    <th>Description</th>
                    <th>Issue Raised By</th>
                    <th>Issue Raised At</th>
                    <th>Issue Resolved On</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Resolved By</th>
                    <th>Remarks</th>
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
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('show_issues') }}",
            columns:[
                {data: 'DT_RowIndex', name: 'Id'},
                {data: 'assetType', name: 'Asset Type'},
                {data: 'assetId', name: 'Asset Id'},
                {data: 'description', name: 'Description'},
                {data: 'raisedby', name: 'Issue Raised By'},
                {data: 'start_date' , name: 'Issue Raised At'},
                {data: 'end_date' , name: 'Issue Resolved On'},
                {data: 'priority', name: 'Priority'},
                {data: 'status',name: 'Status'},
                {data: 'resolvedBy', name: 'Resolved By'},
                {data: 'remarks', name:'Remarks'},
                {data: 'action', name: 'Action', orderable: false, searchable: false},
            ] ,
            
            aoColumnDefs:[
                {
                    aTargets: [6],
                    mData: 'end_date',
                    mRender : function(data,type,row){
                        if(row.end_date==null){
                            return('Still Pending');
                        }
                        else{
                            return(row.end_date);
                        }
                    }
                },

                {
                    aTargets: [9],
                    mData: 'resolvedBy',
                    mRender : function(data,type,row){
                        if(row.resolvedBy==null){
                            return('Still Pending');
                        }
                        else{
                            return(row.resolvedBy);
                        }
                    }
                } ,

                {
                    aTargets: [7],
                    mData: 'priority',
                    mRender : function(data,type,row){
                        if(row.priority==1){
                            return('MEDIUM');
                        }
                        else if(row.priority==0){
                            return('LOW');
                        }

                        else{
                            return('HIGH');
                        }
                    }
                } ,

                {
                    aTargets: [8],
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
                }
            ],
            
        });

    });



    // $('.data-table').on('click','.delete',function(){
    //     let issue_id = $(this).data('issue-id');

    //     if(confirm('Are you sure you want to perform the action')){

    //         $.ajax({
    //             url: "{{ route('delete_issues') }}",
    //             method: 'POST',
    //             data: {
    //                 issue_id:issue_id,
    //             },
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success: function(response) {
    //                 alert(response.message);
    //                 location.reload();
    //             },
    //             error: function(response) {
    //                 alert(response.message);
    //                 location.reload();
    //             }
    //         });
    //     }
    // });
});

</script>


@endpush