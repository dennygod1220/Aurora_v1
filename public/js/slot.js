

$(function () {

    var client_name = $("#client_name").text();
    var client_email = $("#client_email").text();

    var token = $("input[name='_token']").val();

let count = 0;
const btnShuffle = document.querySelector('#casinoShuffle');
const btnStop = document.querySelector('#casinoStop');
const casino1 = document.querySelector('#casino1');
const casino2 = document.querySelector('#casino2');
const casino3 = document.querySelector('#casino3');
const mCasino1 = new SlotMachine(casino1, {
    active: 5,
    delay: 500,
    //指定停止時顯示的東西要是拉霸中的哪個，像陣列一樣從index 0 開始
    randomize: function (activeElementIndex) {
        return prize_arr0;
    },
});
const mCasino2 = new SlotMachine(casino2, {
    active: 5,
    delay: 1000,
    randomize: function (activeElementIndex) {
        return prize_arr1;
    }
});
const mCasino3 = new SlotMachine(casino3, {
    active: 5,
    delay: 1500,
    randomize: function (activeElementIndex) {
        return prize_arr2;
    }
});
btnShuffle.addEventListener('click', () => {
    count = 3;
    mCasino1.shuffle(9999);
    mCasino2.shuffle(9999);
    mCasino3.shuffle(9999);
});

btnStop.addEventListener('click', () => {
    
    mCasino1.stop();
    setTimeout(() => {
        mCasino2.stop();
    }, 1000);
    setTimeout(() => {
        mCasino3.stop(() => {
            $(".cover").css({'background-color':'rgba(100,100,100,0.8)','z-index':'999999',"position": "absolute","height": "100%","width": "100%"});
            //如果拉霸機有連線
            if( (prize_arr0 == prize_arr1) && (prize_arr2 == prize_arr0) ){
                if(prize_arr0 == 0){
                    $("#prize-text").text("恭喜你獲得震旦商品抵用卷100元獎，編號"+$("#invisible").text()+"，請至震旦門市領獎！今日你還有"+$("#playcount").text()+"次機會！");
                    $(".btn-continue").show();
                    $(".btn-tomorrow").show();
                }
                else if(prize_arr0 == 1){
                    $("#prize-text").text("恭喜你獲得震旦通訊時尚袋獎，編號"+$("#invisible").text()+"，請至震旦門市領獎！今日你還有"+$("#playcount").text()+"次機會！");
                    $(".btn-continue").show();
                    $(".btn-tomorrow").show();
                }
                else if(prize_arr0 == 2){
                    $("#prize-text").text("恭喜你獲得毛巾蛋糕獎，編號"+$("#invisible").text()+"，請至震旦門市領獎！今日你還有"+$("#playcount").text()+"次機會！");
                    $(".btn-continue").show();
                    $(".btn-tomorrow").show();
                }
                else if(prize_arr0 == 3){
                    $("#prize-text").text("恭喜你獲得馬鈴薯脆條獎，編號"+$("#invisible").text()+"，請至震旦門市領獎！今日你還有"+$("#playcount").text()+"次機會！");
                    $(".btn-continue").show();
                    $(".btn-tomorrow").show();
                }
                else if(prize_arr0 == 4){
                    $("#prize-text").text("恭喜你獲得瑞士刀USB獎，編號"+$("#invisible").text()+"，請至震旦門市領獎！今日你還有"+$("#playcount").text()+"次機會！");
                    $(".btn-continue").show();
                    $(".btn-tomorrow").show();
                }
                else if(prize_arr0 == 5){
                    $("#prize-text").text("曙光抽獎編號 -"+$("#invisible").text()+"，想換一台潮流電動機車嗎?快分享 並加上下列標籤 #震旦通訊生日快樂 #拉霸抽大獎 就可參加抽獎唷!");
                    // $(".btn-continue").show();
                    // $(".btn-tomorrow").show();
                    $("#gogo").show();
                }
                //沒有中獎
            }else{
                $("#prize-text").text("再接再厲，今天你還有"+$("#playcount").text()+"次機會！");
                $(".btn-continue").show();   
                $(".btn-tomorrow").show();
            }
        });
    }, 2500);
});

});
