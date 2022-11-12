@section('breadcrumbs')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>@yield('title')</h2>

            <div class="right-wrapper text-end">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>

                    <li><span>{{ request()->path() }}</span></li>

                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>
@endsection
