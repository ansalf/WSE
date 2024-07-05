<?php 
  $menus = session()->get('menus');
?>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ asset('main/logo.png') }}">
            <img class="img-circle" width="80" src="{{ asset('main/logo.png') }}" alt="Logo WSE">
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ asset('main/icon.ico') }}">
            <img class="img-circle" width="50" src="{{ asset('main/icon.ico') }}" alt="Logo WSE">
        </a>
      </div>
      <ul class="sidebar-menu">        
        <button class="btn btn-primary" onclick="console.log({{$menus}})">tekan</button>
        @foreach ($menus as $item)
        @php
            $hasParentViewFeature = false;
            // Periksa jika `features` adalah array dan cari `featslug` dengan nilai 'view'
            if (count($item->features) > 0) {
                foreach ($item->features as $feature) {
                    if ($feature['featslug'] == 'view') {
                      foreach ($feature->permissions as $permission) {
                        if ($permission->permisfeatid == $feature->id) {
                          $hasParentViewFeature = $permission->hasaccess;
                          break;
                        }
                      }
                    }
                }
            }
        @endphp
        @if (count($item->children) == 0 && $hasParentViewFeature)
            <li class="{{ activeMenu($item->menunm) }}"><a class="nav-link" href="{{ route($item->menuroute) }}"><i class="fas fa-fire"></i><span>{{$item->menunm}}</span></a></li>
        @else
        @php
            $hasParentViewFeature = false;
            // Periksa jika `features` adalah array dan cari `featslug` dengan nilai 'view'
            if (count($item->features) > 0) {
                foreach ($item->features as $feature) {
                    if ($feature['featslug'] == 'view') {
                      foreach ($feature->permissions as $permission) {
                        if ($permission->permisfeatid == $feature->id) {
                          $hasParentViewFeature = $permission->hasaccess;
                          break;
                        }
                      }
                    }
                }
            }
        @endphp
        @if ($hasParentViewFeature)
        <li class="menu-header">{{$item->menunm}}</li>
        <li class="{{ activeMenu($item->menunm) }} dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>{{$item->menunm}}</span></a>
          <ul class="dropdown-menu">
            @if (!empty($item->children) && count($item->children) > 0)
            @foreach ($item->children as $child)
            @php
                $hasViewFeature = false;
                // Periksa jika `features` adalah array dan cari `featslug` dengan nilai 'view'
                if (count($child->features) > 0) {
                    foreach ($child->features as $feature) {
                        if ($feature['featslug'] == 'view') {
                          foreach ($feature->permissions as $permission) {
                            if ($permission->permisfeatid == $feature->id) {
                              $hasViewFeature = $permission->hasaccess;
                              break;
                            }
                          }
                        }
                    }
                }
            @endphp
            @if ($hasViewFeature)
                <li class="{{ activeMenu($child->menunm) }}">
                    <a class="nav-link" href="{{ route($child->menuroute) }}">
                        {{ $child->menunm }}
                    </a>
                </li>
            @endif
        @endforeach
            @endif
          </ul>
        </li>
        @endif
        @endif
        @endforeach
      </ul>    
    </aside>
  </div>