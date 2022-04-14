@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.footer-links.update',$footer_link)}}">
		@csrf
		@method("PUT")
		<div class="col-12 col-lg-8 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> تعديل رابط الفوتر
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
			
				<div class="col-12 col-lg-6 p-2">
					<div class="col-12">
						العنوان
					</div>
					<div class="col-12 pt-3">
						<input type="" name="title"  class="form-control" value="{{$footer_link->title}}" >
					</div>
				</div>
				<div class="col-12 col-lg-6 p-2">
					<div class="col-12">
						الرابط عربي
					</div>
					<div class="col-12 pt-3">
						<input type="" name="url"  class="form-control" value="{{$footer_link->url}}" >
					</div>
				</div>

			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">حفظ</button>
		</div> 
		</form>
	</div>
</div>
@endsection