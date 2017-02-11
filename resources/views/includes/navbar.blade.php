		<nav class="navbar navbar-inverse navbar-fixed-top" role = "navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-ctrl">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="{{ route('dashboard') }}">Top Secret</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-collapse-ctrl">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="{{ route('blog') }}">Blog</a></li>
						<li><a href="{{ route('catalog') }}">Catalog</a></li>
						<li><a href="{{ route('forum.index') }}">Forum</a></li>
					</ul>

					<form class="navbar-form navbar-left" action="" method="post">
						<div class="form-group" >
							<input type="text" class="form-control" placeholder="Search">
						</div>
					</form>

					<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ route('register') }}">Sign in</a></li>
					@else
						<li class="active"><a href="{{URL::to('messages')}}"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Messages @include('messenger.unread-count')</a></li>

						<li class="dropdown">
							<a class="dropdown-toggle disabled img-fixed" data-toggle="dropdown" href="{{ route('account_real', ['username' => Auth::user()->username]) }}">
								<img src="{{ route('account.image', Auth::user()->username) }}" class="img-circle"> {{ Auth::user()->username }}
							</a>
							<a class="dropdown-toggle caret-fixed" data-toggle="dropdown"><b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li><a href="{{ route('account') }}">Settings</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{{ route('logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
