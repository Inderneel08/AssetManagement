<?php

namespace App\Exports;

use App\Models\Asset;
use App\Models\AssetHistory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssetHistoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    public function __construct($id)
    {
        $this->id=$id;
    }

    public function collection()
    {
        $asset_id = DB::table('assets')->where('id',$this->id)->first()->asset_id;

        $assetHistorys = AssetHistory::where('delete_flag','=',0)->where('asset_id',$asset_id)->orderByDesc('id')->get();

        $assetHistorys->each(function ($assetHistory, $index) {
            $assetHistory->custom_id = $index + 1;
        });

        $assetHistorys->transform(function ($assetHistory) {
            if($assetHistory->date_to==null){
                $assetHistory->date_to = 'Till Now';
            }

            if($assetHistory->assignedTo=='default'){
                $assetHistory->assignedTo = 'Not In Use';
            }
            
            if($assetHistory->assignedTo=='scraped'){
                $assetHistory->assignedTo = 'In Scrap';
            }

            return($assetHistory);
        });


        $assetHistorys = $assetHistorys->map(function ($assetHistory) {
            return [
                'Index'            => $assetHistory->custom_id,
                'From'             => $assetHistory->date_from,
                'To'               => $assetHistory->date_to,
                'Assigned To'      => $assetHistory->assignedTo,
                'Action Performed' => $assetHistory->action_performed,
            ];
        });


        return($assetHistorys);
    }

    public function headings(): array
    {
        return [
            'Index',
            'From',
            'To',
            'Assigned To',
            'Action Performed',
        ];
    }

}
