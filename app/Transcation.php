<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    /**
     * The database table used by the model.
     * 定义模型对应数据表及主键
     * @var string
     */
    // protected $table = 'users';
    protected $table = 'tcl_transcation';
    protected $primaryKey ='id';

    /**
     * The attributes that are mass assignable.
     * 定义可批量赋值字段
     * @var array
     */
    protected $fillable = ['chance_id', 'deal_price', 'earnest', 'first_pay', 'last_pay', 'done_time', 'commission', 'commission_infact', 'commission_remark', 'violate', 'sale_card', 'trade_status', 'user_id'];

    /**
     * The attributes excluded from the model's JSON form.
     * //在模型数组或 JSON 显示中隐藏某些属性
     * @var array
     */
    protected $hidden = [];

    // 定义Transcation表与Chance表一对多关系
    public function belongsToChance(){

      return $this->belongsTo('App\Chance', 'chance_id', 'id');
    }

    // 定义Transcation表与User表一对多关系
    public function belongsToUser(){

      return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

