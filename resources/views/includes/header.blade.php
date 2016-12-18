
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('dashboard') }}">Top Secret</a>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="#">Catalog</a></li>
                    <li><a href="#">Send Feedback</a></li>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" action="" method="post">
                    <div class="form-group" >
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="#">Sign in</a></li>
                    @else
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                        <li><a href="{{ route('account_real') }}">{{ Auth::user()->username }}</a></li>
                    @endif

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>