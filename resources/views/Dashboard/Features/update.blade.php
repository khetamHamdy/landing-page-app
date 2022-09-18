<x-dashboard-layout>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom card-transparent">
                <div class="card-body p-0">
                    <!--begin::Wizard-->
                    <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first"
                         data-wizard-clickable="true">

                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <!--begin::Body-->

                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->

                                        <form class="form" action="{{route('features.update' , $feature)}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content"
                                                         data-wizard-state="current">

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Upload
                                                                Image</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <div
                                                                    class="image-input image-input-outline "
                                                                    id="kt_image_3">
                                                                    <div class="image-input-wrapper"
                                                                         style="background-image: url('{{asset('storage/'.$feature->image)}}')"></div>
                                                                    <label
                                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                        data-action="change" data-toggle="tooltip"
                                                                        title="" data-original-title="Change avatar">
                                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                                        <input type="file" name="image"
                                                                               value="{{$feature->image}}"
                                                                               accept=".png, .jpg, .jpeg"/>
                                                                    </label>
                                                                    <span
                                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                        data-action="cancel" data-toggle="tooltip"
                                                                        title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                                                </div>
                                                                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                            </div>
                                                        </div>

                                                        <!--end::Group-->
                                                        <div class="card-block">
                                                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                                                @foreach (config('app.languages') as $key => $lang)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link @if ($loop->index == 0) show active in @endif"
                                                                           id="home-tab" data-toggle="tab"
                                                                           href="#{{ $key }}" role="tab"
                                                                           style="background-color:#8950FC ;color: #ffffff;"
                                                                           aria-controls="home"
                                                                           aria-selected="true">{{ $lang }}</a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                            <div class="tab-content" id="myTabContent">
                                                                @foreach (config('app.languages') as $key => $lang)

                                                                    <div
                                                                        class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                                                                        id="{{ $key }}" role="tabpanel"
                                                                        aria-labelledby="home-tab">
                                                                        {{$lang}}

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-xl-3 col-lg-3 col-form-label">Title </label>
                                                                            <div class="col-lg-9 col-xl-9">
                                                                                    <textarea name="{{$key}}[title]"
                                                                                              class="summernote form-control-solid form-control-lg"
                                                                                              id="kt_summernote_1">
                                                                                {{$feature->translate($key)->title}}
                                                                               </textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                @endforeach
                                                            </div>
                                                            <!--end::Wizard Step 1-->
                                                            <button type="submit"
                                                                    class="btn btn-info font-weight-bolder col-xl-12"
                                                            >
                                                                Update
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Wizard-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</x-dashboard-layout>
