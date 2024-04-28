@extends('layouts.admin.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@if($asset->consumable==0) Edit Asset Info @else Edit Consumable Info @endif</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">@if($asset->consumable==0) Dashboard / List of Assets/ Edit Assets @else Dashboard / List of Consumables/ Edit Consumables @endif</li>
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
            <a class="btn btn-primary" href="@if($asset->consumable==0) {{ route('list_assets') }} @else {{ route('list_consumables') }} @endif" >Back</a>
            </div>
            </div>
        <div class="col-sm-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>@if($asset->consumable==0) Edit Asset Info @else Edit Consumable Info @endif</h6>
                </div>
                <div class="card-body px-1 pt-0 pb-2">
                    {{-- <h1>{{ $id }}</h1> --}}
                    <form method="POST" autocomplete="off" action="{{route('editunitasset')}}">
                        @csrf
                        {{-- {{ getNewCsrfTokenvalue() }} --}}
                        {{-- <input type="hidden" name="_verifytoken" id="_verifytoken" value="" /> --}}
                      <div class="form-group">
                        {{-- <label>Select Unit</label> --}}
                        {{-- <select class="form-control" required name="unit_id"> --}}
                            {{-- <option value="">---Select Unit---</option> --}}
                            {{-- @foreach($unit as $u)
                            <option value="0">Yantra India Limited (यंत्र इंडिया लिमिटेड)</option>
                            <option value="{{$u->id}}">{{$u->en_unit_name ??''}}  ({{$u->hi_unit_name ??''}})</option>
                            @endforeach --}}
                        {{-- </select> --}}
                        <label>@if($asset->consumable==0) Asset Id @else  Consumable Id  @endif</label>
                        <br>
                        <input type="text" class="form-control" readonly name="asset_id" value="{{ $asset->asset_id }}">
                      </div>
                    
                      <div class="form-group">
                        <label>@if($asset->consumable==0) Asset Type @else  Consumable Type @endif </label>
                        <input type="text" readonly name="asset_type" class="form-control" value="{{ $asset->asset_type }}"/>
                      </div>

                      @if(($asset->asset_type==='Switch')||($asset->asset_type==='Firewall')||($asset->asset_type==='Modem 1')||($asset->asset_type==='Modem 2'))

                      <div class="form-group">
                        <label>Asset Name</label>
                        <input type="text" required name="asset_name" class="form-control" value="{{ $asset->asset_name }}"/>
                      </div>

                      <div class="form-group">
                        <label>Asset Port</label>
                        <input type="number" name="port" class="form-control" value="{{ $asset->port }}">
                      </div>

                      @endif
                      
                      {{-- <div class="form-group">
                        <label>Memory</label>
                        <select class="form-control" required name="user_type">
                            <option value="">---Select Role---</option>
                            <option value="8">8GB</option>
                            <option value="16">16GB</option>
                            <option value="32">32GB</option>
                            <option value="64">64GB</option>
                            <option value="128">128GB</option>
                            <option value="256">256GB</option>
                            <option value="512">512GB</option>
                            <option value="9">Super Admin</option>     
                            <option value="11">Reports Type</option>
                            <option value="15">Top Management</option>                     
                        </select>
                      </div>   --}}
                      {{-- <div class="form-group">
                        <label>Asset Type</label>
                        <input type="text" required name="asset_name" class="form-control">
                        <select class="form-control" name="asset_type" id="asset_type" required>
                            <option value="">---Select Asset Type---</option>
                            <option value="Computer">Computer</option>
                            <option value="Printer">Printer</option>
                            <option value="VC Equipment">VC Equipment</option>
                        </select>
                      </div> --}}

                      {{-- <div class="form-group">
                        <label>Asset Category</label>
                        <select class="form-control" name="asset_category" id="asset_category" required>
                            <option value="">---Select Asset Category---</option>
                        </select>
                      </div> --}}
                      
                      <input type="hidden" name="id" value="{{ $id }}">

                      {{-- <div class="form-group">
                        <label>Operating System Type</label>
                        <select class="form-control" required name="os_type" id="os_type" required>
                            <option value="">---Select OS TYPE---</option>
                            <option value="Windows">Windows</option>
                            <option value="Maya">Maya</option>
                        </select>
                      </div> --}}

                      <div class="form-group">
                        <label>Make</label>
                        <input type="text" class="form-control" id="make" name="make" @if($asset->make!=null) required @endif value="{{ $asset->make }}">
                        {{-- <select name="make" id="make" class="form-control">
                            <option value="">---Select Company Name Of Asset---</option>
                            <option value="APPLE"  @if($asset->make==="APPLE") selected  @endif >APPLE</option>
                            <option value="HP"  @if($asset->make==="HP") selected  @endif >HP</option>
                            <option value="ACER"  @if($asset->make==="ACER") selected @endif  >ACER</option>
                        </select> --}}
                      </div>

                      <div class="form-group">
                        <label>Model</label>
                        <input type="text" class="form-control" name="model" @if($asset->model!=null) required @endif value="{{ $asset->model }}">
                      </div>

                      @if($asset->asset_type==='Desktop')

                      <div class="form-group">
                        <label>IP Address</label>
                        <input type="text" class="form-control" id="ip_address" @if($asset->ip!=null) required @endif name="ip" value="{{ $asset->ip }}">
                      </div>

                      <div class="form-group">
                        <label>MAC ID</label>
                        <input type="text" class="form-control" id="mac_id" @if($asset->mac_id!=null) required @endif name="mac_id" value="{{ $asset->mac_id }}">
                      </div>

                      @endif

                      {{-- <div class="form-group">
                        <label>Processor</label>
                        <select class="form-control" required name="processor">
                            <option value="">---Select OS TYPE---</option>
                            <option value="Intel">Intel</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Generation</label>
                        <select class="form-control" required name="processor">
                            <option value="">---Select Generation version---</option>
                            <option value="7">7th Gen</option>
                            <option value="8">8th Gen</option>
                            <option value="9">9th Gen</option>
                            <option value="11">11th Gen</option>
                            <option value="12">12th Gen</option>
                        </select>
                      </div>                         --}}

                      <div class="form-group">
                        <label>Creation Date</label>
                        <input type="date" class="form-control" id="creation_date" name="creation_date" value="{{ $asset->created_on }}">
                      </div>

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

    // $(document).ready(function(){

        // if('{{ $asset->asset_type }}'==='VC Equipment'){
        //     var option1 = $('<option>',{
        //             value:'CODEC',
        //             text:'CODEC'
        //         });

        //     $('#asset_category').append(option1);
        // }
        // else if('{{ $asset->asset_type }}'==='Printer'){
        //         var option1 = $('<option>',{
        //             value:'Inkjet(BlackAndWhite)',
        //             text:'Inkjet(BlackAndWhite)'
        //         });

        //         var option2 = $('<option>',{
        //             value:'Inkjet(Color)',
        //             text:'Inkjet(Color)'
        //         });

        //         var option3 = $('<option>',{
        //             value:'Laser(BlackAndWhite)',
        //             text:'Laser(BlackAndWhite)'
        //         });

        //         var option4 = $('<option>',{
        //             value:'Laser(Color)',
        //             text:'Laser(Color)'
        //         });

        //         $('#asset_category').append(option1);
        //         $('#asset_category').append(option2);
        //         $('#asset_category').append(option3);
        //         $('#asset_category').append(option4);
        // }
        // else if('{{ $asset->asset_type }}'==='Computer'){
        //     var option1 = $('<option>',{
        //             value:'Laptop',
        //             text:'Laptop'
        //         });

        //         var option2 = $('<option>',{
        //             value:'Desktop',
        //             text:'Desktop'
        //         });

        //         var option3 = $('<option>',{
        //             value:'All-In-One',
        //             text:'All-In-One'
        //         });

        //         $('#asset_category').append(option1);
        //         $('#asset_category').append(option2);
        //         $('#asset_category').append(option3);
        // }


    // });

  
    document.getElementById('creation_date').max = new Date().toISOString().split('T')[0];

</script>

@endpush