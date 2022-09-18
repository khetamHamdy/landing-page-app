<x-dashboard-layout>

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


                            <!--begin::Name-->
                            <div class="my-4">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">{!! $data->name !!}</a>
                            </div>
                            <!--end::Name-->
                            <!--begin::Name-->
                            <div class="my-4">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">{!! $data->email !!}</a>
                            </div>
                            <!--end::Name-->
                            <!--begin::Name-->
                            <div class="my-4">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">{!! $data->phone !!}</a>
                            </div>
                            <!--end::Name-->
                            <!--begin::Name-->
                            <div class="my-4">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">{!! $data->messages !!}</a>
                            </div>
                            <!--end::Name-->

                            <!--begin::Buttons-->
                            <form action="{{route('DeleteMessage' , $data)}}" method="POST">
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
                            <br>


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
    {{ $datas->links() }}
    <!--end::Entry-->
</x-dashboard-layout>
