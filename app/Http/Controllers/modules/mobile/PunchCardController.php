<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use App\Models\PunchCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PunchCardController extends Controller
{
    public function getUserPunchCard($id)
    {
        return DB::table('punch_cards')
            ->where('user_id', $id)
            ->get();
    }
}
