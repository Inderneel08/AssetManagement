<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConsumableExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $assets = Asset::where('delete_flag','=',0)->where('consumable','=',1)->get();

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
                'Consumable Id' => $asset->asset_id,
                'Make' => $asset->make,
                'Model' => $asset->model,
                'Consumable Type' => $asset->asset_type,
                'Status' => $asset->status,
                'Assigned To' => $asset->assignedTo,
            ];
        });
        
        return $assets;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Consumable Id',
            'Make',
            'Model',
            'Consumable Type',
            'Status',
            'Assigned To',
        ];
    }

}
