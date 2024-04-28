<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssetsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $clickedLabel;

    public function __construct($clickedLabel)
    {
        $this->clickedLabel = $clickedLabel;        
    }


    public function collection()
    {
        $assets=null;

        if($this->clickedLabel==null){
            $assets = Asset::where('delete_flag','=',0)->get();
        }
        else{
            $assets = Asset::where('delete_flag','=',0)->where('asset_type','=', $this->clickedLabel)->get();
        }

        $assets->each(function ($asset, $index) {
            $asset->custom_id = $index + 1;
        });

        $assets->transform(function ($asset) {

            if($asset->assignedTo=='default'){
                $asset->assignedTo = 'Not In Use';
            }
            
            if($asset->assignedTo=='scraped'){
                $asset->assignedTo = 'In Scrap';
            }

            if($asset->status==1){
                $asset->status = 'ACTIVE';
            }

            if($asset->status==0){
                $asset->status = 'INACTIVE';
            }

            return $asset;
        });

        $assets = $assets->map(function ($asset) {
            return [
                'Id' => $asset->custom_id,
                'Asset Id' => $asset->asset_id,
                'Make' => $asset->make,
                'Model' => $asset->model,
                'Asset Type' => $asset->asset_type,
                'Status' => $asset->status,
                'Assigned To' => $asset->assignedTo,
                'IP Address' => $asset->ip,
                'MAC ID' => $asset->mac_id,
            ];
        });
        
        return $assets;
    }



    public function headings(): array
    {
        return [
            'Id',
            'Asset Id',
            'Make',
            'Model',
            'Asset Type',
            'Status',
            'Assigned To',
            'IP Address',
            'MAC ID',
        ];
    }
}
