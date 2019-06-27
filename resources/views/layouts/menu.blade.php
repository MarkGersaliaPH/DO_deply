<li class="nav-item open">
   <a class="nav-link active" href="main.html">
<i class="nav-icon icon-speedometer"></i> Dashboard
<span class="badge badge-info">NEW</span>
</a>
</li>
<li class="nav-item {{ Request::is('admin/items*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('admin.items.index') !!}"><i class="nav-icon icon-screen-desktop"></i><span>Items</span></a>
</li> <li class="nav-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('admin.categories.index') !!}"><i class="nav-icon icon-cursor"></i><span>Categories</span></a>
</li>
<li class="nav-item {{ Request::is('admin/subCategories*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('admin.subCategories.index') !!}"><i class="nav-icon icon-cursor"></i><span>SubCategories</span></a>
</li> <li class="nav-item {{ Request::is('orders*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! route('orders.index') !!}"><i class="nav-icon icon-cursor"></i><span>Orders</span></a>
</li>
