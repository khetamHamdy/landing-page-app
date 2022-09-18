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
                <span class="text-muted font-weight-bold mr-4">{{__('Roles')}}</span>
                @can('roles.create')
                <a href="{{ route('roles.create')}}" class="btn btn-light-warning font-weight-bolder btn-sm">
                    {{__('Add')}} </a>
                @endcan
                <!--end::Actions-->
            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--begin::Entry-->


    <div class="table-responsive">

        <h1 style="color: #ff9900 ; margin: 1rem">User Permissions ☢ </h1>
        <table class="table table-dark table-striped" style="margin: .5rem">
            <thead class="thead-light">
            <tr>
                <td>ID</td>
                <td>Users #</td>
                <td>Created At</td>
                <td>Updated At</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>


            @foreach ($roles as $key)
                <tr>
                    <td> {{ $key->id }} </td>
                    @foreach($key->admins as $admin)
                        <td>
                            {{$admin->name}}
                        </td>
                    @endforeach
                    <td>{{ $key->created_at }}</td>
                    <td>{{ $key->updated_at }}</td>
                    @can('roles.update')
                    <td><a style="color: #fff;" class="btn btn-sm btn-info"
                           href="{{ route('roles.edit' ,  $key->id)  }}">Edit</a>
                    </td>
                    @endcan

                    @can('roles.delete')
                    <td>
                        <form action="{{ route('roles.destroy' ,$key->id)  }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                    @endcan
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $roles->links() }}
    </div>


</x-dashboard-layout>
