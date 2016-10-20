<?=$temp['header_up']?>
<script>
Temp.ready({
    repeat: 'repeat',
    func: function(){

    var tag = $('#tag').val();
    var href = $('#href').val();
    if(tag == '' && href == ''){
        var global_status = $('#global_status').prop('checked');
        if(global_status == false){
            $('#tag').removeAttr('disabled','disabled');
            $('#href').removeAttr('disabled','disabled');
            $('#global_status').removeAttr('disabled','disabled');
        }
    }

    $('#tag').bind("change keyup keydown", function(){

        var $this = $(this).val();

        if($this == ''){
            $('#href').removeAttr('disabled','disabled');
            $('#global_status').removeAttr('disabled','disabled');
        }
        else{
            $('#href').val('');
            $('#href').attr('disabled','disabled');
            $('#global_status').val('');
            $('#global_status').attr('disabled','disabled');
        }
    });

    $('#href').bind("change keyup keydown", function(){

        var $this = $(this).val();

        if($this == ''){
            $('#tag').removeAttr('disabled','disabled');
            $('#global_status').removeAttr('disabled','disabled');
        }
        else{
            $('#tag').val('');
            $('#tag').attr('disabled','disabled');
            $('#global_status').val('');
            $('#global_status').attr('disabled','disabled');
        }
    });

    $('#global_status').bind("click", function(){

        if($("#global_status").prop('checked')){
            $('#href').val('');
            $('#href').attr('disabled','disabled');
            $('#tag').val('');
            $('#tag').attr('disabled','disabled');
        }
        else{
            $('#href').removeAttr('disabled','disabled');
            $('#tag').removeAttr('disabled','disabled');
        }
    });

}});
</script>
<?=$temp['header_down']?>
<?=$temp['admin_header_bar']?>
<h2><?=$child2_title?> - <?=$child3_title?></h2>
<div class="contentBox allWidth">
    <h3><?=$child3_title?> > <?if(!empty($PageSetting->page_settingid)):?>編輯<?else:?>新增<?endif?></h3>
    <h4>請填寫<?=$child3_title?>之詳細資訊</h4>
    <?php echo form_open_multipart("admin/$child1_name/$child2_name/$child3_name/{$child4_name}_post/") ?>
    <div class="spanLine">
        <div class="spanStage">
            <div class="spanLineLeft">
                全域分頁標題
            </div>
            <div class="spanLineLeft width400">
                <input type="text" class="text" name="title" placeholder="請輸入全域分頁標題" value="<?=$PageSetting->title?>" required>
            </div>
        </div>
    </div>
    <div class="spanLine">
        <div class="spanStage">
            <div class="spanLineLeft">
                全域分頁代碼
            </div>
            <div class="spanLineLeft width400">
                <input type="text" class="text" id="tag" name="tag" placeholder="請輸入全域分頁代碼" value="<?=$PageSetting->tag?>"<?if(!empty($PageSetting->page_settingid)):?><?if(!empty($PageSetting->tag)):?><?else:?>disabled<?endif?><?endif?>>
            </div>
        </div>
        <div class="spanStage">
            <div class="spanLineLeft">
            </div>
            <div class="spanLineRight">
                <p class="gray">請自行在本網站網址後方加入<span class="green">/?tag=您設定的代碼</span>，即可記錄瀏覽次數</p>
                <p class="gray">不得與其它廣告分頁漏斗代碼重複</p>
                <p class="red">※ 代碼、網址及全域只能夠擇一選擇</p>
            </div>
        </div>
    </div>
    <div class="spanLine">
        <div class="spanStage">
            <div class="spanLineLeft">
                指定網頁網址
            </div>
            <div class="spanLineLeft width400">
                <input type="text" class="text" id="href" name="href" placeholder="請輸入指定網頁的網址" value="<?=$PageSetting->href?>" <?if(!empty($PageSetting->page_settingid)):?><?if(!empty($PageSetting->href)):?><?else:?>disabled<?endif?><?endif?>>
            </div>
        </div>
        <div class="spanStage">
            <div class="spanLineLeft">
            </div>
            <div class="spanLineRight">
                <p class="gray">請貼上指定網頁 http://<?=$_SERVER['HTTP_HOST']?> 後方的網址，範例：<?=base_url()?>note</p>
            </div>
        </div>
    </div>
    <div class="spanLine">
        <div class="spanStage">
            <div class="spanLineLeft">
                全域設定
            </div>
            <div class="spanLineLeft width500">
                <label><input type="checkbox" name="global_status" id="global_status" value="1" <?if(!empty($PageSetting->page_settingid)):?><?if($PageSetting->global_status == 1):?>checked<?else:?>disabled<?endif?><?endif?>> 全域設定</label>
            </div>
        </div>
        <div class="spanStage">
            <div class="spanLineLeft">
            </div>
            <div class="spanLineRight">
                <p class="gray">若勾選此選項，則此設定於全網站中</p>
            </div>
        </div>
    </div>
    <div class="spanLine">
        <div class="spanStage">
            <div class="spanLineLeft">
                SEO Meta 標籤
            </div>
            <div class="spanLineLeft width500">
                <textarea name="metatag" placeholder="請輸入 SEO Meta 標籤"><?=$PageSetting->metatag?></textarea>
            </div>
        </div>
        <div class="spanStage">
            <div class="spanLineLeft">
            </div>
            <div class="spanLineRight">
                <p class="gray">每個不同的SEO標籤請以「,」分隔，如要區分大段落的SEO標籤，請以斷行分隔</p>
            </div>
        </div>
    </div>
    <div class="spanLine">
        <div class="spanStage">
            <div class="spanLineLeft">
                javascript 欄位
            </div>
            <div class="spanLineLeft width500">
                <textarea name="script_plugin" placeholder="可填寫 Google Analytics 或 facebook 像素等資料"><?=$PageSetting->script_plugin?></textarea>
            </div>
        </div>
        <div class="spanStage">
            <div class="spanLineLeft">
            </div>
            <div class="spanLineRight">
                <p class="gray">請複製原始碼程式，並且包含「&lt;script&gt;&lt;/script&gt;」標籤</p>
            </div>
        </div>
    </div>
    <div class="spanLine">
        <div class="spanStage">
            <div class="spanLineLeft">
                全域分頁說明
            </div>
            <div class="spanLineLeft width500">
                <textarea name="synopsis" placeholder="請輸入全域分頁說明"><?=$PageSetting->synopsis?></textarea>
            </div>
        </div>
        <div class="spanStage">
            <div class="spanLineLeft">
            </div>
            <div class="spanLineRight">
                <p class="gray">請填寫200字以內的全域分頁說明</p>
            </div>
        </div>
    </div>
    <div class="spanLine">
        <div class="spanStage">
            <div class="spanLineLeft">
                瀏覽次數
            </div>
            <div class="spanLineLeft width400">
                <?if(!empty($PageSetting->view)):?><?=$PageSetting->view?><?else:?>0<?endif?>
            </div>
        </div>
        <div class="spanStage">
            <div class="spanLineLeft">
            </div>
            <div class="spanLineRight">
                <p class="gray">若有填寫全域分頁代碼才會紀錄</p>
            </div>
        </div>
    </div>
    <div class="spanLine spanSubmit">
        <div class="spanStage">
            <div class="spanLineLeft">
            </div>
            <div class="spanLineRight">
                <?if(!empty($PageSetting->page_settingid)):?>
                <input type="hidden" name="page_settingid" value="<?=$PageSetting->page_settingid?>">
                <input type="hidden" name="view" value="<?=$PageSetting->view?>">
                <?endif?>
                <input type="submit" class="submit" value="<?if(!empty($PageSetting->page_settingid)):?>儲存變更<?else:?>新增全域分頁<?endif?>">
                <?if(!empty($PageSetting->page_settingid)):?>
                <span class="submit gray" onClick="fanswoo.check_href_action('確定要刪除嗎？', 'admin/<?=$child1_name?>/<?=$child2_name?>/<?=$child3_name?>/delete/?page_settingid=<?=$PageSetting->page_settingid?>&hash=<?=$this->security->get_csrf_hash()?>');">刪除<?=$child3_title?></span>
                <?endif?>
            </div>
        </div>
    </div>
    </form>
</div>
<?=$temp['admin_footer_bar']?>
<?=$temp['body_end']?>