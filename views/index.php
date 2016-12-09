<?=$temp['header_up']?>
<?=$temp['header_down']?>
<script src="js/tool/smooth_scrollerator.js"></script>
<script>
$(function(){
  var window_height = $(window).height();
  var window_width = $(window).width();

  //滑到指定區塊執行動畫
    $(document).scroll(function(){
      var scroll_top = $(document).scrollTop();
      var scroll_top_height = scroll_top + $(window).height() * 2 ;
      // var content4_top = $('.town_bg').offset().top;
      // var content4_top_height_all = $('.town_bg').height();

      var window_width = $(window).width();
      console.log(scroll_top);

      var content01_height = $('.content01').height();
      var content02_height = $('.content02').height();
      var content03_height = $('.content03').height();
      var content04_height = $('.content04').height();
      var content05_height = $('.content05').height();
      var content06_height = $('.content06').height();
 
        if(scroll_top == 0){
          $('.content02').removeClass('hover');
        }
        else if( scroll_top > content01_height && scroll_top < content01_height + content02_height / 2 ){
           $('.content02').addClass('hover');
        }
        else if(scroll_top > 800 && scroll_top < 1100){
        }
        else if(scroll_top > 1100 && scroll_top < 1700){
        }
        else if(scroll_top > 1700 && scroll_top < 2700){
        }
        else if(scroll_top > 2700 && scroll_top < 3000){
        }
        else if(scroll_top > 3000 && scroll_top < 5000){
        }
    });
});

// var options1 = {
//     id: 'fadein'
//     };
//     $('.fadein').initReveal(options1);
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
          <img src="img/index/content01/M01.png" class="one">
          <h1 class="fadein">型社會變成</h1>
          <img src="img/index/content01/L01.png" class="two">
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
    <!-- first -->
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
            <p class="one">想要改變自己的人生，卻不知道從何開始?<br>
            富人企業沒有公開的致勝心法!</p>
            <div class="you">
            <h1>你</h1>
            <p class="three">&nbsp是否認真思考過<br>資本主義社會</p></div>
            <p class="four">賺錢的秘密?</p>
          </div>
        </div>
      </div>
    </div><!-- first -->
    <!-- second -->
    <div class="second">
      <div class="moneybg two">
        <img src="img/index/content02/content02_bg2.png"></div>   
        <div class="wordbox">
          <div class="item one">
              <p class="text-left">策</p>
              <div class="right">
                <img src="img/index/content02/item_black01.png">
                <p class="text-right">策略僵化</p>
              </div>   
          </div>
          <div class="item two">
            <p class="text-left">虧</p>
            <div class="right">
              <p class="text-right">害怕虧損</p>     
              <img src="img/index/content02/item_red01.png">
            </div>
          </div>
          <div class="item three">
            <p class="text-left">情</p>
            <div class="right">
              <p class="text-right">情緒操作</p>     
              <img src="img/index/content02/item_black01.png">
            </div> 
          </div>  
          <div class="item four">
            <p class="text-left">市</p>
            <div class="right">
              <p class="text-right">誤判市場</p>      
              <img src="img/index/content02/item_red01.png">
            </div>
          </div> 
          <div class="item five">
            <p class="text-left">運</p>
            <div class="right">
              <p class="text-right">只靠運氣</p>    
              <img src="img/index/content02/item_black01.png">
            </div> 
          </div> 
        </div>
    </div><!-- second -->
</div>
<div class="middlebar">
  <img src="img/index/content02/middle_bar.png">
    <h1>
      人人都享有致富&nbsp與&nbsp實踐夢想的權利
    </h1>
</div>


<!-- content03 -->  
  <div class="content03" id="content03">
    <div class="rightbox">
      <img src="img/index/content03/triangle_one.png" class="triangle one">
      <!-- <img src="img/index/content03/triangle_two.png" class="triangle two"> -->
      <!-- <img src="img/index/content03/triangle_three.png" class="triangle three"> -->
      <!-- <img src="img/index/content03/triangle_four.png" class="triangle four"> -->
      <div class="wordbox">
        <div class="text one">
          <p>不論你在社會的成就或高或低<br>
              想想自己是不是值得更好的未來？
          </p>
        </div>
<!--         <div class="text two">
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
        </div> -->
        <div class="pic">
        <img src="img/index/content03/plane.png" class="plane">
        </div>
      </div>
    </div>
    <div class="block">
    <div class="top">
      <img src="img/index/content03/use_computer.jpg" class="bg">
      <!-- <img src="img/index/content03/block_top.png" class="bg one"> -->
      <div class="word">
        <div class="title">
          <span>小資上班族</span>
        </div>
<!--         <div class="text">
          <p>每個月領固定薪水，<br>
             工作多年存款少的可憐<br>
             難道永遠只能當小資女孩、小資男孩。</p>
        </div> -->
      </div>
    </div>
    <div class="middle">
      <img src="img/index/content03/Young_bg.jpg" class="bg">
<!--       <img src="img/index/content03/block_middle.png" class="bg one"> -->
      <div class="word">
        <div class="title">
          <span>青年創業家</span>
        </div>
<!--         <div class="text">
          <p>有目標、有抱負，<br>
            卻因沒有資金被束縛，<br>
            無法實現創業夢。</p>
        </div> -->
      </div>
    </div>
    <div class="bottom">
      <img src="img/index/content03/businessman.jpg" class="bg">
<!--       <img src="img/index/content03/block_bottom.png" class="bg one"> -->
      <div class="word">
        <div class="title">
          <span>中小企業主</span>
        </div>
<!--         <div class="text">
          <p>企業邁入成長期，需要大量資金支撐，<br>
             讓企業繼續茁壯。
          </p>
        </div> -->
      </div>
    </div>
  </div>
</div>

<!-- content04 致富機會 & 四大保證-->  
  <div class="content04">
    <div class="colorbg">
      <img src="img/index/content04/strategy_bg.jpg">     
    </div>
    <div class="con_1">
      <div class="leftbox">
        <div class="picbox">
          <img src="img/index/content04/pen.png"></div>
      </div>
      <h1>給自己一小時<br>我們教你一輩子適用的賺錢術！</h1>
      <div class="rightbox">  
        <div class="text">
          <h2>選擇比努力重要，趨勢比選擇重要<br>
            但，自然定律才是宇宙不變的法則</h2>
          <p class="one">透過分析超過20萬人的成功心得<br>
              利用超過6年的時間透析鑽研<br>
              我們找出了企業、財團、領袖、富人、成功者<br>
              相同的關鍵定律及不能說的秘密</p>
          <p class="two">『現實不需要夢想包裝，理想必須有能力實踐』</p>           
        </div>
      </div>
    </div>
    <div class="con_2">
      <div class="leftbox">
        <img src="img/index/content04/black_bg.png" class="one">
        <img src="img/index/content04/brown_bg.png" class="two">
        <div class="wordbox">
            <h1>外匯操作系統：</br>
            四大優點，免費擁有。</h1>
          <div class="text">
            <div class="item one">
              <span>使用自動化獲利系統</span>
              <p>每月獲利10%-20%，<br>
                 投資報酬率遠高於市面上<br>
                 高風險的投資工具。</p>
            </div>
<!--             <div class="item two">
                <span>完全免費提供</span>
              <p>多年研發的自動化獲利系統，<br>
                 不收任何系統費用，<br>
                 翻轉人生零門檻。</p>
            </div>
            <div class="item three">

                <span>系統介面操作人性化</span>

              <p>一小時的講座掌握操作手法，<br>
               開始獲利</p>           
            </div>
            <div class="item four">

                <span>24小時監控智慧監控</span>

              <p>每月獲利10%-20%，<br>
               投資報酬率遠高於市面上<br>
               高風險的投資工具。</p>
            </div> -->
          </div>
        </div>  
      </div>
      <div class="rightbox">
        <div class="item_block">
          <div class="item one">
            <div class="icon one">
  <!--             <img src="img/index/content04/money_icon.png" class="one">
              <img src="img/index/content04/money_icon2.png" class="two"> -->
            </div>
              <p>高額獲利</p>
          </div>
          <div class="item two">
            <div class="icon two">
  <!--             <img src="img/index/content04/use_icon.png" class="one">
              <img src="img/index/content04/use_icon2.png" class="two"> -->
            </div>
              <p>操作人性</p>
          </div>
          <div class="item three">
            <div class="icon three">
  <!--             <img src="img/index/content04/system_icon.png" class="one">
              <img src="img/index/content04/system_icon2.png" class="two"> -->
            </div>
              <p>免費系統</p>
          </div>
          <div class="item four">
            <div class="icon four">
  <!--             <img src="img/index/content04/wisdom_icon.png" class="one">
              <img src="img/index/content04/wisdom_icon2.png" class="two"> -->
            </div>
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
        <div class="top">
          <img src="img/index/content05/money_y.png">
          <p class="big">香港場</p>
        </div>
        <div class="bottom">
          <div class="item one">
              <p class="left">名額限定</p>
            <p>20名</p>
          </div>
          <div class="item two">
              <p class="left">報名截止</p>
              <p>2016年X月X日XX:XX前</p>
          </div>
          <div class="item three">
              <p class="left">講座地點</p>
              <p>香港大嶼山香港迪士尼樂園<br>
              (每人酌收場地清潔費HK100元)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content06">
    <img src="img/index/content06/content06_bg.jpg">
    <h1>別再錯過跟財富擦肩而過的機會!<br>
把握機會填表報名，讓你的人生從此不同！</h1>

<div class="form">
  <div class="line"></div>
    <div class="item">
    <p>*您的姓名:</p>
    <input type="text" name="username" class="one" placeholder=""></div>
    <div class="item"><p>*聯絡電話:</p><input type="text" name="phone" class="twp" placeholder="09xx-xxx-xxx"></div>
    <div class="item"><p>*電子信箱:</p><input type="text" name="email" class="three" placeholder="answoo@gmail.com"></div>

    <input type="submit" class="submit" value="立即參加">  </div>
</div>
</div>

<!-- <body> -->

