<x-dashboard-layout>
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{__('Dashboard')}}</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">{{__('Screensshoot')}}  </span>
                @can('screenshoot.create')
                <a href="{{route('screenshoot.create')}}" class="btn btn-light-warning font-weight-bolder btn-sm">{{__('Add')}} </a>
                @endcan
                <!--end::Actions-->
            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                @foreach($datas as $data)
                    <!--begin::Column-->
                    <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b card-stretch">
                            <!--begin::Body-->
                            <div class="card-body text-center pt-4">

                                <!--begin::User-->
                                <div class="mt-10">
                                    <div class="symbol  symbol-lg-150">
                                        <img src="{{asset('storage/'.$data->images)}}" alt="image"/>
                                    </div>
                                </div>
                                <!--end::User-->

                                <!--begin::Buttons-->
                                @can('screenshoot.delete')
                                <form action="{{route('screenshoot.destroy' , $data)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <br>
                                    <button type="submit"
                                            class="btn btn-block btn-sm btn-light-danger font-weight-bolder text-uppercase py-4"
                                            href="">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>
                                </form>
                                @endcan
                                <br>
                                @can('screenshoot.update')
                                <a href="{{route('screenshoot.edit' , $data)}}">
                                    <button
                                        class="btn btn-block btn-sm btn-light-primary font-weight-bolder text-uppercase py-4">

                                        <i class="fas fa-edit">
                                        </i>
                                        update
                                    </button>
                                </a>
                                @endcan
                                <!--end::Buttons-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Column-->
                @endforeach
            </div>
            <!--end::Row-->


        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
    {{ $datas->links() }}
</x-dashboard-layout>
