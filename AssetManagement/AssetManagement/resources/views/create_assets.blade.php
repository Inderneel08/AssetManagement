@extends('layouts.admin.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create a new Asset</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard / List of Assets/ Create a new asset</li>
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
            <a class="btn btn-primary" href="{{ route('list_assets') }}">Back</a>
            </div>
            </div>
        <div class="col-sm-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Create a new Asset</h6>
                </div>
                <div class="card-body px-1 pt-0 pb-2">
                    
                    <form method="POST" autocomplete="off" action="{{route('insertunitasset')}}">
                        @csrf
                        {{-- {{ getNewCsrfTokenvalue() }} --}}
                        {{-- <input type="hidden" name="_verifytoken" id="_verifytoken" value="" /> --}}

                        <div class="form-group">
                            <label>Consumable</label>
                            <select class="form-control" name="consumable" id="consumable" required>
                                <option value=0 selected>No</option>
                                <option value=1>Yes</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Asset Type</label>
                            {{-- <input type="text" required name="asset_name" class="form-control"> --}}
                            <select class="form-control" name="asset_type" id="asset_type" required>
                                <option value="">---Select Asset Type---</option>
                                <option value="Desktop">Desktop</option>
                                <option value="Laptop">Laptop</option>
                                <option value="Printer">Printer</option>
                                <option value="VC System">VC System</option>
                                <option value="EPABX">EPABX</option>
                                <option value="HardDisk">HardDisk</option>
                                <option value="Switch">Switch</option>
                                <option value="Firewall">Firewall</option>
                                <option value="Modem 1">Modem 1</option>
                                <option value="Modem 2">Modem 2</option>
                            </select>
                        </div>

                        <div class="form-group" id="AssetName">
                            {{-- <label>Asset Name</label>
                            <input type="text" class="form-control" required name="asset_name"> --}}
                        </div>

                        <div class="form-group" id="Port">

                        </div>


                      <div class="form-group">
                        {{-- <label>Select Unit</label> --}}
                        {{-- <select class="form-control" required name="unit_id"> --}}
                            {{-- <option value="">---Select Unit---</option> --}}
                            {{-- @foreach($unit as $u)
                            <option value="0">Yantra India Limited (यंत्र इंडिया लिमिटेड)</option>
                            <option value="{{$u->id}}">{{$u->en_unit_name ??''}}  ({{$u->hi_unit_name ??''}})</option>
                            @endforeach --}}
                        {{-- </select> --}}
                        <label>Asset Id</label>
                        <br>
                        <input type="text" class="form-control" required name="asset_id">
                      </div>
                      
                      <div class="form-group">
                        <label>Make</label>
                        <input type="text" class="form-control" id="make"  name="make">
                      </div>

                      
                      <div class="form-group">
                        <label>Model</label>
                        <input type="text" class="form-control" id="model"  name="model">
                      </div>
                      
                      <div class="form-group" id="IP_Address">
                        <label>IP Address</label>
                        <input type="text" class="form-control" id="ip_address"  name="ip">
                      </div>

                      <div class="form-group" id="MAC_Id">
                        <label>MAC ID</label>
                        <input type="text" class="form-control" id="mac_id"  name="mac_id">
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

    $(document).ready(function(){

        $('#consumable').on('change',function(){
            var currentId = $('#consumable').val();

            var selectDropdown = $('#asset_type');

            selectDropdown.empty();

            var emptyoption = $('<option>',{
                value:"",
                text:'---Select Asset Type---'
            });

            selectDropdown.append(emptyoption);

            if(currentId==1){
                var option1 = $('<option>',{
                    value:'Printer Cartridge',
                    text:'Printer Cartridge'
                });

                var option2 = $('<option>',{
                    value:'Mouse',
                    text:'Mouse'
                });

                var option3 = $('<option>',{
                    value:'Keyboard',
                    text:'Keyboard'
                });

                var option4 = $('<option>',{
                    value:'Mouse+Keyboard',
                    text:'Mouse+Keyboard'
                });

                var option5 = $('<option>',{
                    value:'RAM',
                    text:'RAM'
                });

                var option6 = $('<option>',{
                    value:'HDD',
                    text:'HDD'
                });

                var option7 = $('<option>',{
                    value:'SSD',
                    text:'SSD'
                });

                selectDropdown.append(option1);
                selectDropdown.append(option2);
                selectDropdown.append(option3);
                selectDropdown.append(option4);
                selectDropdown.append(option5);
                selectDropdown.append(option6);
                selectDropdown.append(option7);

                $('#IP_Address').html(null);
                $('#MAC_Id').html(null);
            }
            else{
                var option1 = $('<option>',{
                    value:'Desktop',
                    text:'Desktop'
                });

                var option2 = $('<option>',{
                    value:'Laptop',
                    text:'Laptop'
                });

                var option3 = $('<option>',{
                    value:'Printer',
                    text:'Printer'
                });

                var option4 = $('<option>',{
                    value:'VC System',
                    text:'VC System'
                });

                var option5 = $('<option>',{
                    value:'EPABX',
                    text:'EPABX'
                });
                
                var option6 = $('<option>',{
                    value:'HardDisk',
                    text:'HardDisk'
                });
                
                var option7 = $('<option>',{
                    value:'Switch',
                    text:'Switch'
                });

                var option8 = $('<option>',{
                    value:'Firewall',
                    text:'Firewall'
                });

                var option9 = $('<option>',{
                    value:'Modem 1',
                    text:'Modem 1'
                });

                var option10 = $('<option>',{
                    value:'Modem 2',
                    text:'Modem 2'
                });


                selectDropdown.append(option1);
                selectDropdown.append(option2);
                selectDropdown.append(option3);
                selectDropdown.append(option4);
                selectDropdown.append(option5);
                selectDropdown.append(option6);
                selectDropdown.append(option7);
                selectDropdown.append(option8);
                selectDropdown.append(option9);
                selectDropdown.append(option10);

                $('#IP_Address').html(generateIp_Address());
                $('#MAC_Id').html(generateMacId());
            }
        });

        $('#asset_type').on('change',function(){

            if($('#consumable').val() === "0"){
                if(($(this).val()==='Switch')||($(this).val()==='Firewall'||($(this).val()==='Modem 1')||($(this).val()==='Modem 2'))){
                
                    if($(this).val()==='Switch'){
                        $('#Port').html(generatePort());

                        // $('#make').prop('required',false);

                        // $('#model').prop('required',false);

                        // $('#ip_address').prop('required',false);

                        // $('#mac_id').prop('required',false);
                    }

                    $('#AssetName').html(generate());
                    $('#IP_Address').html(null);
                    $('#MAC_Id').html(null);
                }
                else{
                    $('#AssetName').html(null);
                    $('#IP_Address').html(generateIp_Address());
                    $('#MAC_Id').html(generateMacId());
                    $('#Port').html(null);
                    
                    // $('#make').prop('required',true);

                    // $('#model').prop('required',true);

                    // $('#ip_address').prop('required',true);

                    // $('#mac_id').prop('required',true);
                }
            }
        });


        function generate()
        {
            return '<label> Asset Name </label> <input type="text" class="form-control" required name="asset_name"> ';
        }

        function generatePort()
        {
            return '<label> Asset Port </label> <input type="number" class="form-control" name="port"> ';
        }

        function generateIp_Address()
        {
            return '<label>IP Address</label> <input type="text" class="form-control" id="ip_address"  name="ip">';
        }

        function generateMacId()
        {
            return '<label>MAC ID</label> <input type="text" class="form-control" id="mac_id"  name="mac_id">';
        }

        // $('#asset_type').on('change',function(){
        //     var select = $('#asset_category');

        //     select.empty();

        //     var emptyoption = $('<option>',{
        //         value:"",
        //         text:'---Select Asset Category---'
        //     });

        //     select.append(emptyoption);

        //     if($(this).val()==='Computer'){
        //         var option1 = $('<option>',{
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

        //         select.append(option1);
        //         select.append(option2);
        //         select.append(option3);
        //     }
        //     else if($(this).val()==='Printer'){
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

        //         select.append(option1);
        //         select.append(option2);
        //         select.append(option3);
        //         select.append(option4);
        //     }
        //     else if($(this).val()==='VC Equipment'){
        //         var option1 = $('<option>',{
        //             value:'CODEC',
        //             text:'CODEC'
        //         });

        //         select.append(option1);
        //     }
        // });
    });

</script>

@endpush
