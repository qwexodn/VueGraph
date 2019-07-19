<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiotAPIController extends Controller
{
    private const APPKEY = 'RGAPI-5f170905-6cb5-4896-b32e-3fb1ca2b785f';

    /**
     * 유저 네임으로 다른 API에 사용할 유저 정보 가져오기
     */
    function userInfoGet($userName){
        $url = 'https://kr.api.riotgames.com/lol/summoner/v4/summoners/by-name/'.urlencode($userName).'?api_key='.self::APPKEY;

        $ch = curl_init();
        $curlOption = [
            CURLOPT_URL             => $url,
            CURLOPT_SSL_VERIFYPEER  => false,
            CURLOPT_RETURNTRANSFER  => 1,
        ];

        curl_setopt_array($ch, $curlOption);

        $res = curl_exec($ch);
        // echo curl_error($ch);
        curl_close($ch);

        return json_decode($res, 1);
    }
    
    /**
     * 유저 전적가져오기
     * @param request [startIndex, endIndex, userName]
     */
    function userSearch(Request $request){
        $startIndex = $request->input('startIndex');
        $endIndex = $request->input('endIndex');

        if(!$endIndex && !$startIndex){
            $startIndex = 0;
            $endIndex = 20;
        }

        $userInfo = self::userInfoGet($request->input('userName'));
        
        print_r($userInfo);

        $ch = curl_init();

        // 게임에 대한 정보 가져오기 (세부X)
        // $url = 'https://kr.api.riotgames.com/lol/match/v4/matchlists/by-account/'.$userInfo['accountId'].'?';
        // $params = 'endIndex='.$endIndex.'&beginIndex='.$startIndex.'&api_key='.self::APPKEY;
        // $curlOption = [
        //     CURLOPT_URL => $url.$params,
        //     CURLOPT_SSL_VERIFYPEER => false,
        //     CURLOPT_RETURNTRANSFER => true,
        // ];

        // curl_setopt_array($ch, $curlOption);

        // $res = curl_exec($ch);
        // curl_close($ch);

        // $gameres = json_decode($res);

        // $mh = curl_multi_init();

        // //게임 전적 세부 정보 가져오기
        // $returnData = [];
        // foreach($gameres->matches as $k => $game){
        //     $returnData[$k] = $game;

        //     $url = 'https://kr.api.riotgames.com/lol/match/v4/matches/'.$game->gameId.'?api_key='.self::APPKEY;

        //     $ch_arr[$k] = curl_init();
            
        //     $curlOption = [
        //         CURLOPT_URL => $url,
        //         CURLOPT_SSL_VERIFYPEER => false,
        //         CURLOPT_RETURNTRANSFER => true,
        //     ];

        //     curl_setopt_array($ch_arr[$k], $curlOption);
        //     curl_multi_add_handle($mh, $ch_arr[$k]);
        // }

        // do{
        //     $status = curl_multi_exec($mh, $active);

        //     if($active){
        //         curl_multi_select($mh);
        //     }
        // }while($active && $status == CURLM_OK);
        

        // for($i=0; $i<20; $i++){
        //     $tmpres = curl_multi_getcontent($ch_arr[$i]);
        //     curl_multi_remove_handle($mh, $ch_arr[$i]);

        //     $returnData[$i]->detail = $tmpres;
        // }
        // curl_multi_close($mh);
        
        
        // echo '<xmp>';
        // print_r($returnData);
        // echo '</xmp>';
    }
}
