<?php

namespace App\Imports;

use App\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class PelangganImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $email = Pelanggan::where('email', 'ray.yustian@gmail.com')->get();

        // echo $email;
        // echo empty($email);
        foreach($row as $value) {
            $email = Pelanggan::where('email', $row['email'])->get();

            // echo $email->isEmpty();
            if ($email->isEmpty()) {
                return new Pelanggan([
                    'nama'  => $row['nama'],
                    'alamat' => $row['alamat'],
                    'kontak' => $row['kontak'],
                    'tanggal_lahir' => $row['tanggal_lahir'],
                    'email' => $row['email'],
                    'identitas' => $row['identitas'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'pekerjaan' => $row['pekerjaan'],
                ]);
            }
        }
    }
}
