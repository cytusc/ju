<?php
vendor('taobao.TopSdk');
class itemAction extends FirstendAction
{
    public function _initialize()
    {
        parent::_initialize();
        $this->_mod = D('items')->cache(true, 10 * 60);
        $this->_cate_mod = D('items_cate')->cache(true, 10 * 60);
        $this->assign('nav_curr', 'index');
        // 访问者控制
        if (! $this->visitor->is_login && in_array(ACTION_NAME, array(
            'delete',
            'comment',
            'delcol',
            'mycol'
        ))) {
            IS_AJAX && $this->ajaxReturn(0, L('login_please'));
            $this->redirect('user/login');
        }
        if (C('yh_site_cache')) {
            $file = 'items_site';
        }
    }

    /**
     * 商品详细页
     */
    public function index()
    {
        $id = I('id', '', 'trim');
        $iid = D('items')->cache(true, 10 * 60)->where(array(
            'id' => $id
        ))->getField('num_iid');
        $iid = $iid + 1;
        $this->assign('iid', $iid);
        $item = $this->_mod->where(array(
            'id' => $id
        ))->find();
        ! $item && $this->_404();

	
        $item['class'] = $this->_mod->status($item['status'], $item['coupon_start_time'], $item['coupon_end_time']);
        $txurl = C('yh_site_url') . U('item/index', array(
            'id' => $item['id']
        ));
        $item['txurl'] = urlencode($txurl);
        $item['zk'] = round(($item['coupon_price'] / $item['price']) * 10, 2);
        $item['iurl'] = C('yh_site_url') . '/item/' . $item['id'] . '.html';
        $item['jurl'] = C('yh_site_url') . '/jump/' . $item['id'] . '.html';
        $item['ccid'] = $item['cate_id'];
        if (isset($item['cate_id'])) {
            $item['cname'] = D('items_cate')->where(array(
                'id' => $item['cate_id']
            ))->getField('name');
        }
        
        if (C('yh_item_hit')) {
            $hits_data = array(
                'hits' => array(
                    'exp',
                    'hits+1'
                )
            );
            $this->_mod->where(array(
                'id' => $id
            ))->setField($hits_data);
        }
        
        $cate_data = F('cate_list');
        $cid = $item["cate_id"];
        $pid = $cate_data[$cid]['pid'];
        
        $tag_list = D('items')->cache(true, 10 * 60)->get_tags_by_title($item['title']);
        $tags = implode(',', $tag_list);
        
        $this->_config_seo(C('yh_seo_config.item'), array(
            'title' => $item['title'],
            'intro' => $item['intro'],
            'price' => $item['price'],
            'quan' => floattostr($item['quan']),
            'coupon_price' => $item['coupon_price'],
            'tags' => $tags,
            'seo_title' => $item['seo_title'],
            'seo_keywords' => $item['seo_keys'],
            'seo_description' => $item['seo_desc']
        ));
        
        $item_comment_mod = M('items_comment')->cache(true, 10 * 60);
        $pagesize = 8;
        $pager->listRows = 8;
        $map = array(
            'item_id' => $id,
            'status' => '1'
        );
        $count = $item_comment_mod->where($map)->count('id');
        $pager = $this->_pager($count, $pagesize);
        $pager->path = 'comment_list';
        $pager_bar = $pager->fshow();
        $comment_list = $item_comment_mod->where($map)
            ->order('add_time ASC')
            ->limit($pager->firstRow . ',' . $pager->listRows)
            ->select();
        $this->assign('comment_list', $comment_list);
        $this->assign('page_bar', $pager_bar);
        foreach ($comment_list as $com) {
            foreach ($tag_list as $nkeys) {
                if (strpos($com['info'], $nkeys)) {
                    $url = U('search/index', array(
                        'k' => urlencode($nkeys)
                    ));
                    $com['info'] = str_replace($nkeys, "<a href=" . $url . " target=_blank ><b style=color:red>" . $nkeys . "</b></a>", $com['info']);
                }
            }
            $comm[] = $com;
        }
     //   $counts = $this->_mod->where($where)->count();
//      $this->assign('total_item', $counts);
//      if (false === $cate_list = F('cate_list')) {
//          $cate_list = D('items_cate')->cate_cache();
//      }
        
        if (C('yh_site_cache')) {
            $file = 'orlike_' . $cid;
            if (false === $orlike = S($file)) {
                if ($cid) {
                    $orlike = $this->_mod->where(array(
                        'cate_id' => $cid
                        
                    ))
                        ->limit('0,12')
                        ->order('id desc')
                        ->select();
                } else {
                    $orlike = $this->_mod->limit('0,12')
                        ->order('id desc')
                        ->select();
                }
                S($file, $orlike);
            }
        } else {
            if ($cid) {
                $orlike = $this->_mod->where(array(
                    'cate_id' => $cid
                   
                ))
                    ->limit('0,12')
                    ->order('id desc')
                    ->select();
            } else {
                $orlike = $this->_mod->limit('0,12')
                    ->order('id desc')
                    ->select();
            }
        }
        
        $items = array();
        $pagecount = 0;
      //  $seller_arr = array();
      //  $sellers = '';
        foreach ($orlike as $key => $val) {
            $items[$key] = $val;
            $items[$key]['class'] = $this->_mod->status($val['status'], $val['coupon_start_time'], $val['coupon_end_time']);
            $items[$key]['pics'] = $this->pic = D('items')->where(array(
                'id' => $item['id']
            ))->getField('pic_url');
            $items[$key]['titles'] = $this->title = D('items')->where(array(
                'id' => $item['id']
            ))->getField('title');
            $items[$key]['zk'] = round(($val['coupon_price'] / $val['price']) * 10, 1);
            $items[$key]['itemurl'] = C('yh_site_url') . '/item/' . $val['id'] . '.html';
            $items[$key]['jumpurl'] = C('yh_site_url') . '/jump/' . $val['id'] . '.html';
            if (! $val['click_url']) {
                $items[$key]['click_url'] = ""; // U('jump/index',array('id'=>$val['id']));
            }
            if ($val['coupon_start_time'] > time()) {
                $items[$key]['click_url'] = ""; // U('item/index',array('id'=>$val['id']));
                $items[$key]['timeleft'] = $val['coupon_start_time'] - time();
            } else {
                $items[$key]['timeleft'] = $val['coupon_end_time'] - time();
            }
            $items[$key]['cate_name'] = $cate_list['p'][$val['cate_id']]['name'];
            $url = C('yh_site_url') . U('item/index', array(
                'id' => $val['id']
            ));
            $items[$key]['url'] = urlencode($url);
            $items[$key]['urltitle'] = urlencode($val['title']);
            $items[$key]['price'] = number_format($val['price'], 1);
            $items[$key]['coupon_price'] = number_format($val['coupon_price'], 1);
            $pagecount ++;
//          if ($val['sellerId']) {
//            $seller_arr[] = $val['sellerId'];
//          }
        }
      //  $seller_arr = array_unique($seller_arr);
       // $sellers = implode(",", $seller_arr);
        if (! $item['desc']) {
            $descUrl = 'http://hws.m.taobao.com/cache/mtop.wdetail.getItemDescx/4.1/?data=%7B%22item_num_id%22%3A%22' . $item['num_iid'] . '%22%7D';
            $yhxia_https = new yhxia_https();
            $yhxia_https->fetch($descUrl);
            $source = $yhxia_https->results;
            if (! $source) {
                $source = file_get_contents($descUrl);
            }
            $result_data = json_decode($source, true);
            $dinfo = array();
            $num = $result_data['data']['images'];
            for ($i = 0; $i < count($num); $i ++) {
                $images = $i + 1;
                $desc[$images] = $num[$i];
                $desc[$images] = '<img class="lazy" src=' . $desc[$images] . '>';
            }
            $desc = $desc[1] . '' . $desc[2] . '' . $desc[3] . '' . $desc[4] . '' . $desc[5] . '' . $desc[6] . '' . $desc[7] . '' . $desc[8] . '' . $desc[9] . '' . $desc[10] . '' . $desc[11] . '' . $desc[12] . '' . $desc[13] . '' . $desc[14] . '' . $desc[15] . '' . $desc[16] . '' . $desc[17] . '' . $desc[18] . '' . $desc[19] . '' . $desc[20] . '' . $desc[21] . '' . $desc[22] . '' . $desc[23] . '' . $desc[24] . '' . $desc[25] . '' . $desc[26] . '' . $desc[27] . '' . $desc[28] . '' . $desc[29] . '' . $desc[30];
            $item['desc'] = $desc;
            $data['desc'] = $desc;
            $this->_mod->where(array(
                'num_iid' => $item['num_iid']
            ))->save($data);
        }
        if (C('yh_dn_item_desc')) {
            unset($item['desc']);
            unset($data['desc']);
            unset($desc);
        }
        
        $map = array();
        $map['isq'] = 1;
        $map['Quan_id'] = array(
            'neq',
            ''
        );
        $map['last_time'] = array(
            'lt',
            strtotime(date('Y-m-d H:i:s', strtotime('-2 hours')))
        );
        $map['coupon_end_time'] = array(
            'gt',
            strtotime(date('Y-m-d H:i:s'))
        );
        $orlike = $this->_mod->where($map)
            ->limit('0,30')
            ->order('id desc')
            ->getField('num_iid,Quan_id'); // select();
        if (strlen($item[Quan_id]) > 20 and $item[isq] == 1 and $item[last_time] <= strtotime(date('Y-m-d H:i:s', strtotime('-1 hours')))) {
            $quanarr = "'" . $item[num_iid] . '-' . $item[Quan_id] . "',";
        }
        foreach ($orlike as $key => $val) {
            $quanarr = $quanarr . "'" . $key . '-' . $val . "',";
        }
        $quanarr = rtrim($quanarr, ",");
        $quanarr = "var arr=[$quanarr];";
        $this->assign('quanarr', $quanarr);
        $item['quan'] = floattostr($item['quan']);
	  if(empty($item['quankouling']) || $item['quankouling']=='0' || $item['quankouling']=='undefined'){
	   $kouling=kouling($item['pic_url'].'_400x400',$item['title'],$item['quanurl']);
	   $item['quankouling']=$kouling;
	   $this->_mod->where(array(
                'num_iid' => $item['num_iid']
            ))->setField('quankouling',$kouling);
	   }
         $last_time=date('Y-m-d',$item['last_time']);
		 $today=date('Y-m-d',time());
	     if($last_time!=$today || $item['ding']==1){
		    $disable_num_iids = F('coupon/disable_num_iids');
		    if(!$disable_num_iids){
                    $disable_num_iids = array();
             }
			$is=strpos(serialize($disable_num_iids),$item['num_iid']);
            if(empty($is)){
                    $disable_num_iids[] =array(
                    'num_iid'=>$item['num_iid'],
                    'rate'=>$item['commission_rate'],
                    'zc_id'=>$item['zc_id']
					); 
			 F('coupon/disable_num_iids', $disable_num_iids);
			 $data=array(
			 'last_time'=>time(),
			 'ding'=>0
			 );
			 $this->_mod->where(array(
                'num_iid' => $item['num_iid']
            ))->save($data);
			 }
		 }
        $this->assign('item', $item);
		$Now=time();
		$this->assign('uptime',$Now-$item['up_time']);
        $this->assign('items_list', $items);
        $this->assign('cate_list', $cate_list); // 分类
        $this->assign('desc', $desc);
        $this->display();
    }
    /**
     * 获取紧接着的下一级分类ID
     */
    public function ajax_getchilds()
    {
        $id = I('id', '', 'intval');
        $map = array(
            'pid' => $id,
            'status' => '1'
        );
        $return = M('items_cate')->field('id,name')
            ->where($map)
            ->select();
        if ($return) {
            $this->ajaxReturn(1, L('operation_success'), $return);
        } else {
            $this->ajaxReturn(0, L('operation_failure'));
        }
    }
}
function floattostr($val)
{
    preg_match("#^([\+\-]|)([0-9]*)(\.([0-9]*?)|)(0*)$#", trim($val), $o);
    return $o[1] . sprintf('%d', $o[2]) . ($o[3] != '.' ? $o[3] : '');
}
