<?php

namespace App\Imports;

use Exception;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        try {
            foreach ($rows as $row) 
            {
                if(!(isset($row['nomor_induk']))) {
                    return false;
                }
    
                $user = User::create([
                    'nik_nis' => $row['nomor_induk'],
                    'password' => Hash::make('password'),
                    'role' => 'siswa'
                ]);
            
                Profile::create([
                    'nama' => $row['nama_siswa'],
                    'ttl' => $row['tempat_lahir'].', '.$row['tanggal_lahir'],
                    'alamat' => $row['alamat'],
                    'user_id' => $user->id
                ]);
            }
        } catch (Exception $e) {
            return view('error')->with('e', $e);
        }
    }

}
