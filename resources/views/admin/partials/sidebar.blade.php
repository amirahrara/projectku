<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard-admin">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <hr>
        @role('superadmin')
            <li class="nav-item">
                <a class="nav-link" href="/data-formulir">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Data Formulir</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/data-admin">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Data Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tanda-tangan">
                    <i class="ti-marker-alt menu-icon"></i>
                    <span class="menu-title">Tanda Tangan</span>
                </a>
            </li>
        @endrole
        @role('admin')
            <li class="nav-item">
                <a class="nav-link" href="/data-formulir">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Data Formulir</span>
                </a>
            </li>
            @unless (!empty($userID->tanda_tangan))
                <li class="nav-item">
                    <a class="nav-link" href="/tanda-tangan">
                        <i class="ti-marker-alt menu-icon"></i>
                        <span class="menu-title">Tanda Tangan</span>
                    </a>
                </li>
            @endunless
            {{-- @if (!$isTandaTanganFilled)
    <li class="nav-item">
        <a class="nav-link" href="/tanda-tangan">
            <i class="ti-marker-alt menu-icon"></i>
            <span class="menu-title">Tanda Tangan</span>
        </a>
    </li>
@endif --}}
        @endrole

    </ul>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        // Ambil kondisi tanda tangan terisi dari backend atau variabel JavaScript
        var isTandaTanganFilled = true; // Ganti dengan kondisi tanda tangan terisi yang sesuai

        if (isTandaTanganFilled) {
            // Jika tanda tangan terisi, sembunyikan menu "Tanda Tangan"
            $("a[href='/tanda-tangan']").parent().hide();
        }
    });
</script>
 --}}
