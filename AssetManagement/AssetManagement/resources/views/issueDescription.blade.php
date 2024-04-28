@extends('layouts.admin.app')

@section('content')

<div id="overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 1000; background-color: rgba(0,0,0,0.5); display: none;">

</div>

<div class="container-fluid py-4">
    <div class="row">

    <div class="col-sm-12">
        {{-- {!!displayAlert()??''!!} --}}
            <div style="float:left; margin-right: 35%;">
                {{-- {{route('add-unit-user')}} --}}
                <a class="btn btn-primary" @if(session('role')==='ADMIN') href={{ route('allIssues') }} @else href={{ route('raise_request') }} @endif >  Back</a>
            </div>

            <div style="float: left;">
                @if($issue->status==1 and session('role')==='ADMIN')

                <a class="btn btn-primary" id="close_request" data-close-id="{{ $id }}">Close Service Request</a>

                @endif

                @if($issue->status==2 and session('role')==='ADMIN')

                <a class="btn btn-primary" id="start_request" data-close-id="{{ $id }}">Reopen Service Request</a>

                @endif

            </div>


            <div style="float: right;">
                @if(($issue->status==1 or $issue->status==2) and (session('role')==='USER'))

                <a class="btn btn-primary" id="escalate_request" data-escalate-id="{{ $id }}">Escalate Request</a>

                @endif
            </div>

            </div>

            
        <div class="col-sm-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="left" style="float: left;">
                        <h6>Details</h6>
                    </div>

                    <div class="mid" style="float: right;">
                        <h6> Priority : 

                            @if($issue->priority==0)
                                LOW
                            
                            @elseif($issue->priority==1)
                                MEDIUM

                            @else
                                HIGH

                            @endif

                        </h6>
                    </div>

                    <div class="right" style="float: right; margin-right: 1%;">
                        <h6> Status : 
                            
                            @if($issue->status==1)
                                Pending
                            
                            @elseif($issue->status==0)
                                RESOLVED

                            @elseif($issue->status==2)
                                UNRESOLVED
                            
                            @endif
                        </h6>
                    </div>

                </div>
                <br>
                <div class="card-body px-1 pt-0 pb-2">
                    
                    <div class="form-group" style="position: relative; left: 1%;">
                        <h5>Asset Id</h5>

                        <h6 style="position: relative; left: 1%;"> {{  $asset->asset_id }} </h6>
                    
                    </div>
                    

                    <div class="form-group" style="position: relative; left: 1%;">
                        <h5>Description</h5>

                        <textarea id="yourTextArea" @if(session('role')==='ADMIN' or $issue->status==0 or $issue->status==2) readonly @endif cols="100" rows="10" style="position: relative; left: 1%;">{{ $issue->description }}</textarea>

                    </div>

                    <br>
                    <br>

                    <div class="form-group" style="position: relative; left: 1%;">
                        <h5>Asset Belongs To</h5>
                        <h6 style="position: relative; left: 1%;"> {{ $asset->assignedTo }} </h6>
                    </div>                        

                </div>
            </div>

            <div class="card mb-4" id="customAlertBox" style="position: fixed; width: 50%; top: 40%;left: 50%; transform: translate(-50%, -40%); z-index: 1001; display: none;">
                <div class="card-header pb-0">
                    <div class="left" style="float: left;">
                        <h5>Outcome</h5>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    {{-- <div class="form-group">
                        <h5 style="margin-left:1%;"> Status </h5>
                    </div> --}}

                    <div style="display: flex; flex-direction: row;">
                        <h5 style="margin-left:2%;"> Status </h5>
                        <h5 style="margin-left:35%;"> Asset Id </h5>
                        <h5 style="margin-left:30%;"> Asset Belongs To </h5>
                    </div>

                    <div style="display: flex; flex-direction: row;">
                        <select name="status" id="status" style="margin-left:2%; ">
                            <option value=2>UNRESOLVED</option>
                            <option value=0>RESOLVED</option>
                        </select>

                        <h6 style="margin-left:28%;">{{  $asset->asset_id }}</h6>

                        <h6 style="margin-left: 28%;">{{ $asset->assignedTo }}</h6>
                    </div>

                </div>
                
                <br>

                <div class="form-group">
                    <h5 style="margin-left:1%;"> Remarks </h5>
                    <textarea name="remarks" id="remarks" cols="100" rows="10" style="margin-left: 2%;"></textarea>
                </div>

                <button type="submit" href="#"  class="edit btn btn-success" style="width: 10%; margin-left: 2%;"> Submit </button>

            </div>

        </div>
    </div>
</div>

@endsection


@push('script')


<script type="text/javascript">

    function showOverlay()
    {
        $('#overlay').show();

        $('#customAlertBox').show();
    }

    function closeOverlay()
    {
        $('#overlay').hide();

        $('#customAlertBox').hide();
    }


    $(function(){

        $('#close_request').click(function(){
            showOverlay();
        });

        $('.btn-success').click(function(){
            let close_id = $('#close_request').data('close-id');

            let remarks = $('textarea#remarks').val();

            let status = $('#status').val();

            if(confirm('Are you sure you want to perform the action')){

                $.ajax({
                    url: "{{ route('close_request') }}",
                    method: 'POST',

                    data: {
                        close_id:close_id,
                        remarks:remarks,
                        status:status,
                    },

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },

                });
            }
        })

        $('#overlay').on('click',function(event){
            // overlay customAlertBox
            if(!($(event.target).closest('#customAlertBox')).length && !$(event.target).is(':input')){
                closeOverlay();
            }
        });

        $('#start_request').on('click',function(){
            let close_id = $(this).data('close-id');
            if(confirm('Are you sure you want to perform the action')){

                $.ajax({
                    url: "{{ route('start_request') }}",
                    method: 'POST',

                    data: {
                        close_id:close_id,
                    },

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },

                });
            }
        });

        $('#escalate_request').click(function(){
            let close_id = "{{ $id }}";

            if(confirm('Are you sure you want to perform the action')){

                $.ajax({
                    url: "{{ route('escalate_request') }}",
                    method: 'POST',
                    
                    data: {
                        close_id:close_id,
                    },

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error:function(response) {
                        alert(response.message);
                        location.reload();
                    }
                    
                });
            }

        });

        $('#yourTextArea').blur(function(){
            var text = $(this).val();

            let close_id = "{{ $id }}";

            $.ajax({
                url: "{{ route('updateDescription') }}",
                method : 'POST',
                data : {
                    text:text,
                    close_id:close_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });

        })

    });

</script>


@endpush