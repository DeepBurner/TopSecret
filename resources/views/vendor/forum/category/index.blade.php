{{-- $category is passed as NULL to the master layout view to prevent it from showing in the breadcrumbs --}}
@extends ('forum::master', ['category' => null])

@section ('content')
    @can ('createCategories')
        @include ('forum::category.partials.form-create')
    @endcan

    @foreach ($categories as $category)
		<div class="panel panel-default">
			<div class="panel-heading panel-heading-forum">
				{{$category->title}}
			</div>
			<div class="panel-body panel-body-forum">
				@foreach ($category->children as $subcategory)
					<div class="col-md-6 forum-col">
						<div class="media">
							<div class="media-left">
								<a href="{{ Forum::route('category.show', $subcategory) }}">
									<img class="media-object forum-icon" src="{{URL::asset('themes/simurg/img/forum-icon.png')}}" alt="img">
								</a>
							</div>
							<div class="media-body">
								<a href="{{ Forum::route('category.show', $subcategory) }}">
									<h4 class="media-heading">{{$subcategory->title}}</h4>
								</a>
								{{$subcategory->description}}
							</div>
						</div>
					</div>
					<div class="col-md-2 forum-prop">
						<div class="forum-topics">{{$subcategory->thread_count}}</br>Threads</div>
					</div>
					<div class="col-md-2 forum-prop">
						<div class="forum-topics">{{$subcategory->post_count}}</br>Posts</div>
					</div>
					<div class="col-md-2 forum-prop">
						<div class="forum-topics">No new topics</div>
					</div>
					@if ($subcategory != $category->children->last())
						<div class="col-md-12">
							<hr class="forum-divider">
						</div>
					@endif
				
                @endforeach
				@if ($category->children->isEmpty())
					<div class="forum-empty">No categories found</div>
				@endif
			</div>
		</div>
	
        
    @endforeach
@stop
