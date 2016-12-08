<?=$temp['header_up']?>
<?=$temp['header_down']?>
<script src="js/tool/smooth_scrollerator.js"></script>
<script>


  Temp.ready(function(){
  var window_height = $(window).height();
  var window_width = $(window).width();

  //滑到指定區塊執行動畫
    $(document).scroll(function(){
      var scroll_top = $(document).scrollTop();
      var scroll_top_height = scroll_top + $(window).height() * 2 ;
      // var content4_top = $('.town_bg').offset().top;
      // var content4_top_height_all = $('.town_bg').height();
      console.log(scroll_top);

      var window_width = $(window).width();
      var scroll_top = $(document).scrollTop();
      console.log(scroll_top);
      //1366版本
      if(window_width >= 1025 && window_width <= 1500){
        if(scroll_top == 0){
        }
        else if(scroll_top > 0 && scroll_top < 800){
        }
        else if(scroll_top > 800 && scroll_top < 1100){
          $('.content2').addClass('hover');
        }
        else if(scroll_top > 1100 && scroll_top < 1700){
        }
        else if(scroll_top > 1700 && scroll_top < 2700){
        }
        else if(scroll_top > 2700 && scroll_top < 3000){
        }
        else if(scroll_top > 3000 && scroll_top < 5000){
        }
      }
    });

    var options1 = {
    id: 'fadein'
    };
    $('.fadein').initReveal(options1);
});
</script>
<!-- <body> -->
  <!-- content01區塊 -->
  <div class="content01" id="content01">
    	<div class="colorbg" >
    		<img src="img/index/content01/content01_bg.jpg"></div>
      <div class="blackbg" >
        <img src="img/index/content01/content01_blackbg.jpg"></div>
      <div class="people" >
          <!-- <div class="pic"> -->
            <img src="img/index/content01/bigman01.png" class="one">
            <img src="img/index/content01/suitman01.png" class="two">
            <img src="img/index/content01/sitman01.png" class="three">
            <img src="img/index/content01/shirtman01.png" class="four">
            <img src="img/index/content01/woman01.png" class="five">
          <!-- </div>  -->
      </div>
      <div class="centerbox">
        <div class="title">
          <img src="img/index/content01/M.png" class="one">
          <h1 class="fadein">型社會變成</h1>
          <img src="img/index/content01/L.png" class="two">
          <h1>型社會</h1>
        </div>  
          <div class="wordbox">
            <div class="text one">
              <p>你</p><p>&nbsp</p><p>依</p><p>然</p><p>是</p><p>金</p><p>錢</p>
            <p>制</p><p>度</p><p>下</p></br>
           </div>
            <div class="text two">
              <p>無</p><p>法</p><p>翻</p><p>身</p><p>的</p><p>那</p><p>群</p>
              <p>人</p><p>嗎?</p>
            </div>
          </div>
      </div>
  <!-- headerbar -->
      <div class="header_center">
        <img src="img/index/content01/header_left.png" class="left">
        <img src="img/index/content01/header_right.png" class="right">
        <div class="nav">
          <a href="#content01" class="li left">
            <p>從這開始</p>
          </a>
          <a href="#content03" class="li left">
            <p>夢想實踐</p>
          </a>
          <a href="#content03" class="li right">
            <p>改變自我</p>
          </a>
          <a href="#content05" class="li right">
            <p>立即參加</p>
          </a>
        </div>
      </div>
  </div>
  <!-- content02 -->
  <div class="content02" id="content02">
    <div class="first">
      <div class="moneybg one">
          <img src="img/index/content02/content02_bg1.png"></div>  
      <div class="money">
        <div class="left front">
          <img src="img/index/content02/left_money_big.png"></div>
        <div class="right front">
         <img src="img/index/content02/rgiht_money_big.png"></div>
        <div class="centerbox">
          <div class="wordbox">
            <p class="one">想要投資賺錢，卻不知道如何</p>
            <p class="two">踏出第一步?</p>
            <p class="three">你&nbsp是否犯了以下</p>  
            <p class="four">投資大忌?</p>
          </div>
        </div>
      </div>
  </div>
    <div class="second">
      <div class="moneybg two">
        <img src="img/index/content02/content02_bg2.png"></div>   
        <div class="wordbox">
          <div class="item one">
              <div class="left"><p class="text-left">策</p></div>
              <div class="right"><p class="text-right">策略僵化</p></div>   
            <img src="img/index/content02/item_black.png">
          </div>
          <div class="item two">
              <div class="left"><p class="text-left">虧</p></div>
              <div class="right"><p class="text-right">害怕虧損</p></div>     
            <img src="img/index/content02/item_red.png">
          </div> 
          <div class="item three">
              <div class="left"><p class="text-left">情</p></div>
              <div class="right"><p class="text-right">情緒操作</p></div>      
            <img src="img/index/content02/item_black.png">
          </div>  
          <div class="item four">
              <div class="left"><p class="text-left">市</p></div>
              <div class="right"><p class="text-right">誤判市場</p></div>      
            <img src="img/index/content02/item_red.png">
          </div> 
          <div class="item five">
              <div class="left"><p class="text-left">運</p></div>
              <div class="right"><p class="text-right">只靠運氣</p></div>     
            <img src="img/index/content02/item_black.png">
          </div> 
        </div>
    </div>
    <div class="middlebar">
      <img src="img/index/content02/middle_bar.png">
      <div class="title">
        <span>
          人人都享有致富&nbsp與&nbsp實踐夢想的權利
        </span>
      </div>
    </div>
</div>
<!-- content03 -->  
  <div class="content03" id="content03">
    <div class="rightbox">
      <img src="img/index/content03/triangle_one.png" class="triangle one">
      <!-- <img src="img/index/content03/triangle_two.png" class="triangle two"> -->
      <img src="img/index/content03/triangle_three.png" class="triangle three">
      <!-- <img src="img/index/content03/triangle_four.png" class="triangle four"> -->
      <div class="wordbox">
        <div class="text one">
          <p>別讓你的夢想被金錢束縛！<br>
             想想自己是否有這些夢想？</p>
        </div>
        <div class="text two">
          <ul>
            <li>．想存到第一桶金</li>
            <li>．想擁有幸福溫暖的房屋</li>
            <li>．想出國旅遊、留學</li>
          </ul> 
        </div>
        <div class="text three">
          <ul>
            <li>．想創業當老闆</li>
            <li>．想擁有自己的店</li>
            <li>．想闖出自己的品牌</li>
          </ul>
        </div>
        <div class="text four">
          <ul>
            <li>．想擴大公司規模</li>
            <li>．想拓展海外版圖</li>
            <li>．想網羅更多人才</li>
          </ul>
        </div>
        <div class="pic">
        <img src="img/index/content03/plane.png" class="plane">
        </div>
      </div>
    </div>
    <div class="block">
    <div class="top">
      <img src="img/index/content03/use_computer.jpg" class="bg">
      <img src="img/index/content03/block_top.png" class="bg one">
      <div class="word">
        <div class="title">
          <span>小資上班族</span>
        </div>
        <div class="text">
          <p>每個月領固定薪水，<br>
             工作多年存款少的可憐<br>
             難道永遠只能當小資女孩、小資男孩。</p>
        </div>
      </div>
    </div>
    <div class="middle">
      <img src="img/index/content03/Young_bg.jpg" class="bg">
      <img src="img/index/content03/block_middle.png" class="bg one">
      <div class="word">
        <div class="title">
          <span>青年創業家</span>
        </div>
        <div class="text">
          <p>有目標、有抱負，<br>
            卻因沒有資金被束縛，<br>
            無法實現創業夢。</p>
        </div>
      </div>
    </div>
    <div class="bottom">
      <img src="img/index/content03/businessman.jpg" class="bg">
      <img src="img/index/content03/block_bottom.png" class="bg one">
      <div class="word">
        <div class="title">
          <span>中小企業主</span>
        </div>
        <div class="text">
          <p>企業邁入成長期，需要大量資金支撐，<br>
             讓企業繼續茁壯。
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- content04 致富機會 & 四大保證-->  
  <div class="content04">
    <div class="colorbg">
      <img src="img/index/content04/strategy_bg.jpg">     
    </div>
    <div class="leftbox">
      <div class="picbox">
        <img src="img/index/content04/pen.png" class="one">
        <img src="img/index/content04/black_bg.png" class="two">
        <img src="img/index/content04/brown_bg.png" class="three">
      </div>
      <div class="wordbox">
        <div class="title">
          <h1>外匯操作系統：</br>
          四大優點，免費擁有。</h1>
        </div>


        <div class="text">
          <img src="img/index/content04/line.png">
          <div class="item one">
            <div class="bigfont">
              <span>使用自動化獲利系統</span>
            </div>
              <p>每月獲利10%-20%，<br>
                 投資報酬率遠高於市面上<br>
                 高風險的投資工具。</p>
          </div>
          <div class="item two">
            <div class="bigfont">
              <span>完全免費提供</span>
            </div>
            <p>多年研發的自動化獲利系統，<br>
               不收任何系統費用，<br>
               翻轉人生零門檻。</p>
          </div>
          <div class="item three">
            <div class="bigfont">
              <span>系統介面操作人性化</span>
            </div>
            <p>一小時的講座掌握操作手法，<br>
             開始獲利</p>           
          </div>
          <div class="item four">
            <div class="bigfont">
              <span>24小時監控智慧監控</span>
            </div>
            <p>每月獲利10%-20%，<br>
             投資報酬率遠高於市面上<br>
             高風險的投資工具。</p>
          </div>
        </div>


      </div>  
    </div>
    <div class="topbox">
      <div class="wordbox">
      <span>給自己一小時！<br>
            我們教你一輩子適用的賺錢術！
      </span>
    </div>
    </div>
    <div class="rightbox">
      <div class="wordbox">
        <div class="title">
          <div class="word">
          <p>用勞力賺來的死薪水<br>
             永遠比不上有錢人用錢滾錢</p>
           </div>
          <div class="line">
          <img src="img/index/content04/line2.png">
          </div>
        </div>
        <div class="text">
          <p>我們經過多年數據回測後再模擬測試，<br>
             找到有錢人不敢告訴你的致勝公式！<br>
             讓我們一窺有錢人的致富秘訣，<br>
             只要投入&nbsp小額資本&nbsp，就能&nbsp創造超高收益<br>
             讓你迅速回本無負擔，<br>
             輕鬆翻轉人生。
          </p>          
        </div>
        <div class="pic">
          <img src="img/index/content04/change.png">
        </div>
      </div>
      <div class="iconbox">
        <div class="item one">
          <div class="icon">
            <img src="img/index/content04/money_icon.png" class="one">
            <img src="img/index/content04/money_icon2.png" class="two">
          </div>
          <div class="word">
            <p>高額獲利</p>
          </div>
        </div>
        <div class="item two">
          <div class="icon">
            <img src="img/index/content04/use_icon.png" class="one">
            <img src="img/index/content04/use_icon2.png" class="two">
          </div>
          <div class="word">
            <p>操作人性</p>
          </div>
        </div>
        <div class="item three">
          <div class="icon">
            <img src="img/index/content04/system_icon.png" class="one">
            <img src="img/index/content04/system_icon2.png" class="two">
          </div>
          <div class="word">
            <p>免費系統</p>
          </div>
        </div>
        <div class="item four">
          <div class="icon">
            <img src="img/index/content04/wisdom_icon.png" class="one">
            <img src="img/index/content04/wisdom_icon2.png" class="two">
          </div>
          <div class="word">
            <p>智慧下單</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content05">
    <div class="colorbg">
      <img src="img/index/content05/content05_bg.png">
    </div>
    <div class="leftbox">
      <div class="location">
        <div class="word">
          <p>HONG&nbspKONG</p>
        </div>
        <div class="pic">
          <img src="img/index/content05/map.png">
        </div>
        <div class="line">
          <img src="img/index/content05/line3.png">
        </div>
      </div> 
    </div>
    <div class="rightbox">
      <div class="wordbox">
        <img src="">
        <div class="top">
          <img src="">
          <p>香港場</p>
        </div>
        <div class="bottom">
          <div class="item one">
            <div class="title">
              <img src="">
              <p>名額限定</p>
            </div>
            <div class="word">
              <p>20名</p>
            </div>
          </div>
          <div class="item two">
            <div class="title">
              <img src="">
              <p>報名截止</p>
            </div>
            <div class="word">
              <p>2016年X月X日XX:XX前</p>
            </div>
          </div>
          <div class="item three">
            <div class="title">
              <img src="">
              <p>講座地點</p>
            </div>
            <div class="word">
              <h1>香港大嶼山香港迪士尼樂園</h1>
              <p>(每人酌收場地清潔費HK100元)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- <body> -->

