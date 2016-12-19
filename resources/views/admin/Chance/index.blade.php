@extends('layouts.main')

@section('head_content')
	<style type="text/css">
		
		.dropdown-menu::after, .dropdown-menu::before{
			top: -1px;
			left: 10px;
			border-right: 9px solid transparent;
			border-bottom: 9px solid #222 !important;
			border-left: 9px solid transparent;
			content: none;
		}

		.dropdown-menu{
			min-width:100%;
		}
	</style>
@endsection

@section('BreadcrumbTrail')
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{route('admin.index')}}">主页</a>  
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="javascript:void(0);">销售机会列表</a></li>
	</ul>
@endsection

@section('content')

@include('layouts.message')
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-content">
				<!-- <ul style="background: none repeat scroll 0 0 #eee;border: 0 none;border-radius: 0;box-shadow: none;color: #aaa;line-height: 34px; margin: 0;margin-bottom:5px;">
					<li style="display: inline-block;line-height: 20px;">
						<a class="btn btn-primary" href="{{route('admin.chance.create')}}">添加销售机会</a>
					</li>
					<li style="display: inline-block;line-height: 20px;">
						<a href="#" onclick="window.history.go(-1);return false;" class="btn ">返回</a>
					</li>
				</ul> -->
				<div class="page-tabs">
            		<ul class="nav nav-tabs">
            		  <!-- <li class="select_chance_status @if($chance_status_current == 1) active @endif" >
            		    <a href="javascript:void(0);" data-status="1">正常销售机会</a>
            		  </li>
            		  <li class="select_chance_status @if($chance_status_current == 2) active @endif">
            		    <a href="javascript:void(0);" data-status="2">待跟进销售机会</a>
            		  </li>
            		  <li class="select_chance_status @if($chance_status_current == 0) active @endif" >
            		    <a href="javascript:void(0);" data-status="0">已废弃销售机会</a>
            		  </li> -->
            		  <li style="display: inline-block;line-height:20px;">
						<a class="btn btn-success btn-search" href="javascript:void(0);"><i class="halflings-icon search"></i>搜索销售机会</a>
					<li style="display:inline-block;line-height:20px;">
						<a href="javascript:void(0);" onclick="window.history.go(-1);return false;" class="btn ">返回</a>
					</li>
            		</ul>
        		</div>

				<table  class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>车源信息</th>
							<th>求购信息</th>
							<th>状态</th>
							<th>车源负责人</th>
							<th>客源负责人</th>							
							<th>创建者</th>
							<th>创建时间</th>
							<th>所属门店</th>
							<th>操作</th>
						</tr>
					</thead> 
					<tbody>
						@foreach ($chances as $chance)
    					<tr>
							<td>{{$chance->belongsToUser->nick_name}}</td>
							<td>{{$chance->belongsToUser->nick_name}}</td>
							<td>{{$chance->belongsToUser->nick_name}}</td>							
							<td>{{$chance->belongsToUser->nick_name}}</td>
							<td>{{$chance->belongsToUser->nick_name}}</td>							
							<td>{{$chance->belongsToUser->nick_name}}</td>										
							<td>{{substr($chance->created_at, 0 ,10)}}</td>							
							<td>{{$chance->belongsToUser->nick_name}}</td>							
							<td>{{$chance->belongsToUser->nick_name}}</td>		
							<td class="center">
								<div class="btn-group">
									<span>
										<form action="{{route('admin.chance.create')}}" method="post" style="display: inherit;margin:0px;">
										    {{ csrf_field() }}
            								<input type="hidden" name="chance_id" value="{{$chance->id}}">
											<button class="btn btn-success" type="submit">
											<i class="icon-edit icon-white"></i> 匹配
											</button>
										</form>
									</span>
									<a class="btn btn-warning" href="{{route('admin.chance.show', ['chance'=>$chance->id])}}">
										<i class="icon-edit icon-white"></i> 详细信息
									</a>
								</div>
								<input id="current_chance_id" type="hidden" value="{{$chance->id}}">
							</td>
						</tr>
						@endforeach							
					</tbody>
				</table>
				<div class="pagination pagination-centered">
					 {!! $chances->links() !!}
				</div> 		
			</div>			
		</div>
	</div>
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>销售机会搜索</h3>
		</div>
		<div class="modal-body" style="max-height:none;">
			<form class="form-horizontal" id="condition" action="/admin/chance/index" method="post">
				{!! csrf_field() !!}
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="chance_code">销售机会编号</label>
						<div class="controls">
						  	<input class="input-xlarge focused" name="chance_code" id="chance_code" type="text" value="">
						</div>
					</div>		
					<div class="control-group  ">
            	    	<label class="control-label" for="chance_status">销售机会状态</label>
            	    	<div class="controls">
            	      		<select id="chance_status" name="chance_status" >
            	      			<option value='1'>正常</option>                                           
            	      		</select>
            	    	</div>
            	  	</div>				  
				</fieldset>
				<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">关闭</a>
			<button type="submit" class="btn btn-primary">搜索</button>
		</div>
			</form>				         
		</div>
		
	</div>
@endsection

@section('script_content')
<!-- 引入确认框js -->
<!-- <script src="{{URL::asset('js/tcl/confirm.js')}}"></script>  -->
<script>
	$(document).ready(function(){
	
		$('.pagination').children('li').children('a').click(function(){

			// alert($(this).attr('href'));
			$('#condition').attr('action', $(this).attr('href'));
			// alert($('#condition').attr('action'));
			$('#condition').submit();
			return false;
		});
	});
</script>
@endsection
