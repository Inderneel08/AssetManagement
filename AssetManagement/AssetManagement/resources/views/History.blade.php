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
                <h1 class="m-0">@if($consumable==0) Asset History @else Consumable History @endif</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">@if($consumable==0) Dashboard / List of Assets/ History @else Dashboard / List of Consumables/ History @endif </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

{{-- {{ $id }} --}}

<div class="container-fluid py-4">

    <div class="row">
        <div class="col-sm-12">
            {{-- <div style="float:right"> --}}
                {{-- {{route('add-unit-user')}} --}}
                {{-- <a class="btn btn-primary" href="/home/assets/history/{{ $id }}/createHistory">Add History</a> --}}
            {{-- </div> --}}
            <div style="float:left">
                {{-- {{route('add-unit-user')}} --}}
                <a class="btn btn-primary" href="@if($consumable==false) {{ route('list_assets') }} @else {{ route('list_consumables') }} @endif">Back</a>
            </div>

            <div style="position: absolute; left: 45%;">
                
                <a class="btn btn-primary" href="/home/assets/history/download/{{ $id }}">Download</a>
            </div>

        </div>

        <div class="col-sm-12">
            
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Usage History</h6>
                </div>
                <table class="table table-bordered Data-Table">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Assigned To</th>
                            {{-- <th>Action</th> --}}
                            <th>Action Performed</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>


@endsection

@push('script')

<script type="text/javascript">

    document.addEventListener('DOMContentLoaded',function(){
        console.log({{ $id }});
        
        var table = $('.Data-Table').DataTable({
            processing: true,
            serverSide: false,
            
            ajax: {
                url: '{{ route('getHistory',$id)}}', 
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },

            columns: [
                {data: 'DT_RowIndex', name: 'Index'},
                {data: 'date_from', name: 'From'},
                {data: 'date_to', name: 'To'},
                // ,"render":function(data,type,row){
                //     if(type==='display'){
                //         if(row.date_to==null){
                //             var currentDate = new Date();

                //             var formattedDate = currentDate.toISOString().slice(0,10);

                //             return(formattedDate);
                //         }

                //         return(data);
                //     }
                // }},
                {data: 'assignedTo', name:'Assigned To'},
                // "render":function(data,type,row){
                //     if(type==='display'){
                        // if(row.assignedTo==='default'){
                        //     return("Not in use");   
                        // }

                        // return(data);
                //     }
                // }},
                // {data: 'action', name: 'Action', orderable: false, searchable: false},
                {data: 'action_performed',name: 'Action Performed'},
            ],
            
            aoColumnDefs: [
                {
                    aTargets: [2],
                    mData: 'date_to',
                    mRender: function(data,type,row){
                        if(row.date_to==null){
                            return("Till Now");
                        }

                        return(data);
                    }
                },
                {
                    aTargets: [3],
                    mData: 'assignedTo',
                    mRender: function(data,type,row){
                        if(row.assignedTo==='default'){
                            return("Not in use");   
                        }

                        return(data);
                    }
                }
            ],

        });


        // table.on('click','.delete',function(){

        //     let history_id = $(this).data('history-id');

        //     console.log(history_id);

        //     $.ajax({
        //         url: "{{ route('deleteHistory') }}",
        //         method: 'POST',
        //         data: {
        //             history_id:history_id,
        //         },
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function(response) {
        //             alert(response.message);
        //             location.reload();
        //         },
        //         error: function(response) {
        //             alert(response.message);
        //             location.reload();
        //         }
        //     });
        // });


    });



    // delete

</script>


@endpush