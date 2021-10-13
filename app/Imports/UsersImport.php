<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id'     => $row['id'],
            'issuedDateIssue'     => $row['issuedDateIssue'],
            'dateDue'     => $row['dateDue'],
            'documentThat'     => $row['documentThat'],
            'tag'     => $row['tag'],
            'datajson'     => $row['datajson'],
            'name'     => $row['name'],
            'address'     => $row['address'],
            'totalItems'     => $row['totalItems'],
            'priceGoods'     => $row['priceGoods'],
            'vat'     => $row['vat'],
            'netTotal'     => $row['netTotal'],
            'status'     => $row['status'],
            'created_at'     => $row['created_at'],
            'updated_at'     => $row['updated_at'],
        ]);
    }
}
