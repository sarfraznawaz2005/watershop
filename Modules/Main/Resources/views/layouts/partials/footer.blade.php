{{-- IE es6 pollyfill --}}
@if(isBadBrowser())
    <script src="/modules/core/js/pollyfills.js"></script>
@endif

<!-- Scripts -->
<script src="{{mix('/js/app.js')}}"></script>
<script src="/modules/main/js/custom.js"></script>

@stack('scripts')

@include('noty::view')
