<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\{Validator, Hash};
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductImport implements ToCollection, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required|min:2|max:150',
            '*.1' => 'required|min:2|max:150',
            '*.2' => 'required|min:2|max:150',
            '*.3' => 'required|min:2|max:150',
            '*.4' => 'required|min:5|max:150',
            '*.5' => 'required|min:5|max:150',
        ])->validate();

        foreach ($rows as $key => $row)
        {
            if ($row[0] && $row[1] && $row[2] && $row[3] && $row[8]) {
                if ($key >= 1) {
                    Product::create([
                        'nama_produk'     => $row[0],
                        'harga'           => $row[1],
                        'category_id'     => $row[2],
                        'typeanimal_id'   => $row[3],
                        'stok'            => $row[4],
                        'berat'           => $row[5],
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