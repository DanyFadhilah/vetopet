<?php

namespace App\Imports;

use App\{Siswa, User};
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\{Validator, Hash};
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentImport implements ToCollection, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required|unique:siswa,nis,',
            '*.1' => 'required|unique:siswa,nisn,',
            '*.2' => 'required|min:2|max:150',
            '*.3' => 'required|min:5|max:150',
            '*.4' => 'required|min:5|max:150',
            '*.5' => 'required|min:5|max:150',
            '*.6' => 'required|min:5|max:150',
            '*.7' => 'required|unique:siswa,no_hp,',
            '*.8' => 'required',
            '*.9' => 'required',
            '*.10' => 'required',
            '*.11' => 'required',
            '*.12' => 'required',            
            '*.13' => 'required',            
            '*.14' => 'required',            
            '*.15' => 'required',            
            '*.16' => 'required',            
            '*.17' => 'required',            
            '*.18' => 'required',            
            '*.19' => 'nullable|unique:siswa,nohp_rumah,',
            '*.20' => 'required',            
            '*.21' => 'required',
            '*.22' => 'nullable',            
            '*.23' => 'nullable',
            '*.24' => 'nullable|unique:siswa,nohp_wali,',
            '*.25' => 'nullable',
            '*.26' => 'required|unique:users,email,',
            '*.27' => 'required|min:8|max:150',
        ])->validate();

        foreach ($rows as $key => $row)
        {
            if ($row[2] && $row[26]) {
                if ($key >= 1) {
                    $user = User::create([
                        'name'     => $row[2],
                        'roles'    => 'SISWA',
                        'email'    => $row[26],
                        'password' => Hash::make($row[27]),
                    ]);
                }
            }

            if ($row[0] && $row[1] && $row[2]) {
                if ($key >= 1) {
                    Siswa::create([
                        'user_id'       => $user->id,
                        'nis'           => $row[0],
                        'nisn'          => $row[1],
                        'nama'          => $row[2],
                        'alamat_1'      => $row[3],
                        'alamat_2'      => $row[4],
                        'provinsi'      => $row[5],
                        'kabkota'       => $row[6],
                        'no_hp'         => $row[7],
                        'tempat_lahir'  => $row[8],
                        'tanggal_lahir' => $row[9],
                        'jenis_kelamin' => $row[10],
                        'agama'         => $row[11],
                        'status_dalam_keluarga' => $row[12],
                        'anak_ke'          => $row[13],
                        'diterima_dikelas' => $row[14],
                        'pada_tanggal'     => $row[15],
                        'nama_ayah'        => $row[16],
                        'nama_ibu'         => $row[17],
                        'alamat_ortu'      => $row[18],
                        'nohp_rumah'       => $row[19],
                        'pekerjaan_ayah'   => $row[20],
                        'pekerjaan_ibu'    => $row[21],
                        'nama_wali'        => $row[22],
                        'alamat_wali'      => $row[23],
                        'nohp_wali'        => $row[24],
                        'pekerjaan_wali'   => $row[25],
                        'profile'          => NULL,
                    ]);
                }
            }
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
