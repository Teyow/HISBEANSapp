<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use App\Models\PunchCard;
use App\Models\UserVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class VoucherController extends Controller
{
    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }
    public function useVoucher()
    {
        return DB::table('vouchers')
            ->get();
    }

    public function getPunchCard(Request $request)
    {
        // return $request;
        $exist = DB::table('punch_cards')
            ->where("user_id", $request->user_id)
            ->first();
        if (!$exist) {
            PunchCard::create([
                'user_id' => $request->user_id,
                'punch_card_count' => 1
            ]);
        } else {
            DB::table('punch_cards')
                ->where('user_id', $request->user_id)
                ->update([
                    'punch_card_count' => (int)$exist->punch_card_count + 1
                ]);
        }
    }

    public function addUserVoucher(Request $request)
    {
        $exist = DB::table('vouchers')
            ->where('voucher_code', $request->voucher_code)
            ->first();
        if ($exist) {
            UserVoucher::create([
                'user_id' => $request->user_id,
                'voucher_id' => $exist->id,
                'is_available' => true,
            ]);
            return "true";
        } else {
            return 'false';
        }
    }

    public function getUserVouchers(Request $request)
    {
        return DB::table('user_vouchers')
            ->join('vouchers', 'vouchers.id', 'user_vouchers.voucher_id')
            ->where('user_vouchers.user_id', $request->user_id)
            ->get();
    }
}
