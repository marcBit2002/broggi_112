<div class="modal fade" id=@yield('idModal') data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="lblModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i
                        class="@yield('iconClass') pe-2"></i>@yield('titolModal')</h1>
            </div>
            <div class="modal-body">
                @yield('form-modal')
            </div>
        </div>
    </div>
</div>
