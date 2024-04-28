<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::where('delete_flag','=',0)->get(); 

        $users->each(function ($user, $index) {
            $user->custom_id = $index + 1;
        });

        $users->transform(function ($user) {
            if($user->status==1){
                $user->status = 'ACTIVE';
            }
            else{
                $user->status = 'INACTIVE';
            }

            return($user);
        });

        $users = $users->map(function ($user) {
            return [
                'Id'               => $user->custom_id,
                'Username'         => $user->username,
                'Email'            => $user->email,
                'Role'             => $user->role,
                'Status'           => $user->status,
                'Designation'      => $user->designation,
            ];
        });

        return $users;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Username',
            'Email',
            'Role',
            'Status',
            'Designation',
        ];
    }

}
