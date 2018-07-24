<?php

namespace App\Http\Controllers;

use App\Slot_info;
use App\prize_list;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IWantJoinController extends Controller
{
    //
    public function index(Request $req)
    {
        $client_name = $req->session()->get('client_name');
        $client_email = $req->session()->get('email');

        $now = date('Y-m-d');
        $get_play_count = DB::table('slot_infos')->where('email', $client_email)->where('playdate', $now)->count();
        $get_gogoro = DB::table('slot_infos')->where('email', $client_email)->where('playdate', $now)->where('prize','555')->count();

        $play_count;
        //如果DB內次數=0 表示這人還沒玩過
        //如果DB內次數在0~9之間 表示這人還能玩
        //如果DB內次數大於=9表示這人今天不能玩了
        if ($get_play_count == 0 && $get_gogoro ==0) {
            $play_count = 9;
        } else if ($get_play_count > 0 && $get_play_count < 9 && $get_gogoro ==0) {
            $play_count = 9 - $get_play_count;
        } else {
            $play_count = 0;
            return view('IWantJoin2', ['client_name' => $client_name, 'client_email' => $client_email]);
        }


        //===========================
        //亂數產生 0~9999 以隨機產生的數值範圍指定獎品
        $prize0 = rand(0, 9999);
        $prize = (int) $prize0;
        //用$prize 出現的值來設定機率 ， 底數為10000 ，如果$prize會出現1、2、3 那麼機率就是0.03%
        if ($prize > 0 && $prize < 3) {
            //震旦商品抵用卷100元
            $prize_arr0 = 0;
            $prize_arr1 = 0;
            $prize_arr2 = 0;
        } else if ($prize > 3 && $prize < 8) {
            //震旦通訊時
            $prize_arr0 = 1;
            $prize_arr1 = 1;
            $prize_arr2 = 1;
        } else if ($prize > 8 && $prize < 11) {
            //毛巾蛋糕
            $prize_arr0 = 2;
            $prize_arr1 = 2;
            $prize_arr2 = 2;
        } else if ($prize > 11 && $prize < 16) {
            //馬鈴薯脆條
            $prize_arr0 = 3;
            $prize_arr1 = 3;
            $prize_arr2 = 3;
        } else if ($prize > 16 && $prize < 19) {
            //瑞士刀USB
            $prize_arr0 = 4;
            $prize_arr1 = 4;
            $prize_arr2 = 4;
        } else if ($prize > 19 && $prize < 33) {
            //Gogoro
            $prize_arr0 = 5;
            $prize_arr1 = 5;
            $prize_arr2 = 5;
        } else {
            //沒中獎的讓拉霸畫面不要出現連線
            if ($prize > 0 && $prize < 3334) {
                $prize_arr0 = 0;
                $prize_arr1 = 1;
                $prize_arr2 = 2;
            } else if ($prize > 3333 && $prize < 5667) {
                $prize_arr0 = 4;
                $prize_arr1 = 5;
                $prize_arr2 = 0;
            }else if ($prize > 5666 && $prize < 8667) {
                $prize_arr0 = 0;
                $prize_arr1 = 0;
                $prize_arr2 = 4;
            }
             else {
                $prize_arr0 = 3;
                $prize_arr1 = 5;
                $prize_arr2 = 2;
            }
        }

        // $prize_arr = str_split($prize, 1);
        //儲存抽獎的日期
        $nowDate = date('Y-m-d');
        
        $prize_ar = $prize_arr0.$prize_arr1.$prize_arr2;

        $play = new Slot_info([
            'email' => $client_email,
            'name' => $client_name,
            'playdate' => $nowDate,
            'prize' => $prize_ar,
        ]);
        $play->save();
        
        //如果中獎，將獎品Table中的獎品押上此人的資訊
        if($prize_arr0 == $prize_arr1 && $prize_arr1 == $prize_arr2){
            $firstdata ="";
            if($prize_arr0 == 0){
                $firstdata = DB::table('prize_lists')->select('id')->where('prize_name', '震旦通訊時尚袋')->where('win_name', '')->first();
                $store_info = prize_list::find($firstdata->id);
                $store_info->win_name = $client_name;
                $store_info->win_email = $client_email;
                $store_info->win_date = $nowDate;
                $store_info->save();
            }
            else if($prize_arr0 == 1){
                $firstdata = DB::table('prize_lists')->select('id')->where('prize_name', '震旦商品抵用卷100元')->where('win_name', '')->first();
                //取得獎品編號 $firstdata[0]->id;
                $store_info = prize_list::find($firstdata->id);
                $store_info->win_name = $client_name;
                $store_info->win_email = $client_email;
                $store_info->win_date = $nowDate;
                $store_info->save();
            }
            else if($prize_arr0 == 2){
                $firstdata = DB::table('prize_lists')->select('id')->where('prize_name', '毛巾蛋糕')->where('win_name', '')->first();
                //取得獎品編號 $firstdata[0]->id;
                $store_info = prize_list::find($firstdata->id);
                $store_info->win_name = $client_name;
                $store_info->win_email = $client_email;
                $store_info->win_date = $nowDate;
                $store_info->save();
            }
            else if($prize_arr0 == 3){
                $firstdata = DB::table('prize_lists')->select('id')->where('prize_name', '馬鈴薯脆條')->where('win_name', '')->first();
                //取得獎品編號 $firstdata[0]->id;
                $store_info = prize_list::find($firstdata->id);
                $store_info->win_name = $client_name;
                $store_info->win_email = $client_email;
                $store_info->win_date = $nowDate;
                $store_info->save();
            }
            else if($prize_arr0 == 4){
                $firstdata = DB::table('prize_lists')->select('id')->where('prize_name', '瑞士刀USB')->where('win_name', '')->first();
                //取得獎品編號 $firstdata[0]->id;
                $store_info = prize_list::find($firstdata->id);
                $store_info->win_name = $client_name;
                $store_info->win_email = $client_email;
                $store_info->win_date = $nowDate;
                $store_info->save();
            }
            else if($prize_arr0 == 5){
                $firstdata = DB::table('prize_lists')->select('id')->where('prize_name', 'Gogoro')->where('win_name', '')->first();
                //取得獎品編號 $firstdata[0]->id;
                $store_info = prize_list::find($firstdata->id);
                $store_info->win_name = $client_name;
                $store_info->win_email = $client_email;
                $store_info->win_date = $nowDate;
                $store_info->save();
            }

            return view('IWantJoin', ['client_name' => $client_name, 'client_email' => $client_email, 'play_count' => $play_count, 'prize_arr0' => $prize_arr0, 'prize_arr1' => $prize_arr1, 'prize_arr2' => $prize_arr2, 'prize' => $prize,'prize_id'=>$firstdata->id]);

        }else{
            $firstdata = 0;
            return view('IWantJoin', ['client_name' => $client_name, 'client_email' => $client_email, 'play_count' => $play_count, 'prize_arr0' => $prize_arr0, 'prize_arr1' => $prize_arr1, 'prize_arr2' => $prize_arr2, 'prize' => $prize,'prize_id'=>$firstdata]);
        }
    }

    public function store_result(Request $req){
        $nowDate = date('Y-m-d');
        $client_email = $req->client_email;
        $client_name = $req->client_name;


    }

}
