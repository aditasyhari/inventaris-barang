<?php

namespace App\Imports;

use Exception;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        try {
            foreach ($rows as $row) 
            {
                if(!(isset($row['nama']))) {
                    return false;
                }

                $nip = $row['nip'];

                if($row['nip'] == '-' || $row['nip'] == '') {
                    $nip = rand(11022033,99088077);
                }
    
                $user = User::create([
                    'nik_nis' => $nip,
                    'password' => Hash::make('password'),
                    'role' => 'guru'
                ]);
            
                Profile::create([
                    'nama' => $row['nama'],
                    'ttl' => $row['tempat_tgl_lahir'],
                    'agama' => $row['agama'],
                    'pendidikan_th_lulus' => $row['pendidikan_th_lulus'],
                    'gol' => $row['gol_atau_ruang'],
                    'tmt' => $row['tmt'],
                    'mengajar' => $row['mengajar'],
                    'jml_jam' => $row['jml_jam'],
                    'user_id' => $user->id
                ]);
            }
        } catch (Exception $e) {
            return view('error')->with('e', $e);
        }
    }
}
