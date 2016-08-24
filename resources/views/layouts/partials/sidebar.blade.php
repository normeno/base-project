<aside class="main-sidebar">

    <section class="sidebar">

        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <li class="treeview">
                <ul class="treeview-menu"></ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

@push('scripts')
<script type="text/javascript">
    $.get( "{{ route('api.menus') }}",
            {
                csrf_token: $('[name="csrf_token"]').attr('content')
            }
    ).done(function( data ) {

        var html = '';

        $.each( data, function( key, value ) {

            if (!value.menu_id && typeof value.childs === 'undefined') { alert('admin.administrator');
                html += '<li><a href="' + value.route + '"><i class="fa fa-'+value.font+'"></i> <span>' + Lang.get(value.name) + '</span></a></li>';
            } else if (!value.menu_id && typeof value.childs !== 'undefined') {
                html += '<li class="treeview">' +
                        '<a href="#">' +
                        '<i class="fa fa-'+value.font+'"></i>' +
                        '<span>' + value.name + '</span>' +
                        '<i class="fa fa-angle-left pull-right"></i>' +
                        '</a>' +
                        '<ul class="treeview-menu" id="ul-menu-' + value.id + '">';

                $.each( value.childs, function( k, v ) {
                    html += '<li><a href="' + v.route + '">'+v.name+'</a></li>';
                });

                html += '</ul></li>';
            }
        });

        $(".sidebar-menu").append(html);
    });
</script>
@endpush