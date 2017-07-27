<?php
function p($arr){
    dump($arr);
    exit;
}
 
function objtoarr($obj){
    $ret = array();
    foreach($obj as $key =>$value){
        if(gettype($value) == 'array' || gettype($value) == 'object'){
            $ret[$key] = objtoarr($value);
        }
        else{
            $ret[$key] = $value;
        }
    }
    return $ret;
}

function lefttime($second){
    $times = '';
    $day = floor($second/(3600*24));
    $second = $second%(3600*24);//除去整天之后剩余的时间
    $hour = floor($second/3600);
    $second = $second-$hour*3600;//除去整小时之后剩余的时间
    $minute = floor($second/60);
    $second = fmod(floatval($second),60);//除去整分钟之后剩余的时间
    if($day){
        $times = $day.'天';
    }
    if($hour){
        $times.=$hour.'小时';
    }
    if($minute){
        $times.=$minute.'分';
    }
    if($second){
        $times.=$second.'秒';
    }
    //返回字符串
    return $times;
}

function fftime($time){
    $tomorrow = strtotime(date('Y-m-d',strtotime("+1 day")));
    if($tomorrow > $time){
        return '今日<i>'.date('H时i分',$time).'</i>开始';
    }else{
        $lefttime = $time - $tomorrow;
        if($lefttime < 86400){
            return '明日<i>'.date('H时i分',$time).'</i>开始';
        }else{
            return '<i>'.date('m月d日 H点i分',$time).'</i>开始';
        }
    }
}

//秒数转换时间
function changeTimeType($seconds){
    if ($seconds>3600){
        $hours = intval($seconds/3600);
        $minutes = $seconds600;
        $time = $hours."时".gmstrftime('%M分%S秒', $minutes);
    }else{
        $time = gmstrftime('%H时%M分%S秒', $seconds);
    }
    return $time;
}



function addslashes_deep($value) {
    $value = is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);
    return $value;
}


function stripslashes_deep($value) {
    if (is_array($value)) {
        $value = array_map('stripslashes_deep', $value);
    } elseif (is_object($value)) {
        $vars = get_object_vars($value);
        foreach ($vars as $key => $data) {
            $value->{$key} = stripslashes_deep($data);
        }
    } else {
        $value = stripslashes($value);
    }

    return $value;
}

function filter_default(&$value){
    $value = htmlspecialchars($value);
}

function Newiconv($_input_charset="GBK",$_output_charset="UTF-8",$input ) {
    $output = "";
    if(!isset($_output_charset) )$_output_charset = $this->parameter['_input_charset '];
    if($_input_charset == $_output_charset || $input ==null) { $output = $input;
    }
    elseif (function_exists("m\x62_\x63\x6fn\x76\145\x72\164_\145\x6e\x63\x6f\x64\x69\x6e\147")){
        $output = mb_convert_encoding($input,$_output_charset,$_input_charset);
    } elseif(function_exists("\x69\x63o\156\x76")) {
        $output = iconv($_input_charset,$_output_charset,$input);
        }
        else die("对不起，你的服务器系统无法进行字符转码.请联系空间商。");
        return $output;
}

function newicon($time){
    $date = '';
    if (date('Y-m-d') == date('Y-m-d',$time)){
        $date = '<span class="today-wrapper"><span>今日</span><span>新品</span></span>';
    }
    return $date;
}

function todaytime() {
    return mktime(0, 0, 0, date('m'), date('d'), date('Y'));
}

function cut_html_str($str, $lenth, $replace='', $anchor='<!-- break -->'){
    $str = strip_tags($str);  
    $str = trim($str);
    $str = preg_replace( "@<script(.*?)</script>@is", "", $str ); 
    $str = preg_replace( "@<iframe(.*?)</iframe>@is", "", $str ); 
    $str = preg_replace( "@<style(.*?)</style>@is", "", $str ); 
    $str = preg_replace( "@<(.*?)>@is", "", $str ); 
    $str = ereg_replace("\t","",$str);  
    $str = ereg_replace("\r\n","",$str);  
    $str = ereg_replace("\r","",$str);  
    $str = ereg_replace("\n","",$str);  
    $str = ereg_replace(" ","",$str); 
    
    $_lenth = mb_strlen($str, "utf-8"); // 统计字符串长度（中、英文都算一个字符）
    if($_lenth <= $lenth){
        return $str;    // 传入的字符串长度小于截取长度，原样返回
    }
    $strlen_var = strlen($str);     // 统计字符串长度（UTF8编码下-中文算3个字符，英文算一个字符）
    if(strpos($str, '<') === false){ 
        return mb_substr($str, 0, $lenth);  // 不包含 html 标签 ，直接截取
    } 
    if($e = strpos($str, $anchor)){ 
        return mb_substr($str, 0, $e);  // 包含截断标志，优先
    } 
    $html_tag = 0;  // html 代码标记 
    $result = '';   // 摘要字符串
    $html_array = array('left' => array(), 'right' => array()); //记录截取后字符串内出现的 html 标签，开始=>left,结束=>right
    for($i = 0; $i < $strlen_var; ++$i) { 
        if(!$lenth) break;  // 遍历完之后跳出
        $current_var = substr($str, $i, 1); // 当前字符
        if($current_var == '<'){ // html 代码开始 
            $html_tag = 1; 
            $html_array_str = ''; 
        }else if($html_tag == 1){ // 一段 html 代码结束 
            if($current_var == '>'){ 
                $html_array_str = trim($html_array_str); //去除首尾空格，如 <br / > < img src="" / > 等可能出现首尾空格
                if(substr($html_array_str, -1) != '/'){ //判断最后一个字符是否为 /，若是，则标签已闭合，不记录
                    // 判断第一个字符是否 /，若是，则放在 right 单元 
                    $f = substr($html_array_str, 0, 1); 
                    if($f == '/'){ 
                        $html_array['right'][] = str_replace('/', '', $html_array_str); // 去掉 '/' 
                    }else if($f != '?'){ // 若是?，则为 PHP 代码，跳过
                        // 若有半角空格，以空格分割，第一个单元为 html 标签。如：<h2 class="a"> <p class="a"> 
                        if(strpos($html_array_str, ' ') !== false){ 
                        // 分割成2个单元，可能有多个空格，如：<h2 class="" id=""> 
                        $html_array['left'][] = strtolower(current(explode(' ', $html_array_str, 2))); 
                        }else{ 
                        //若没有空格，整个字符串为 html 标签，如：<b> <p> 等，统一转换为小写
                        $html_array['left'][] = strtolower($html_array_str); 
                        } 
                    } 
                } 
                $html_array_str = ''; // 字符串重置
                $html_tag = 0; 
            }else{ 
                $html_array_str .= $current_var; //将< >之间的字符组成一个字符串,用于提取 html 标签
            } 
        }else{ 
            $lenth; // 非 html 代码才记数
        } 
        $ord_var_c = ord($str{$i}); 
        switch (true) { 
            case (($ord_var_c & 0xE0) == 0xC0): // 2 字节 
                $result .= substr($str, $i, 2); 
                $i += 1; break; 
            case (($ord_var_c & 0xF0) == 0xE0): // 3 字节
                $result .= substr($str, $i, 3); 
                $i += 2; break; 
            case (($ord_var_c & 0xF8) == 0xF0): // 4 字节
                $result .= substr($str, $i, 4); 
                $i += 3; break; 
            case (($ord_var_c & 0xFC) == 0xF8): // 5 字节 
                $result .= substr($str, $i, 5); 
                $i += 4; break; 
            case (($ord_var_c & 0xFE) == 0xFC): // 6 字节
                $result .= substr($str, $i, 6); 
                $i += 5; break; 
            default: // 1 字节 
                $result .= $current_var; 
        } 
    } 
    if($html_array['left']){ //比对左右 html 标签，不足则补全
        $html_array['left'] = array_reverse($html_array['left']); //翻转left数组，补充的顺序应与 html 出现的顺序相反
        foreach($html_array['left'] as $index => $tag){ 
            $key = array_search($tag, $html_array['right']); // 判断该标签是否出现在 right 中
            if($key !== false){ // 出现，从 right 中删除该单元
                unset($html_array['right'][$key]); 
            }else{ // 没有出现，需要补全 
                $result .= '</'.$tag.'>'; 
            } 
        } 
    } 
    return $result.$replace; 
}

function get_word($html,$star,$end){
    $pat = '/'.$star.'(.*?)'.$end.'/s';
    if(!preg_match_all($pat, $html, $mat)) {
    }else{
        $wd= $mat[1][0];
    }
    return $wd;
}

/**
 * 友好时间
 */
function frienddate($time) {
    $rtime = date("m-d H:i",$time);
    $htime = date("H:i",$time);
    $timetime = time() - $time;

    if ($timetime < 60) {
       $str = '刚刚';
    }
    else if ($timetime < 60 * 60) {
       $min = floor($timetime/60);
       $str = $min.'分钟前';
    }
    else if ($timetime < 60 * 60 * 24) {
       $h = floor($timetime/(60*60));
       $str = $h.'小时前 ';
    }
    else if ($timetime < 60 * 60 * 24 * 3) {
       $d = floor($timetime/(60*60*24));
       if($d==1)
       $str = '昨天 '.$htime;
    else
       $str = '前天 '.$htime;
    }
    else {
       $str = $rtime;
    }
    return $str;
}


function fdate($time) {
    if (!$time)
        return false;
    $fdate = '';
    $d = time() - intval($time);
    $ld = $time - mktime(0, 0, 0, 0, 0, date('Y')); //年
    $md = $time - mktime(0, 0, 0, date('m'), 0, date('Y')); //月
    $byd = $time - mktime(0, 0, 0, date('m'), date('d') - 2, date('Y')); //前天
    $yd = $time - mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')); //昨天
    $dd = $time - mktime(0, 0, 0, date('m'), date('d'), date('Y')); //今天
    $td = $time - mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')); //明天
    $atd = $time - mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')); //后天
    if ($d == 0) {
        $fdate = '刚刚';
    } else {
        switch ($d) {
            case $d < $atd:
                $fdate = date('Y年m月d日', $time);
                break;
            case $d < $td:
                $fdate = '后天' . date('H:i', $time);
                break;
            case $d < 0:
                $fdate = '明天' . date('H:i', $time);
                break;
            case $d < 60:
                $fdate = $d . '秒前';
                break;
            case $d < 3600:
                $fdate = floor($d / 60) . '分钟前';
                break;
            case $d < $dd:
                $fdate = floor($d / 3600) . '小时前';
                break;
            case $d < $yd:
                $fdate = '昨天' . date('H:i', $time);
                break;
            case $d < $byd:
                $fdate = '前天' . date('H:i', $time);
                break;
            case $d < $md:
                $fdate = date('m月d日 H:i', $time);
                break;
            case $d < $ld:
                $fdate = date('m月d日', $time);
                break;
            default:
                $fdate = date('Y年m月d日', $time);
                break;
        }
    }
    return $fdate;
}

function utf_substr($str, $len) {
    for ($i = 0; $i < $len; $i++) {
        $temp_str = substr($str, 0, 1);
        if (ord($temp_str) > 127) {
            $i++;
            if ($i < $len) {
                $new_str[] = substr($str, 0, 3);
                $str = substr($str, 3);
            }
        } else {
            $new_str[] = substr($str, 0, 1);
            $str = substr($str, 1);
        }
    }
    return join($new_str).'......';
}
 
/**
 * 获取用户头像
 */
function avatar($uid, $size) {
    $avatar_size = explode(',', C('yh_avatar_size'));
    $size = in_array($size, $avatar_size) ? $size : '100';
    $avatar_dir = avatar_dir($uid);
    $avatar_file = $avatar_dir . md5($uid) . "_{$size}.jpg";
    if (!is_file(C('yh_attach_path') . 'avatar/' . $avatar_file)) {
        $avatar_file = "default_{$size}.jpg";
    }
    return __ROOT__ . '/' . C('yh_attach_path') . 'avatar/' . $avatar_file;
}

function avatar_dir($uid) {
    $uid = abs(intval($uid));
    $suid = sprintf("%09d", $uid);
    $dir1 = substr($suid, 0, 3);
    $dir2 = substr($suid, 3, 2);
    $dir3 = substr($suid, 5, 2);
    return $dir1 . '/' . $dir2 . '/' . $dir3 . '/';
}


function http( $url, $ua = "" ){
    $opts = array(
        "http" => array(
            "header" => "USER-AGENT: ".$ua)
    );
    $context = stream_context_create( $opts );
    $html = @file_get_contents( $url, FALSE, $context );
    if(!$html){
        $html = @file_get_contents( $url, FALSE, $context );
        if(!$html){
            $html = @file_get_contents( $url, FALSE, $context);
        }
    }
    for($i=0; $i < 10; $i++ ){
        if(!($html=== FALSE )){
            break;
        }
        $html = @file_get_contents( $url, FALSE, $context );
    }
    return $html;
}

function utf8( $string, $code = "" ){
    $code = @mb_detect_encoding($string,array("UTF-8", "GBK"));
    return mb_convert_encoding( $string, "UTF-8", $code );
}

function attach($attach, $type) {
    if (false === strpos($attach, 'http://')) {
        //本地附件
        return __ROOT__ . '/' . C('yh_attach_path') . $type . '/' . $attach;
        //远程附件
        //todo...
    } else {
        //URL链接
        return $attach;
    }
}

function yh($yh){yhtbk();}
function get_id($url) {
        $id = 0;
        $parse = parse_url($url);
        if (isset($parse['query'])) {
            parse_str($parse['query'], $params);
            if (isset($params['id'])) {
                $id = $params['id'];
            } elseif (isset($params['item_id'])) {
                $id = $params['item_id'];
            } elseif (isset($params['default_item_id'])) {
                $id = $params['default_item_id'];
            } elseif (isset($params['amp;id'])) {
                $id = $params['amp;id'];
            } elseif (isset($params['amp;item_id'])) {
                $id = $params['amp;item_id'];
            } elseif (isset($params['amp;default_item_id'])) {
                $id = $params['amp;default_item_id'];
            }
        }
        return $id;
    }
/*
 * 获取缩略图
 */
function get_thumb($img, $suffix = '_thumb') {
    if (false === strpos($img, 'http://')) {
        $ext = array_pop(explode('.', $img));
        $thumb = str_replace('.' . $ext, $suffix . '.' . $ext, $img);
    } else {
        if (false !== strpos($img, 'taobaocdn.com') || false !== strpos($img, 'taobao.com') || false !== strpos($img, 'alicdn.com')) {
            //淘宝图片 _s _m _b
            switch ($suffix) {
                case '_s':
                    $thumb = $img . '_100x100.jpg';
                    break;
                case '_m':
                    $thumb = $img . '';
                    break;
                case '_b':
                    $thumb = $img . '';
                    break;
                case '_t':
                    $thumb = $img . '';
                    break;
            }
        }else{
            $thumb = $img;
        }
    }
    return $thumb;
}


/**
 * 将数组键名变成大写或小写
 * @param array $arr 数组
 * @param int $type 转换方式 1大写   0小写
 * @return array
 */
function array_change_key_case_d($arr, $type = 0)
{
    $function = $type ? 'strtoupper' : 'strtolower';
    $newArr = array(); //格式化后的数组
    if (!is_array($arr) || empty($arr))
        return $newArr;
    foreach ($arr as $k => $v) {
        $k = $function($k);
        if (is_array($v)) {
            $newArr[$k] = array_change_key_case_d($v, $type);
        } else {
            $newArr[$k] = $v;
        }
    }
    return $newArr;
}
/**
 * 对象转换成数组
 */
function object_to_array($obj) {
    $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
    foreach ($_arr as $key => $val) {
        $val = (is_array($val) || is_object($val)) ? object_to_array($val) : $val;
        $arr[$key] = $val;
    }
    return $arr;
}

function yhtbk(){
        $host = $_SERVER['HTTP_HOST'];
        preg_match('/[\w][\w-]*\.(?:com\.cn|com|cn|net|co|org|top|cc|name|info|me|pw|la|hk|dk|xin|so|wang|asia|biz|mobi|ren|club|site|space|online|tech|xyz|cn\.com|com\.cn|net\.cn|org\.cn|gov\.cn|com\.hk|tm|tv|tel|us|tw|website|host|vip|link|press|click|com\.tw)(\/|$)/isU', $host, $host_array);
        $domain = rtrim($host_array[0], '/');
        if (empty($domain)) {
            $strurl = str_replace("http://", "", $host);
            $strurldomain = explode("/", $strurl);
            $domain = $strurldomain[0];
        }
        $domain = trim($domain);
        /* if (substr(C('yh_site_secret'), 0, 6) !== strtoupper(substr(md5($domain), 0, 6))){
            header('Content-Type:text/html; charset=utf-8');
            echo base64_decode('5oKo55qE572R56uZ5pyq6KKr5o6I5p2D77yM6K+36IGU57O75ri46a2C572R57uc5a6Y5pa55o6I5p2D77yMICZuYnNwO+WuouacjVFR77yaPGEgaHJlZj0naHR0cDovL3dwYS5xcS5jb20vbXNncmQ/dj0zJnVpbj0yNTI5NjgxMDQzJnNpdGU9cXEmbWVudT15ZXMnIHRhcmdldD0nX2JsYW5rJz4yNTI5NjgxMDQzPC9hPiAmbmJzcDvlrqLmnI3ml7rml7rvvJo8YSB0YXJnZXQ9J19ibGFuaycgaHJlZj0naHR0cDpcL1wvd3d3LnRhb2Jhby5jb21cL3dlYnd3XC93dy5waHA/dmVyPTMmdG91aWQ96KW/5bCP5aeQ54eV5a2QJnNpdGVpZD1jbnRhb2JhbyZzdGF0dXM9MSZjaGFyc2V0PXV0Zi04Jz7opb/lsI/lp5Dnh5XlrZA8L2E+IDxicj48YnI+IFvmuLjprYLnvZHnu5xd');
            exit();
        } */
}

function is_email($user_email){
    $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
    if (strpos($user_email, '@') !== false && strpos($user_email, '.') !== false){
        if (preg_match($chars, $user_email)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


/**
 * ID 字母 转换
 */
function id_num($in,$to_num = false,$pad_up = false,$passKey = null)  {
    if(!function_exists('bcpow')) {
            return $in;
    }
        $index = 'abcdefghijklmnopqrstuvwxyz0123456789';
        if ($passKey !== null) {
            for ($n = 0;$n<strlen($index);$n++) {
                $i[] = substr( $index,$n ,1);
            }
            $passhash = hash('sha256',$passKey);
            $passhash = (strlen($passhash) <strlen($index))?hash('sha512',$passKey) : $passhash;
            for ($n=0;$n <strlen($index);$n++) {
                $p[] =  substr($passhash,$n ,1);
            }
            array_multisort($p,SORT_DESC,$i);
            $index = implode($i);
        }
        $base  = strlen($index);
        if ($to_num) {
            $in  = strrev($in);
            $out = 0;
            $len = strlen($in) -1;
            for ($t = 0;$t <= $len;$t++) {
                $bcpow = bcpow($base,$len -$t);
                $out   = $out +strpos($index,substr($in,$t,1)) * $bcpow;
            }
            if (is_numeric($pad_up)) {
                $pad_up--;
                if ($pad_up >0) {
                    $out -= pow($base,$pad_up);
                }
            }
            $out = sprintf('%F',$out);
            $out = substr($out,0,strpos($out,'.'));
        }else {
            if (is_numeric($pad_up)) {
                $pad_up--;
                if ($pad_up >0) {
                    $in += pow($base,$pad_up);
                }
            }
            $out = '';
            for ($t = floor(log($in,$base));$t >= 0;$t--) {
                $bcp = bcpow($base,$t);
                $a   = floor($in / $bcp) %$base;
                $out = $out .substr($index,$a,1);
                $in  = $in -($a * $bcp);
            }
            $out = strrev($out);
        }
        return $out;
}

function kouling($logo, $text, $url)
{
$appkey=C('yh_taobao_appkey');
$appsecret=C('yh_taobao_appsecret');
if(!empty($appkey) && !empty($appsecret)){
    
    import('TopSdk', VENDOR_PATH.'taobao', '.php');
    $c = new TopClient();
    $appkey = C('yh_taobao_appkey');
    $secret = C('yh_taobao_appsecret');
    $c->appkey = $appkey;
    $c->secretKey = $secret;
    $req = new WirelessShareTpwdCreateRequest();
    $tpwd_param = new IsvTpwdInfo();
    $tpwd_param->ext = "{\"xx\":\"xx\"}";
    $tpwd_param->logo = $logo;
    $tpwd_param->text = $text;
    $tpwd_param->url = $url;
    $tpwd_param->user_id = "2342342342";
    $req->setTpwdParam(json_encode($tpwd_param));
    $resp = $c->execute($req);
    $resparr = xmlToArray($resp);
    return $resparr['model'];
}
    
}


function xmlToArray($xml){
    $val = json_decode(json_encode($xml),true);
    return $val;
}
