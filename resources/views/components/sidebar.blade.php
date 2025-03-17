<ul class="main-menu">
    <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('dashboard') }}"
                        class="side-menu__item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="bx
                        bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <li
                    class="slide has-sub {{ request()->is('funding') || request()->is('p2p') || request()->is('claim') || request()->is('transfer') ? 'open' : '' }}">
                    <a href="javascript:void(0);"
                        class="side-menu__item {{ request()->is('funding') || request()->is('p2p') || request()->is('claim') || request()->is('transfer') ? 'active' : '' }}">
                        <i class="bx bx-wallet side-menu__icon"></i> <box-icon type='solid' name='wallet'></box-icon>
                        <span class="side-menu__label">Wallet</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>

                    <ul class="slide-menu child1">
                        <li class="slide">
                            <a href="{{ route('funding') }}"
                                class="side-menu__item {{ request()->is('funding') ? 'active' : '' }}">Funding</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('p2p') }}"
                                class="side-menu__item {{ request()->is('p2p') ? 'active' : '' }}">P2P
                            </a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('claim') }}"
                                class="side-menu__item {{ request()->is('claim') ? 'active' : '' }}">Claim Bonus
                            </a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('transfer') }}"
                                class="side-menu__item {{ request()->is('transfer') ? 'active' : '' }}">Transfer</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                <!-- Start::slide -->
                <li
                    class="slide has-sub {{ request()->is('nin') || request()->is('nin2') || request()->is('nin-phone') || request()->is('bvn') || request()->is('bvn2') || request()->is('nin-track') ? 'open' : '' }}">
                    <a href="javascript:void(0);"
                        class="side-menu__item {{ request()->is('nin') || request()->is('nin2') || request()->is('nin-phone') || request()->is('bvn') || request()->is('bvn2') || request()->is('nin-track') ? 'active' : '' }}">
                        <i class="bx bx-fingerprint side-menu__icon"></i>
                        <span class="side-menu__label">Identity</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li
                            class="slide has-sub {{ request()->is('nin') || request()->is('nin-phone') || request()->is('nin-track') ? 'open' : '' }}">
                            <a href="javascript:void(0);"
                                class="side-menu__item {{ request()->is('nin') || request()->is('nin-phone') || request()->is('nin-track') ? 'active' : '' }}">
                                NIN
                                Verification <i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('nin') }}"
                                        class="side-menu__item {{ request()->is('nin') ? 'active' : '' }}"> Verify
                                        NIN using NIN</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('nin-phone') }}"
                                        class="side-menu__item {{ request()->is('nin-phone') ? 'active' : '' }}">Verify
                                        NIN using Phone No
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('nin-track') }}"
                                        class="side-menu__item {{ request()->is('nin-track') ? 'active' : '' }}">Verify
                                        NIN using Tracking No
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub {{ request()->is('nin2') ? 'open' : '' }}">
                            <a href="javascript:void(0);"
                                class="side-menu__item {{ request()->is('nin2') ? 'active' : '' }}">
                                NIN
                                Verification V2 <i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('nin2') }}"
                                        class="side-menu__item {{ request()->is('nin2') ? 'active' : '' }}"> Verify
                                        NIN using NIN</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub {{ request()->is('bvn') ? 'open' : '' }}">
                            <a href="javascript:void(0);"
                                class="side-menu__item {{ request()->is('bvn') ? 'active' : '' }}">BVN Verification
                                <i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('bvn') }}"
                                        class="side-menu__item {{ request()->is('bvn') ? 'active' : '' }}">Verify
                                        BVN</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub {{ request()->is('bvn2') ? 'open' : '' }}">
                            <a href="javascript:void(0);"
                                class="side-menu__item {{ request()->is('bvn') ? 'active' : '' }}">BVN Verification V2
                                <i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('bvn2') }}"
                                        class="side-menu__item {{ request()->is('bvn2') ? 'active' : '' }}">Verify
                                        BVN</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                <!-- Start::slide -->
                <li
                    class="slide has-sub {{ request()->is('airtime') || request()->is('data') || request()->is('sme-data') || request()->is('tv') ? 'open' : '' }}">
                    <a href="javascript:void(0);"
                        class="side-menu__item {{ request()->is('airtime') || request()->is('data') || request()->is('sme-data') || request()->is('tv') ? 'active' : '' }}">
                        <i class="bx bx-task side-menu__icon"></i>
                        <span class="side-menu__label">Utilities</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide">
                            <a href="{{ route('airtime') }}"
                                class="side-menu__item {{ request()->is('airtime') ? 'active' : '' }}">Airtime</a>
                        </li>
                        <li class="slide">

                        <li
                            class="slide has-sub {{ request()->is('data') || request()->is('sme-data') ? 'open' : '' }}">
                            <a href="javascript:void(0);"
                                class="side-menu__item {{ request()->is('data') || request()->is('sme-data') ? 'active' : '' }}">
                                Data Top-up<i class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('data') }}"
                                        class="side-menu__item {{ request()->is('data') ? 'active' : '' }}">Data
                                        Bundle</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('sme-data') }}"
                                        class="side-menu__item {{ request()->is('sme-data') ? 'active' : '' }}">SME
                                        Data Bundle</a>
                                </li>
                            </ul>
                        </li>

                        <li class="slide">
                            <a href="#" onclick="return confirm('Comming soon!');"
                                class="side-menu__item {{ request()->is('tv') }}">TV
                                Subscriptions
                            </a>
                        </li>
                        <li class="slide">
                            <a href="#" onclick="return confirm('Comming Soon')"
                                class="side-menu__item">Electric Bills
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a href="#" onclick="return confirm('Comming Soon !');"
                        class="side-menu__item {{ request()->is('education') ? 'active' : '' }}">
                        <i class="bx bx-user-pin side-menu__icon"></i>
                        <span class="side-menu__label">Educational Pin</span>
                    </a>
                </li>
                </li>
   <!-- Start::slide -->
   @if(Auth::user()->role == 'agent')
   <li class="slide has-sub @if($menu == 'agency') open @endif">
      <a href="javascript:void(0);" class="side-menu__item @if($menu == 'agency') active @endif">
      <i class="bx bx-user-plus side-menu__icon"></i>
      <span class="side-menu__label">Agent Services </span>
      <i class="fe fe-chevron-right side-menu__angle"></i>
      </a>
      <ul class="slide-menu child1">
           <li class="slide">
            <a href="{{route('nin-services')}}" class="side-menu__item  @if($title == 'nin-services') active @endif">NIN Services </a>
         </li>
           <li class="slide">
            <a href="{{route('vnin-to-nibss')}}" class="side-menu__item  @if($title == 'vnin-to-nibss') active @endif">VNIN to NIBSS </a>
         </li>
          <li class="slide">
            <a href="{{route('bvn-modification')}}" class="side-menu__item  @if($title == 'bvn-mod') active @endif">BVN Modification </a>
         </li>
         <li class="slide">
            <a href="{{route('crm')}}" class="side-menu__item @if($title == 'crm') active @endif">CRM</a>
         </li>
         <li class="slide">
            <a href="{{route('account-upgrade')}}"  class="side-menu__item @if($title == 'upgrade') active @endif">Account Upgrade
            </a>
         </li>
         <li class="slide">
            <a href="{{route('crm2')}}" class="side-menu__item @if($title == 'crm2') active @endif">Find BVN using Phone and DOB
            </a>
         </li>
         <li class="slide">
            <a href="{{route('bvn-enrollment')}}"  class="side-menu__item @if($title == 'enrollment') active @endif"">BVN Enrollement Agency Request
            </a>
         </li>
      </ul>
   </li>
     @endif

      <li class="slide">
      <a href="{{route('transactions')}}" class="side-menu__item @if($title == 'transactions') active @endif">
      <i class="bx bx-history side-menu__icon"></i>
      <span class="side-menu__label">Transactions</span>
      </a>
   </li>


    <li class="slide">
      <a href="{{route('support')}}" target="_blank" class="side-menu__item @if($menu == 'dashboard1') active @endif">
      <i class="bx bx-headphone side-menu__icon"></i>
      <span class="side-menu__label">Support</span>
      </a>
   </li>

   <li class="slide">
      <a href="{{ route('profile.edit')}}"  class="side-menu__item @if($menu == 'Settings') active @endif">
      <i class="bx bx-cog side-menu__icon"></i>
      <span class="side-menu__label">Settings</span>
      </a>
   </li>
   <li class="slide">
      <a href="#" id="logout" onclick="logout();"class="side-menu__item @if($menu == 'dashboard1') active @endif">
      <i class="bx bx-exit side-menu__icon"></i>
      <span class="side-menu__label">Logout</span>
      </a>
   </li>
   <!-- End::slide -->
</ul>
