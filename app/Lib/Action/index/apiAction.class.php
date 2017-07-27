<?php
import("@.ORG.Snoopy");
vendor('taobao.TopSdk');
set_time_limit(0);

class apiAction extends FirstendAction
{
    private $accessKey = '';
    
    public function _initialize()
    {
        parent::_initialize();
        //域名验证
        $this->accessKey = C('yh_gongju');
    }

public function tool_caiji()
    {
	    $num = I('num', 20);
        $key = I('key', '', 'trim');
        if(!$key || $key != $this->accessKey){
            $json = array(
                'data'=>array(),
                'result'=>array(),
                'state'=>'no',
                'msg'=>'通信密钥错误'
            );
            exit(json_encode($json));
        }
		
        $file = FTX_DATA_PATH.'start.txt';
        if(!file_exists($file)){
            return false;
        }
        
        $startId = file_get_contents($file);
        
        if(!$startId){
            $startId = 0;
        }
        $map['start'] = $startId;
        $map['pagesize'] = $num;
        $map['key'] = $this->accessKey;
        $url = 'http://ap.tuiquanke.com:307/api/get_tbitems_new?'.http_build_query($map);
        $content = file_get_contents($url);
        $json = json_decode($content, true);
		$PID= $json['pid'];
		 $json = $json['result'];
		 $count=count($json);
        if($count>0){
            foreach ($json as $key => $val) {
                $raw = array(
                    'link'=>$val['link'],
                    'pic_url'=>$val['pic_url'],
                    'title'=>$val['title'],
                    'tags'=>$val['tags'],
                    'coupon_start_time'=>$val['coupon_start_time'],
                    'coupon_end_time'=>$val['coupon_end_time'],
                    'ali_id'=>$val['ali_id'],
                    'cate_id'=>$val['cate_id'],
                    'shop_name'=>$val['shop_name'],
                    'shop_type'=>$val['shop_type'],
                    'ems'=>$val['ems'],
                    'num_iid'=>$val['num_iid'],
                    'volume'=>$val['volume'],
                    'commission'=>$val['commission'],
                    'commission_rate'=>$val['commission_rate'],
                    'tk_commission_rate'=>$val['tk_commission_rate'],
                    'sellerId'=>$val['sellerId'],
                    'nick'=>$val['nick'],
                    'hits'=>0,
                    'price'=>$val['price'],
                    'coupon_price'=>$val['coupon_price'],
                    'coupon_rate'=>$val['coupon_rate'],
                    'coupon_type'=>$val['coupon_type'],
                    'intro'=>$val['intro'],
                    'desc'=>$val['desc'],
                    'isq'=>'1',
                    'zc_id'=>$val['zc_id'],
                    'quan'=>$val['quan'],
                    'Quan_id'=>$val['Quan_id'],
                    'Quan_surplus'=>$val['Quan_surplus'],
                    'Quan_receive'=>$val['Quan_receive'],
                    'is_commend'=>$val['is_commend']?$val['is_commend']:0
                );
                
                $raw['recid'] = 1;
				$raw['quanurl']='https://uland.taobao.com/coupon/edetail?activityId='.$val['Quan_id'].'&itemId='.$val['num_iid'].'&pid='. $PID .'&shareurl=true&app=chrome';
               $res= $this->_ajax_yh_publish_insert($raw);
               $startId = $val['up_time'];
            }
          file_put_contents($file, $startId);
			$json = array(
                'data'=>array(),
                'total'=>$count,
                'result'=>array(),
                'state'=>'yes',
                'msg'=>'正常'
            );
			
        }else{
        	
        	$json = array(
                'data'=>array(),
                'total'=>0,
                'result'=>array(),
                'state'=>'yes',
                'msg'=>'商品采集完啦！'
            );
		
        }

       exit(json_encode($json));

    }

    
    private function _ajax_yh_publish_insert($item)
    {
        $result = D('items')->ajax_yh_publish($item);
        return $result;
    }
    
    public function get_items()
    {
        $num = I('num', 20);
        
        $key = I('key', '', 'trim');
        
        if(!$key || $key != $this->accessKey){
            $json = array(
                'data'=>array(),
                'result'=>array(),
                'state'=>'no',
                'msg'=>'通信密钥错误'
            );
            exit(json_encode($json));
        }
        
        //$this->items_caiji($num);
        
        $model = M('items');
    
        $where = array(
            'status'=>'underway',
            'tuisong'=>array('neq', '1'),
            'pass'=>1
        );
        
        $list = $model->field('num_iid,commission_rate,tk_commission_rate,Quan_id')->where($where)->order('rand()')->limit($num)->select();
    
        if(count($list) > 0){
    
            $result = array();
    
            foreach ($list as $k=>$item)
            {
                $result[$k]['num_iid'] = $item['num_iid'];
                $result[$k]['event_rate'] = intval($item['commission_rate']/100);
                $result[$k]['tk_rate'] = intval($item['tk_commission_rate']/100);
                $result[$k]['quan_id'] = $item['Quan_id'];
            }
    
            $json = array(
                'data'=>array(),
                'total'=>count($list),
                'result'=>$result,
                'state'=>'yes',
                'msg'=>'正常'
            );
            
            $json['taobao_appkey'] = C('yh_taobao_appkey');
            $json['taobao_appsecret'] = C('yh_taobao_appsecret');
        }
        else{
            $json = array(
                'data'=>array(),
                'total'=>0,
                'result'=>array(),
                'state'=>'no',
                'msg'=>'商品数量不足'
            );
        }
        
        exit(json_encode($json));
    }
    
    public function save_items()
    {
        set_time_limit(0);
        $content = stripslashes(I('data', '', 'trim'));
		$key=I('key', '', 'trim');
	    $content= trim($content,chr(239).chr(187).chr(191));
		
		F('data',$content);
		
        $json = json_decode($content,true);
        if(!$key || $key != $this->accessKey){
            $json = array(
                'data'=>array(),
                'result'=>array(),
                'state'=>'key',
                'msg'=>'通信密钥错误'
            );
            exit(json_encode($json));
        }
        $result = $json['datalist'];
		
        $model = M('items');
        
        $error = '';
    
        foreach ($result as $item){
            $where = array(
                'num_iid'=>$item['num_id']
            );
            if($item['state'] == 'yes'){
                $data = array(
                    'quanshorturl'=>$item['shorturl'],
                    'quanurl'=>$item['quanurl'],
                    'quankouling'=>$item['kouling'],
                    'click_url'=>$item['shorturl'],
                    'tuisong'=>1
                );
				

                $model->where($where)->save($data);
				//Log::write('调试的SQL：'.$model->getLastSql(), Log::SQL);
				
                if($model->getError()){
                    $error = $model->getError();
                }
                elseif($model->getDbError()){
                    $error = $model->getDbError();
                }
            }
            else{
                $model->where($where)->delete();
            }
        }
        
        $json = array(
            'data'=>array(),
            'result'=>array(),
            'state'=>'yes',
            'msg'=>$error
        );
        
        exit(json_encode($json));
    }


public function disabled()
 {
 	    $key=I('key', '', 'trim');
        if(!$key || $key != $this->accessKey){
            $json = array(
                'state'=>'key',
                'msg'=>'通信密钥错误'
            );
            exit(json_encode($json));
        }
        $disable_num_iids = F('coupon/disable_num_iids');
        if(!$disable_num_iids){
            $disable_num_iids = array();
        }
		 F('coupon/disable_num_iids',null);
        $this->_api($disable_num_iids, 'yes');
}
    
    public function del_items()
    {
        $key=I('key', '', 'trim');
        
        if(!$key || $key != $this->accessKey){
            $json = array(
                'data'=>array(),
                'result'=>array(),
                'state'=>'key',
                'msg'=>'通信密钥错误'
            );
            exit(json_encode($json));
        } 
		
        $itemId = I('itemId', '', 'trim');
        
        if(!is_array($itemId)){
            $itemId = array_filter(explode(',', $itemId));
        }
        
        if(count($itemId) == 0){
            $json = array(
                'data'=>array(),
                'result'=>array(),
                'state'=>'no',
                'msg'=>'商品ID不能为空'
            );
            
            exit(json_encode($json));
        }
        
        $model = M('items');
        
        $where = array(
            'num_iid'=>array('in', $itemId)
        );
        
        $model->where($where)->delete();
        
        $json = array(
            'data'=>array(),
            'result'=>array(),
            'state'=>'yes',
            'msg'=>''
        );
        
        exit(json_encode($json));
    }


public function change_items()
    {
        $key=I('key', '', 'trim');
        if(!$key || $key != $this->accessKey){
            $json = array(
                'data'=>array(),
                'result'=>array(),
                'state'=>'key',
                'msg'=>'通信密钥错误'
            );
            exit(json_encode($json));
        }
        $itemId = I('itemId', '', 'trim');
        if(!is_array($itemId)){
            $itemId = array_filter(explode(',', $itemId));
        }
        
        if(count($itemId) == 0){
            $json = array(
                'data'=>array(),
                'result'=>array(),
                'state'=>'no',
                'msg'=>'商品ID不能为空'
            );
            
            exit(json_encode($json));
        }
        
        $model = M('items');
//      $where = array(
//          'num_iid'=>array('in', $itemId)
//      );
		$data=array(
		'ding'=>1,
		'last_time'=>time()
		);
        $model->where('to_days(last_time) <> to_days(now()) and num_iid in('.$itemId.')')->save($data);
        $json = array(
            'data'=>array(),
            'result'=>array(),
            'state'=>'yes',
            'msg'=>''
         );
        exit(json_encode($json));
    }

  protected function _api($data = array(), $state = 'yes', $msg = '')
    {
        $result = array(
            'data'=>$data,
            'state'=>$state,
            'msg'=>$msg
        );
        
        exit(json_encode($result));
    }


}


