@extends('layouts.admin.app')

@section('content')

{{-- <div id="listOfUsers" style="display: flex; justify-content:space-around;"> --}}
    {{-- <a href="{{ route('list_users') }}" class="btn btn-primary search_btn_margin">List of Users</a> --}}
    {{-- {{ route('list_assets') }} --}}
    {{-- <a href="{{ route('list_assets') }}" class="btn btn-danger search_btn_margin">List of Assets</a> --}}

    {{-- @if(session('role')==='ADMIN')
    <a href="{{ route('create_users') }}" class="btn btn-danger search_btn_margin">Create a User</a>
    <a href="{{ route('create_assets') }}" class="btn btn-primary search_btn_margin">Create an Asset</a>
    @endif --}}
{{-- </div> --}}


<div class="col-sm-12" style="display: flex; justify-content: end;">
    <ol class="breadcrumb float-sm-right" style="width :50%;">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</div>

<br>
<br>

{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Open modal
</button> --}}
  
  <!-- The Modal -->
  <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="chartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
            <div class="col">
                <h4 class="modal-title"></h4>
            </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="col">
                <a class="btn btn-primary download">Download</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered Data-Table">
                    <thead>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
</div>

@if(session('role')==='ADMIN')
<div class="charts row">

    <div class="asset_classification col-sm-6" style="display: flex; flex-direction: column;">
        <h3 style="display: flex; justify-content: center;">Asset Classification</h3>

        <br>
        <div class="chartContainer1" id="chartContainer1">
            {{  $chart1->container()  }}
            {{  $chart1->script() }}
        </div>

    </div>

    <div class="complaints col-sm-6" style="display: flex; flex-direction: column;">
        <h3 style="display: flex; justify-content: center;">Complaints Status</h3>

        <br>

        <div class="chartContainer2" id="chartContainer2">
            {{  $chart2->container()  }}
            {{  $chart2->script() }}
        </div>

    </div>

</div>

@endif

<script>

    // $('#myModal').modal({
    //     backdrop: 'static',
    //     keyboard: false  // to prevent closing with Esc button (if you want this too)
    // })



    document.addEventListener('DOMContentLoaded',function(){
        console.log("DOMLoaded");
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
            },
        });


        var sessionRole = @json($role);


        if(sessionRole==="ADMIN"){
            var clickedLabel=null;

            var chart1 = document.getElementById('chartContainer1');

            var chart2 = document.getElementById('chartContainer2');

            var chart1Id = chart1.children[0].id;
            var chart2Id = chart2.children[0].id;


            var chartElement1 = document.getElementById(chart1Id);
            var chartElement2 = document.getElementById(chart2Id);

            chartElement1.addEventListener('mouseenter', function () {
                chartElement1.style.cursor = 'pointer';
            });

            chartElement1.addEventListener('mouseleave', function () {
                chartElement1.style.cursor = 'default';
            });

            chartElement2.addEventListener('mouseenter', function () {
                chartElement2.style.cursor = 'pointer';
            });

            chartElement2.addEventListener('mouseleave', function () {
                chartElement2.style.cursor = 'default';
            });

            chartElement1.addEventListener('click',function(event){
                var chart1 = window[chart1Id];

                var ctx1 = chartElement1.getContext('2d');

                var mouseX = event.clientX - chartElement1.getBoundingClientRect().left;
                
                var mouseY = event.clientY - chartElement1.getBoundingClientRect().top;

                var headers = ['Id','Asset Id','Make','Model','Asset Type','Status','Assigned To','Action','IP Address','MAC ID'];

                setTableHeaders(headers);

                handleClickEvent(chart1,mouseX,mouseY);
            });

            chartElement2.addEventListener('click',function(event){

                var chart2 = window[chart2Id];

                var ctx2 = chartElement2.getContext('2d');

                var mouseX = event.clientX - chartElement2.getBoundingClientRect().left;

                var mouseY = event.clientY - chartElement2.getBoundingClientRect().top;

                var headers = ['Id','Asset Type','Asset Id','Description','Issue Raised By','Issue Raised At','Issue Resolved On','Priority','Status','Resolved By','Remarks','Action'];

                setTableHeaders(headers);

                handleClickEvent(chart2,mouseX,mouseY);
            });
        }

        function setTableHeaders(headers)
        {
            if($.fn.DataTable.isDataTable('.Data-Table')){
                $('.Data-Table').DataTable().destroy();
                $('.Data-Table thead').remove();
                $('.Data-Table tbody').remove();
            }
            else{
                $('.Data-Table thead').remove();
            }


            var header = $('<thead>');
            
            var headerRow = $('<tr>');
            
            $.each(headers, function(index,head){
                headerRow.append($('<th>').text(head));
            });

            header.append(headerRow);

            $('.Data-Table').append(header);
        }

        function createAssetTable(clickedLabel)
        {
            var table = $('.Data-Table').DataTable({
            processing: true,
            serverSide: false,
            select: true,
            ajax:{
                url: "{{ route('getAssets') }}",
                type: "GET",
                data: {
                    clickedLabel:clickedLabel,
                },
            },
            columns: [
                {data: 'DT_RowIndex', name: 'Id'},
                {data: 'asset_id', name: 'Asset Id'},
                {data: 'make', name: 'Make'},
                {data: 'model', name: 'Model'},
                {data: 'asset_type', name: 'Asset Type'},
                {data: 'status', name:'Status', orderable: false, searchable: true},
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

                    // alert(clickedLabel);
                    console.log(clickedLabel + " " + select[0].length);

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

        }

        function createIssueTable(clickedLabel)
        {
            var table = $('.Data-Table').DataTable({
                processing: true,
                serverSide: false,
                ajax:{
                    url: "{{ route('show_issues') }}",
                    type: "GET",   
                    data: {
                        clickedLabel:clickedLabel,
                    },
                },
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
        }


        function handleClickEvent(chart,mouseX,mouseY)
        {
            chart.data.datasets.forEach(function (dataset, datasetIndex) {
                var meta = chart.getDatasetMeta(datasetIndex);
                if (meta) {
                    meta.data.forEach(function (element, index) {
                        var rect = element.tooltipPosition();
                        if (element.inRange(mouseX, mouseY)) {
                            clickedLabel = chart.data.labels[index];

                            if(clickedLabel!=null){

                                if((clickedLabel==='Pending')||(clickedLabel==='Resolved')){
                                    createIssueTable(clickedLabel);
                                    $('.modal-title').text(clickedLabel+" Requests");
                                }
                                else{
                                    createAssetTable(clickedLabel);
                                    $('.modal-title').text(clickedLabel);
                                }

                                $('#myModal').modal('show');
                            }
                        }
                    });
                }
            });
        }

        $('.download').on('click',function(){
            if((clickedLabel==='Pending')||(clickedLabel==='Resolved')){
                window.location="{{ route('exportIssueHistory')}}?clickedLabel="+clickedLabel;
            }
            else{
                window.location="{{ route('exportAssets')}}?clickedLabel="+clickedLabel;
            }
        });

    });



</script>

@endsection
{{-- @push('script') --}}



{{-- <script src="{{ asset('front_assets/js/chart.min.js') }}"></script> --}}
{{-- {!! $chart->script() !!} --}}
{{-- @endpush --}}
