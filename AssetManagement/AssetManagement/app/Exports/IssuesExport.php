<?php

namespace App\Exports;

use App\Models\Issues;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IssuesExport implements FromCollection, WithHeadings
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
        $issues = null;

        if($this->clickedLabel==null){
            $issues = Issues::where('delete_flag','=',0)->get();
        }
        else{
            if($this->clickedLabel=="Resolved"){
                $issues = Issues::where('delete_flag','=',0)->where('status','=',0)->get(); 
            }
            else{
                $issues = Issues::where('delete_flag','=',0)->where('status','!=',0)->get();
            }
        }

        $issues->each(function ($issue, $index) {
            $issue->custom_id = $index + 1;

            $issue->asset_type  = DB::table('assets')->where('id',$issue->asset_id)->value('asset_type');

            $issue->asset_id    = DB::table('assets')->where('id',$issue->asset_id)->value('asset_id');
        });

        $issues->transform(function ($issue) {
            if($issue->status==0){
                $issue->status = 'RESOLVED';
            }
            else if($issue->status==1){
                $issue->status = 'PENDING';
            }
            else if($issue->status==2){
                $issue->status = 'UNRESOLVED';
            }

            if($issue->resolvedBy==null){
                $issue->resolvedBy = 'Still Pending';
            }

            if($issue->end_date==null){
                $issue->end_date = 'Still Pending';
            }

            if($issue->priority==0){
                $issue->priority='LOW';
            }
            else if($issue->priority==1){
                $issue->priority= 'MEDIUM';
            }
            else if($issue->priority==2){
                $issue->priority= 'HIGH';
            }

            return $issue;
        });

        $issues = $issues->map(function ($issue) {
            return [
                'Id'                => $issue->custom_id,
                'Asset Type'        => $issue->asset_type,
                'Asset Id'          => $issue->asset_id,
                'Description'       => $issue->description,
                'Issue Raised By'   => $issue->raisedby,
                'Issue Raised At'   => $issue->start_date,
                'Issue Resolved On' => $issue->end_date,
                'Priority'          => $issue->priority,
                'Status'            => $issue->status,
                'Resolved By'       => $issue->resolvedBy,
                'Remarks'           => $issue->remarks,
            ];
        });

        return $issues;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Asset Type',
            'Asset Id',
            'Description',
            'Issue Raised By',
            'Issue Raised At',
            'Issue Resolved On',
            'Priority',
            'Status',
            'Resolved By',
            'Remarks',
        ];
    }

}
