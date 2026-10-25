<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
     data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
     data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
     data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
    <!--begin::Menu-->
    <div
        class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
        id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
        @foreach(ADMIN_MENU() as $menu)
            @if(isset($menu["children"]))
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-2">
                            {!! file_get_contents(public_path('img/' . $menu['icon'])) !!}
                        </span>
                    </span>
                    <span class="menu-title">{{__('app.' .  $menu["name"])}}</span>
                    <span class="menu-arrow"></span>
                </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @for($i = 0;$i < count($menu["children"]);$i++)
                            <div class="menu-item">
                                <a class="menu-link py-3"
                                   href="{{route('admin.'.$menu["children"][$i].'.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                    <span class="menu-title">{{__('app.' . $menu["children"][$i])}}</span>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            @else
                <div class="menu-item">

                    <a class="menu-link py-3"
                       href="{{route('admin.'.$menu["name"].'.index')}}">

                        <span class="menu-bullet">
                            <span class="">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2 ps-2">
                                         {!! file_get_contents(public_path('img/' . $menu['icon'])) !!}
                                    </span>
                                </span>
                            </span>
                        </span>
                        <span class="menu-title ps-3">{{__('app.' .  $menu["name"])}}</span>
                    </a>
                </div>
            @endif
        @endforeach


    </div>
</div>

