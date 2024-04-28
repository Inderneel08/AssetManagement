<?php

namespace App\Exports;

use App\Models\Issues;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IssueExportForEachUser implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $username   = Session::get("username");

        $collection = DB::table('assets')->join('issues','assets.id','=','issues.asset_id')->where('raisedby',$username)->where('issues.delete_flag','=',0)->where('assets.delete_flag','=',0)->get();

        $collection->each(function ($eachCollection, $index) {
            $eachCollection->custom_id = $index + 1;
        });

        $collection->transform(function ($eachCollection) {
            if($eachCollection->status==0){
                $eachCollection->status = 'RESOLVED';
            }
            else if($eachCollection->status==1){
                $eachCollection->status = 'PENDING';
            }
            else if($eachCollection->status==2){
                $eachCollection->status = 'UNRESOLVED';
            }

            if($eachCollection->priority==0){
                $eachCollection->priority = 'LOW';
            }
            elseif($eachCollection->priority==1){
                $eachCollection->priority = 'MEDIUM';
            }
            else if($eachCollection->priority==2){
                $eachCollection->priority = 'HIGH';
            }


            return($eachCollection);
        });

        $collection = $collection->map(function ($eachCollection) {
            return [
                'Id'               => $eachCollection->custom_id,
                'Description'      => $eachCollection->description,
                'Asset Type'       => $eachCollection->asset_type,
                'Remarks'          => $eachCollection->remarks,
                'Status'           => $eachCollection->status,
                'Priority'         => $eachCollection->priority
            ];
        });

        return($collection);
    }

    public function headings(): array
    {
        return [
            'Id',
            'Description',
            'Asset Type',
            'Remarks',
            'Status',
            'Priority',
        ];
    }

}
