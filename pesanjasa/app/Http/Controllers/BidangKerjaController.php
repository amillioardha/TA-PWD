<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BidangKerjaController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
        'nama_kerja' => 'required',
        'jenis_kerja' => 'required',
        'tarif' => 'required', 
    ]);
    if ($validation->fails()) {
        $errors = $validation->errors();
        return [
            'status' => 'error',
            'message' => $errors,
            'result' => null
        ];
    }
    $result = \App\BidangKerja::create($request->all());
    if ($result) {
        return [
            'status' => 'success',
            'message' => 'Data Berhasil ditambahkan',
            'result' => $result
        ];
    }
    else {
        return [
            'status' => 'error',
            'message' => 'Data Gagal ditambahkan',
            'result' => null
        ];
    }
}
public function read(Request $request){
    $result = \App\BidangKerja::all();
    return[
        'status'=>'success',
        'message'=>'',
        'result'=>$result
    ];
}
public function update(Request $request,$id){
        $validation = Validator::make($request->all() ,[
        'nama_kerja' => 'required',
        'jenis_kerja' => 'required',
        'tarif' => 'required', 
        ]);
        if($validation->fails()){
            $errors = $validation->errors();
            return[
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }
        $bidangkerja= \App\BidangKerja::find($id);
        if(empty($bidangkerja)){
            return[
                'status' => 'error',
                'message' => 'Data Tidak Ditemukan',
                'result' => null
            ];
        }
        $result =  $bidangkerja->update($request->all());
        if($result){
            return[
                'status' => 'success',
                'message' => 'Data Berhasil Diubah',
                'result' => $result
            ];
        }else{
            return[
                'status' => 'error',
                'message' => 'Data gagal Diubah',
                'result' => null
            ];
        }
}
public function delete(Request $request,$id){
    $bidangkerja = \App\BidangKerja::find($id);
    if(empty($bidangkerja)){
        return[
            'status'=>'error',
            'message'=>'Data Tidak Ditemukan',
            'result'=>null
        ];
    }
    $result = $bidangkerja->delete($id);
    if($result){
        return[
            'status'=>'success',
            'message'=>'Data Berhasil Dihapus',
            'result'=>$result
        ];
    }else{
        return[
            'status'=>'error',
            'message'=>'Data gagal Dihapus',
            'result'=>null
        ];
    }
}
}
?>