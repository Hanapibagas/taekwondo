<?php

namespace App\Imports;

use App\Models\Wasit;
use Maatwebsite\Excel\Concerns\ToModel;

class WasitsImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Wasit([
      'nama' => $row[0],
      'status_wasit' => $row[1],
      'kelas' => $row[2],
      'dan' => $row[3],
      'pwn' => $row[4],
      'dwn' => $row[5],
      'pwd' => $row[6],
      'dwd' => $row[7],
    ]);
  }
}
