<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function useVoucher()
    {
        return DB::table('vouchers')
            ->get();
    }
}
