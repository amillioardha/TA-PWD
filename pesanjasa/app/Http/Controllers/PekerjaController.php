<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PekerjaController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
        'nama_lengkap' => 'required',
        'bidang_kerja' => 'required',
        'jenis_kelamin' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
    ]);
    if ($validation->fails()) {
        $errors = $validation->errors();
        return [
            'status' => 'error',
            'message' => $errors,
            'result' => null
        ];
    }
    $result = \App\Pekerja::create($request->all());
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
    $result = \App\Pekerja::all();
    return[
        'status'=>'success',
        'message'=>'',
        'result'=>$result
    ];
}
public function update(Request $request,$id){
        $validation = Validator::make($request->all() ,[
            'nama_lengkap' => 'required',
            'bidang_kerja' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
        if($validation->fails()){
            $errors = $validation->errors();
            return[
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }
        $pekerja= \App\Pekerja::find($id);
        if(empty($pekerja)){
            return[
                'status' => 'error',
                'message' => 'Data Tidak Ditemukan',
                'result' => null
            ];
        }
        $result =  $pekerja->update($request->all());
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
    $pekerja = \App\Pekerja::find($id);
    if(empty($pekerja)){
        return[
            'status'=>'error',
            'message'=>'Data Tidak Ditemukan',
            'result'=>null
        ];
    }
    $result = $pekerja->delete($id);
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