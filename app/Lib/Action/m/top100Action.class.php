<?php
class top100Action extends FirstendAction
{

    public function _initialize()
    {
        parent::_initialize();
        $this->_mod = D('items')->cache(true, 5 * 60);
        $this->_cate_mod = D('items_cate')->cache(true, 10 * 60);
        C('DATA_CACHE_TIME', C('yh_site_cachetime'));
    }

    /**
     * * 首页（全部）
     */
    public function index()
    {
        $p = I('p', 1, 'intval'); // 页码
        $sort = I('sort', 'new', 'trim'); // 排序
        $status = I('status', 'all', 'trim'); // 排序
        
        if (C('yh_site_cache')) {
            if (false === $tomorr_item = S($file)) {
                $tomorr_item = $this->_mod->where($tomorr_wh)->order('volume DESC,ordid asc')->limit(100)->count();
                S($file, $tomorr_item);
            }
        } else {
            $tomorr_item = $this->_mod->where($tomorr_wh)->order('volume DESC,ordid asc')->limit(100)->count();
        }
        
        if (C('yh_site_cache')) {
            if (false === $today_item = S($file)) {
                $today_item = $this->_mod->where($today_wh)->count();
                S($file, $today_item);
            }
        } else {
            $today_item = $this->_mod->where($today_wh)->count();
        }
        $this->assign('tomorr_item', $tomorr_item);
        $this->assign('today_item', $today_item);
        
        $order = 'volume DESC,ordid asc';
        switch ($sort) {
            case 'new':
                $order .= ', coupon_start_time DESC';
                break;
            case 'price':
                $order .= ', price DESC';
                break;
            case 'rate':
                $order .= ', coupon_rate ASC';
                break;
            case 'hot':
                $order .= ', volume DESC';
                break;
            case 'default':
                $order .= ', ' . C('yh_index_sort');
        }
        
        switch ($status) {
            case 'all':
                $where['status'] = "underway";
                break;
            case 'underway':
                $where['status'] = "underway";
                break;
            case 'sellout':
                $where['status'] = "sellout";
                break;
        }
        
        if (C('yh_index_shop_type')) {
            $where['shop_type'] = C('yh_index_shop_type');
        }
        if (C('yh_index_mix_price') > 0) {
            $where['coupon_price'] = array(
                'egt',
                C('yh_index_mix_price')
            );
        }
        if (C('yh_index_max_price') > 0) {
            $where['coupon_price'] = array(
                'elt',
                C('yh_index_max_price')
            );
        }
        if (C('yh_index_mix_price') > 0 && C('yh_index_max_price') > 0) {
            $where['coupon_price'] = array(
                array(
                    'egt',
                    C('yh_index_mix_price')
                ),
                array(
                    'elt',
                    C('yh_index_max_price')
                ),
                'and'
            );
        }
        if (C('yh_index_mix_volume') > 0) {
            $where['volume'] = array(
                'egt',
                C('yh_index_mix_volume')
            );
        }
        if (C('yh_index_max_volume') > 0) {
            $where['volume'] = array(
                'elt',
                C('yh_index_max_volume')
            );
        }
        if (C('yh_index_mix_volume') > 0 && C('yh_index_max_volume') > 0) {
            $where['volume'] = array(
                array(
                    'egt',
                    C('yh_index_mix_volume')
                ),
                array(
                    'elt',
                    C('yh_index_max_volume')
                ),
                'and'
            );
        }
        
        $index_info['sort'] = $sort;
        $index_info['status'] = $status;
        $page_size = C('yh_index_page_size');
        $index_info['p'] = $p;
        
        $start = $page_size * ($p - 1);
        
        $page_size = 100;
        $start = 0;
        
        if (false === $top100 = F('top100')) {
            $top100 = D('items_cate')->cate_cache();
        }
        $this->assign('cate_list', $top100); // 分类
        
        $mdarray = $where;
        $mdarray['sort'] = $sort;
        $mdarray['status'] = $status;
        $mdarray['order'] = $order;
        $mdarray['p'] = $p;
        $md_id = md5(implode("-", $mdarray));
        $file = 'top100_' . $md_id;
        
        if (C('yh_site_cache')) {
            if (false === $items = S($file)) {
                $items_list = $this->_mod->where($where)
                    ->order($order)
                    ->limit($start . ',' . $page_size)
                    ->select();
                $items = array();
                $seller_arr = array();
                $sellers = '';
                foreach ($items_list as $key => $val) {
                    $items['item_list'][$key] = $val;
                    $items['item_list'][$key]['class'] = $this->_mod->status($val['status'], $val['coupon_start_time'], $val['coupon_end_time']);
                    $items['item_list'][$key]['zk'] = round(($val['coupon_price'] / $val['price']) * 10, 1);
                    if (! $val['click_url']) {
                        $items['item_list'][$key]['click_url'] = U('jump/index', array(
                            'id' => $val['id']
                        ));
                    }
                    if ($val['coupon_start_time'] > time()) {
                        $items['item_list'][$key]['click_url'] = U('item/index', array(
                            'id' => $val['id']
                        ));
                        $items['item_list'][$key]['timeleft'] = $val['coupon_start_time'] - time();
                    } else {
                        $items['item_list'][$key]['timeleft'] = $val['coupon_end_time'] - time();
                    }
                    $items['item_list'][$key]['cate_name'] = $top100['p'][$val['cate_id']]['name'];
                    $url = C('yh_site_url') . U('item/index', array(
                        'id' => $val['id']
                    ));
                    $items['item_list'][$key]['url'] = urlencode($url);
                    $items['item_list'][$key]['urltitle'] = urlencode($val['title']);
                    $items['item_list'][$key]['price'] = number_format($val['price'], 1);
                    $items['item_list'][$key]['coupon_price'] = number_format($val['coupon_price'], 1);
                    if ($val['sellerId']) {
                        $items['seller_arr'][] = $val['sellerId'];
                    }
                }
                S($file, $items);
            }
        } else {
            $items_list = $this->_mod->where($where)
                ->order($order)
                ->limit($start . ',' . $page_size)
                ->select();
            $items = array();
            $seller_arr = array();
            $sellers = '';
            foreach ($items_list as $key => $val) {
                $items['item_list'][$key] = $val;
                $items['item_list'][$key]['class'] = $this->_mod->status($val['status'], $val['coupon_start_time'], $val['coupon_end_time']);
                $items['item_list'][$key]['zk'] = round(($val['coupon_price'] / $val['price']) * 10, 1);
                if (! $val['click_url']) {
                    $items['item_list'][$key]['click_url'] = U('jump/index', array(
                        'id' => $val['id']
                    ));
                }
                if ($val['coupon_start_time'] > time()) {
                    $items['item_list'][$key]['click_url'] = U('item/index', array(
                        'id' => $val['id']
                    ));
                    $items['item_list'][$key]['timeleft'] = $val['coupon_start_time'] - time();
                } else {
                    $items['item_list'][$key]['timeleft'] = $val['coupon_end_time'] - time();
                }
                $items['item_list'][$key]['cate_name'] = $top100['p'][$val['cate_id']]['name'];
                $url = C('yh_site_url') . U('item/index', array(
                    'id' => $val['id']
                ));
                $items['item_list'][$key]['url'] = urlencode($url);
                $items['item_list'][$key]['urltitle'] = urlencode($val['title']);
                $items['item_list'][$key]['price'] = number_format($val['price'], 1);
                $items['item_list'][$key]['coupon_price'] = number_format($val['coupon_price'], 1);
                if ($val['sellerId']) {
                    $items['seller_arr'][] = $val['sellerId'];
                }
            }
        }
        
      /*  $seller_arr = array_unique($items['seller_arr']);
        $sellers = implode(",", $seller_arr);
        if (IS_AJAX) {
            if (! $items) {
                $this->ajaxReturn(0, '加载完成');
            }
            $this->assign('items_list', $items['item_list']);
            $resp = $this->fetch('ajax');
            $this->ajaxReturn(1, '', $resp);
        }
	 	*/
        
        $this->assign('items_list', $items['item_list']);
        $this->assign('index_info', $index_info);

        
        if (C('yh_site_cache')) {
            $file = 'top100';
            if (false === $count = S($file)) {
                $count = $this->_mod->where($where)->count();
                S($file, $count);
            }
        } else {
            $count = $this->_mod->where($where)->count();
        }
        
        /*  $map['isq'] = 1;
        $map['Quan_id'] = array(
            'neq',
            ''
        );
        $map['quan_rq'] = '1';
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
        if (! $orlike) {
            unset($map['quan_rq']);
            $orlike = $this->_mod->where($map)
                ->limit('0,30')
                ->order('id desc')
                ->getField('num_iid,Quan_id');
        }
        foreach ($orlike as $key => $val) {
            $quanarr = $quanarr . "'" . $key . '-' . $val . "',";
        }
        $quanarr = rtrim($quanarr, ",");
        $quanarr = "var arr=[$quanarr];";
        $this->assign('quanarr', $quanarr);
		*/
        
        $pager = $this->_pager(100, 100);
        $this->assign('page', $pager->kshow());
        $this->assign('zpage', $pager->zshow());
        $this->assign('page', '');
        $this->assign('zpage', '');
        $this->assign('total_item', $count);
        
        $this->assign('pager', 'index');
        $this->assign('ajaxurl', U('index/index', array(
            'p' => $index_info['p'],
            'sort' => $index_info['sort']
        )));
        $this->assign('nav_curr', 'top100');
        $this->_config_seo(C('yh_seo_config.top100'));
        $this->display();
    }

    public function shortcut()
    {
        $Shortcut = "[InternetShortcut]
		URL=" . C('yh_site_url') . "
		IDList=
		[{000214A0-0000-0000-C000-000000000046}]
		Prop3=19,2
		";
        Header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . C('yh_site_name') . ".url;");
        echo $Shortcut;
    }
}