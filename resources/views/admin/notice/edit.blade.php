@extends('layouts.main')

<!-- 面包屑 -->
@section('BreadcrumbTrail')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="/admin">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li>
		<i class="icon-home"></i>
		<a href="{{route('admin.shop.index')}}">门店管理</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#1f">修改门店</a></li>
</ul>
@endsection

<!-- 主体 -->
@section('content')

@include('layouts.message')

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-content">
			<form class="form-horizontal" action="{{route('admin.shop.update', ['shop'=>$shop_info->id])}}" method="post">
				{!! csrf_field() !!}
				{{ method_field('PUT') }}
				<fieldset>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">门店名称</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="name" name="name" type="text" value="{{$shop_info->name}}">
					</div>
				  </div>
				  <!-- <div class="control-group">
				  					<label class="control-label">上级门店</label>
				  					<div class="controls">
				  					  <span class="input-xlarge uneditable-input">淘车乐总公司</span>
				  					  <input type="hidden" id="PID" name="PID" value="1"/>
				  					</div>
				  </div> -->
				    <!-- <div id="dept_view"  class="alert alert-error" style="display:none">
				    						<button class="close" data-dismiss="alert" type="button">×</button>
				    						<strong>上级门店不能为空!</strong> 请返回选择.
				    					</div> -->
				<div class="control-group">
					<label class="control-label" for="selectError3">是否启用</label>
					<div class="controls">
					  <select id="status" name="status" data-rel="chosen">
					  	<option @if($shop_info->status == '1') selected @endif  value="1">启用</option>
						<option @if($shop_info->status == '0') selected @endif  value="0">停用</option>						
						</select>
					</div>
				  </div>
				<div class="control-group">
					<label class="control-label" for="selectError3">门店类别</label>
					<div class="controls">
					  <select id="type" name="type" data-rel="chosen">
					  	<option @if($shop_info->type == '1') selected @endif  value="1">门店</option>
					  	<option @if($shop_info->type == '2') selected @endif  value="2">加盟店</option>
						</select>
					</div>
				</div>	
				<div class="control-group">
					<label class="control-label" for="selectError3">所属省份</label>
					<div class="controls">
					  <select id="provence_id" name="provence_id" data-rel="chosen">
					  	<option @if($shop_info->provence_id == '1') selected @endif  value="1">河北</option>
					  	<option @if($shop_info->provence_id == '2') selected @endif  value="2">河南</option>
						</select>
					</div>					
				</div>	
				<div class="control-group">
					<label class="control-label" for="selectError3">所属城市</label>
					<div class="controls">
					  <select id="city_id" name="city_id" data-rel="chosen">
					  	<option @if($shop_info->city_id == '1') selected @endif  value="1">石家庄</option>
					  	<option @if($shop_info->city_id == '2') selected @endif value="2">郑州</option>
						</select>
					</div>					
				</div>		  
				<div class="control-group">
					<label class="control-label" for="focusedInput">地址</label>
					<div class="controls">
						<textarea id="address" name="address" class="autogrow">{{$shop_info->address}}</textarea>
					</div>
				  </div>

				   <!-- <div class="control-group">
				   					<label class="control-label" for="focusedInput">手机号</label>
				   					<div class="controls">
				   					  <input class="input-xlarge focused" id="mobile" name="mobile" type="text" value="">
				   					</div>
				   				  </div> -->

				  <div class="control-group">
				  		<label class="control-label" for="focusedInput">联系电话</label>
				  		<div class="controls">
				  			<input class="input-xlarge focused" id="telephone" name="telephone" type="text" value="{{$shop_info->telephone}}">
				  		</div>
				  </div>

				   <div class="control-group">
					<label class="control-label" for="focusedInput">QQ号</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="qq_number" name="qq_number" type="text" value="{{$shop_info->qq_number}}">
					</div>
				  </div>

				   <div class="control-group">
					<label class="control-label" for="focusedInput">微信公共号</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="wx_number" name="wx_number" type="text" value="{{$shop_info->wx_number}}">
					</div>
				  </div>

				   <div class="control-group">
					<label class="control-label" for="focusedInput">常用邮箱</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="email" name="email" type="text" value="{{$shop_info->email}}">
					</div>
				  </div>				
				  <div class="form-actions">
				  	<input type="hidden" name="shop_id" value="{{$shop_info->id}}" />
					<button type="submit" class="btn btn-primary">确定</button>
					<button class="btn">返回</button>
				  </div>
				</fieldset>
			</form>				
		</div>
	</div>			
</div>   
@endsection