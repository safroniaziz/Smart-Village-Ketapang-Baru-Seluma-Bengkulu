    <script>var hostUrl = "assets/";</script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/create-project/type.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/create-project/budget.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/create-project/settings.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/create-project/team.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/create-project/targets.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/create-project/files.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/create-project/complete.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/create-project/main.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/new-address.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->

    <!--begin::Smart Village JavaScript-->
    <script>
        // Global Session Management
        $(document).ready(function() {
            // Set up AJAX defaults
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Global AJAX error handler for session expiry
            $(document).ajaxError(function(event, xhr, settings) {
                if (xhr.status === 401) {
                    // Session expired
                    Swal.fire({
                        title: 'Session Expired!',
                        text: 'Your session has expired. Please login again.',
                        icon: 'warning',
                        confirmButtonText: 'Login',
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route("login") }}';
                        }
                    });
                } else if (xhr.status === 419) {
                    // CSRF token mismatch
                    Swal.fire({
                        title: 'Security Token Expired!',
                        text: 'Please refresh the page and try again.',
                        icon: 'error',
                        confirmButtonText: 'Refresh Page'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            });

            // Check session status periodically (every 5 minutes)
            setInterval(function() {
                $.ajax({
                    url: '{{ route("dashboard") }}',
                    type: 'HEAD',
                    cache: false,
                    timeout: 5000
                }).fail(function(xhr) {
                    if (xhr.status === 401 || xhr.status === 419) {
                        // Session expired - redirect to login
                        window.location.href = '{{ route("login") }}';
                    }
                });
            }, 300000); // 5 minutes

            // Initialize basic functionalities when DOM is ready
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Dashboard initialization
            console.log('Smart Village Dashboard initialized with session management');
        });
    </script>
    <!--end::Smart Village JavaScript-->
