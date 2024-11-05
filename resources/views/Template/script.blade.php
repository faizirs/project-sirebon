<script src="{{ asset('SEOdash/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('SEOdash/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('SEOdash/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('SEOdash/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('SEOdash/src/assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('SEOdash/src/assets/js/app.min.js') }}"></script>
<script src="{{ asset('SEOdash/src/assets/js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmLogout() {
        Swal.fire({
            title: "Yakin Logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Logout"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }

    function togglePassword(id) {
        const passwordField = document.getElementById(id);
        const eyeIcon = document.getElementById('eye_' + id);
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>
