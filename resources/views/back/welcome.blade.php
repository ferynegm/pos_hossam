@extends('back.layouts.app')

@section('title')
    {{ trans('app.Home') }}
@endsection

@section('header')
	<link href="{{ url('back') }}/assets/css/semantic.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('footer')
	@if (session()->has('success_login'))
		<script>
			$(document).ready(function () {
				alertify.set('notifier','position', 'top-center');
				alertify.set('notifier','delay', 4);
				alertify.success("مرحبا ( {{ auth()->user()->name }} )");
			});
		</script>
	@endif
@endsection

@section('content')

	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<h4 class="mb-sm-0 font-size-18">
								
							</h4>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="card mini-stats-wid">
							<div class="card-body">
								<div class="d-flex">
									<div class="flex-grow-1">
										<p class="text-muted fw-medium" style="font-weight: bold;" style="font-weight: bold;">المديرين</p>
										<h4 class="mb-0">{{ $admins_count }}</h4>
									</div>

									<div class="flex-shrink-0 align-self-center">
										<div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
											<span class="avatar-title">
												<i class="fa fa-user-shield font-size-24"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card mini-stats-wid">
							<div class="card-body">
								<div class="d-flex">
									<div class="flex-grow-1">
										<p class="text-muted fw-medium" style="font-weight: bold;">المدرسون</p>
										<h4 class="mb-0">{{ $teachers_count }}</h4>
									</div>

									<div class="flex-shrink-0 align-self-center">
										<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
											<span class="avatar-title rounded-circle bg-primary">
												<i class="fa fa-users font-size-24"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card mini-stats-wid">
							<div class="card-body">
								<div class="d-flex">
									<div class="flex-grow-1">
										<p class="text-muted fw-medium" style="font-weight: bold;">المدونات</p>
										<h4 class="mb-0">{{ $blogs_count }}</h4>
									</div>

									<div class="flex-shrink-0 align-self-center">
										<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
											<span class="avatar-title rounded-circle bg-primary">
												<i class="fab fa-blogger-b font-size-24"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="card mini-stats-wid">
							<div class="card-body">
								<div class="d-flex">
									<div class="flex-grow-1">
										<p class="text-muted fw-medium" style="font-weight: bold;">الدورات</p>
										<h4 class="mb-0">{{ $courses_count }}</h4>
									</div>

									<div class="flex-shrink-0 align-self-center">
										<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
											<span class="avatar-title rounded-circle bg-primary">
												<i class="fas fa-book-open font-size-24"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="card mini-stats-wid">
							<div class="card-body">
								<div class="d-flex">
									<div class="flex-grow-1">
										<p class="text-muted fw-medium" style="font-weight: bold;">Faq</p>
										<h4 class="mb-0">{{ $faqs_count }}</h4>
									</div>
	
									<div class="flex-shrink-0 align-self-center">
										<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
											<span class="avatar-title rounded-circle bg-primary">
												<i class="fas fa-question-circle font-size-24"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title mb-4">أخر الدورات</h4>
								<div class="table-responsive">
									<table class="table table-bordered table-striped align-middle table-nowrap mb-0">
										<thead class="table-light">
											<tr>
												<th class="align-middle">اسم الدورة</th>
												<th class="align-middle">مدرس الدورة</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($courses as $course)
												<tr>
													<td>{{ $course->name }}</td>
													<td style='margin: 0px 5px;color: blue;font-weight: bold;'>{{ $course->teacher_name['name'] }}</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- end table-responsive -->
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title mb-4">أخر المدونات</h4>
								<div class="table-responsive">
									<table class="table table-bordered table-striped align-middle table-nowrap mb-0">
										<thead class="table-light">
											<tr>
												<th class="align-middle">عنوان المدونة</th>
												<th class="align-middle">كاتب المدونة</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($blogs as $blog)
												<tr>
													<td>{{ $blog->title }}</td>
													<td style='margin: 0px 5px;color: blue;font-weight: bold;'>{{ $blog->author_name['name'] }}</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- end table-responsive -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- Include Footer --}}
		@include('back.layouts.footer')      
	</div>	
@endsection

