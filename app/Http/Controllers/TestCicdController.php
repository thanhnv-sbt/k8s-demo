<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // Lỗi: Thiếu dòng trống sau namespace

class TestCicdController extends Controller { // Lỗi: Dấu ngoặc nhọn phải nằm ở dòng dưới

public function index()
{
$a = 1; // Lỗi: Không thụt lề (Indentation)
        $b=2; // Lỗi: Viết dính lền, thiếu khoảng trắng quanh dấu bằng
    if($a<$b){ // Lỗi: Thiếu khoảng trắng sau 'if' và quanh dấu '<'
return response()->json(['message'=>'Lỗi format rồi!']); // Lỗi: Thiếu khoảng trắng trong mảng
    }

      return view('welcome' ); // Lỗi: Thừa khoảng trắng trước dấu đóng ngoặc
}

    // Lỗi: Hàm này không làm gì và sai format hoàn toàn
    public function   bad_format   ( )
    {
$test = "Check CI" ;
        return $test;
    }
}
