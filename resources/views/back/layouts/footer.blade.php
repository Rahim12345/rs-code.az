<footer class="footer">
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link">
                    RS TEAM
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link">
                    Haqqımızda
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link">
                    Blog
                </a>
            </li>
        </ul>
        <div class="copyright">
            {{ config('app.name') }}
            ©
            {{ date('Y') }}
        </div>
    </div>
</footer>
</div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa-solid fa-expand"></i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-primary active" data-color="primary"></span>
                        <span class="badge filter badge-info" data-color="blue"></span>
                        <span class="badge filter badge-success" data-color="green"></span>
                        <span class="badge filter badge-warning" data-color="orange"></span>
                        <span class="badge filter badge-danger" data-color="red"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">
                Sidebar Mini
            </li>
            <li class="adjustments-line">
                <div class="togglebutton switch-sidebar-mini" id="sidebarSwithcerBlock">
                    <span class="label-switch">OFF</span>
                    <input type="checkbox" name="checkbox" class="bootstrap-switch"
                           id="sidebarSwithcer" data-on-label="" data-off-label=""/>
                    <span class="label-switch label-right">ON</span>
                </div>
            </li>
            <li class="button-container text-center"></li>
        </ul>
    </div>
</div>

<script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>

<script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.js') }}"></script>

<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/fullcalendar/daygrid.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/fullcalendar/timegrid.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/fullcalendar/interaction.min.js') }}"></script>

<script src="{{ asset('assets/js/plugins/jquery-jvectormap.js') }}"></script>
<script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>

<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('assets/js/black-dashboard.min3f71.js?v=1.1.1') }}"></script>
<script src="{{ asset('assets/demo/demo.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@yield('jquery')
@yield('js')

<script>
    $(document).ready(function () {
        $().ready(function () {
            $sidebar = $('.sidebar');
            $navbar = $('.navbar');
            $main_panel = $('.main-panel');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = true;
            white_color = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();


            $('.fixed-plugin a').click(function (event) {
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .background-color span').click(function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data', new_color);
                }

                if ($main_panel.length != 0) {
                    $main_panel.attr('data', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data', new_color);
                }
            });

            $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function () {
                var $btn = $(this);

                if (sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    sidebar_mini_active = false;
                    // blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                } else {
                    $('body').addClass('sidebar-mini');
                    sidebar_mini_active = true;
                    // blackDashboard.showSidebarMessage('Sidebar mini activated...');
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);
            });

            $('.switch-change-color input').on("switchChange.bootstrapSwitch", function () {
                var $btn = $(this);

                if (white_color == true) {

                    $('body').addClass('change-background');
                    setTimeout(function () {
                        $('body').removeClass('change-background');
                        $('body').removeClass('white-content');
                    }, 900);
                    white_color = false;
                } else {

                    $('body').addClass('change-background');
                    setTimeout(function () {
                        $('body').removeClass('change-background');
                        $('body').addClass('white-content');
                    }, 900);

                    white_color = true;
                }


            });

            $('.light-badge').click(function () {
                $('body').addClass('white-content');
            });

            $('.dark-badge').click(function () {
                $('body').removeClass('white-content');
            });
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('.bootstrap-switch-handle-on, .bootstrap-switch-handle-off, .bootstrap-switch').click(function () {
            if ($('#sidebarSwithcer').is(':checked'))
            {

                localStorage.setItem('sidebarSwithcer','opened');
            }
            else
            {

                localStorage.removeItem('sidebarSwithcer');
            }
        });

        let checkSidebar = localStorage.getItem('sidebarSwithcer');

        if(checkSidebar === 'opened')
        {
            setTimeout(function () {
                document.getElementById('sidebarSwithcer').click();
                localStorage.setItem('sidebarSwithcer','opened');
                $('#sidebarSwithcer').prop('checked','true');
            }, 500);
        }

        $('.badge.filter').click(function(){
            let color = $(this).attr('data-color');
            localStorage.setItem('color',color);


        });

        if(localStorage.getItem('color'))
        {
            $('.sidebar').attr('data', localStorage.getItem('color'));
        }
    });
</script>
</body>
</html>
