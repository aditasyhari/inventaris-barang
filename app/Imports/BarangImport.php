<?php

namespace App\Imports;

use App\Models\Barang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        try {
            foreach ($rows as $row) 
            {
                if(!(isset($row['uraian_barang']))) {
                    return false;
                }
            
                Barang::create([
                    'kode_bidang' => $row['kode_bidang'],
                    'nama' => $row['uraian_barang'],
                    'merk' => $row['merk'],
                    'jumlah' => $row['jumlah'],
                    'tersedia' => $row['jumlah'],
                    'kondisi' => $row['kondisi'],
                ]);
            }
        } catch (Exception $e) {
            return view('error')->with('e', $e);
        }
    }
}
