@extends('layouts.app2') @section('content')
<h1 style="background-color:#00a2ff">我要參加頁面</h1>

<div class="cover">
    <div class="row" style="height:180px;margin: 0px;"></div>
    <div class="row" style="text-align:center;margin: 0px">
        <p id="prize-text" style="width: 100%;    font-size: 30px;"></p>
    </div>
    <p id="invisible">{{$prize_id}}</p>
    <div class="row" style="margin: 0px">
            <div class="col-sm-4"></div>

        <div class="col-sm-1">
            <a href="{{url('IWantJoin')}}">
                <div class="btn-continue">
                    <p> 繼續遊戲 </p>
                </div>
            </a>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-1">
            <a href="{{url('/')}}">
                <div class="btn-tomorrow">
                    <p> 明日繼續 </p>
                </div>
            </a>
        </div>
        <div class="col-sm-4"></div>
    </div>

{{-- 抽中狗肉 --}}
    <div class="row" style="margin: 0px" id="gogo">
            <div class="col-sm-4"></div>

        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <a class="btn btn-fb bouton-image monBouton" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftw.yahoo.com" target="_blank">SHARE</a>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-4"></div>
    </div>
</div>
<div style="display:none">
        <p style="display:none">
                <p id="client_name" style="display:none">{{ $client_name }} </p>你好!!
            </p>
            <p style="display:none">您的Email :
                <p id="client_email" style="display:none">{{$client_email}}</p> 
                認證成功! 讓我們開始玩糞GAME吧
            </p>
</div>

{{ csrf_field() }}
<hr> {{-- 拉霸機=========== 開始--}}
<link rel="stylesheet" href="./jquery_slot/styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="./jquery_slot/dist/jquery.slotmachine.css" type="text/css" media="screen" />
<script src="./jquery_slot/dist/slotmachine.js"></script>
<script src="./jquery_slot/dist/jquery.slotmachine.js"></script>


<div id="casino" style="padding-top:0px;">
    <div class="content" style="height:800px">
        <h1 style="height:57px"></h1>
        <h1 id="playcount" style="display:none">{{$play_count}}</h1>

        <div>
            <div id="casino1" class="slotMachine" style="margin-left: -34px;margin-top:20px">
                <div class="slot slot1"></div>
                <div class="slot slot2"></div>
                <div class="slot slot3"></div>
                <div class="slot slot4"></div>
                <div class="slot slot5"></div>
                <div class="slot slot6"></div>
            </div>

            <div id="casino2" class="slotMachine" style="margin-left: 14px;">
                <div class="slot slot1"></div>
                <div class="slot slot2"></div>
                <div class="slot slot3"></div>
                <div class="slot slot4"></div>
                <div class="slot slot5"></div>
                <div class="slot slot6"></div>
            </div>

            <div id="casino3" class="slotMachine" style="margin-left: 5px;">
                <div class="slot slot1"></div>
                <div class="slot slot2"></div>
                <div class="slot slot3"></div>
                <div class="slot slot4"></div>
                <div class="slot slot5"></div>
                <div class="slot slot6"></div>
            </div>

            <div class="btn-group btn-group-justified" role="group">
                <button id="casinoShuffle" type="button" class="btn btn-primary btn-lg">開始!</button>
                <button id="casinoStop" type="button" class="btn btn-primary btn-lg">停止!</button>
            </div>

        </div>
    </div>

</div>
{{-- 拉霸機的邏輯script --}}
<script>
    console.log({{$prize}});
    console.log({{$prize_arr0}});
    console.log({{$prize_arr1}});
    console.log({{$prize_arr2}});


    var prize_arr0 = {{$prize_arr0}};
    var prize_arr1 = {{$prize_arr1}};
    var prize_arr2 = {{$prize_arr2}};

</script>

<script src="./js/slot.js"></script>
{{-- 拉霸機=========== 結束--}} @endsection