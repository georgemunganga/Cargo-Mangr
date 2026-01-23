<x-base-layout>

    <x-slot name="pageTitle">
            {{__('cargo::view.support')}}
    </x-slot>

    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">

        <div class="wrapper-settings">
            <div class="mx-auto mb-5 col-lg-12">

                <div class="card mb-5">
                    <div class="card-body">
                        <div class="message  message--warning">
                            <p style="font-family: 'Poppins', sans-serif !important;">
                                {{__('cargo::view.support_codecanuon_1')}} <a target="_blank" href="https://support.spotlayer.com"  style="color:#007bff;">{{__('cargo::view.click_here')}}</a> {{__('cargo::view.support_codecanuon_2')}} 
                                    <br><br><br>{{__('cargo::view.support_codecanuon_attention')}} 
                            </p>
                        </div>
                       
                        <div class="message  message--warning">
                            <p style="font-family: 'Poppins', sans-serif !important;">
                                {{__('cargo::view.send_email_support_1')}}
                                <a style="color:#007bff;" href="mailto:envato.spotlayer@gmail.com">envato.spotlayer@gmail.com</a>
                                {{__('cargo::view.send_email_support_2')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end::Basic info-->
    @section('scripts')
    <script>

    </script>
    @endsection
</x-base-layout>
