<x-dashboard-layout>
    <h1 style="margin: .4rem"> Craete User Permissions </h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <select style="background: #0e0e0e ;padding: 1rem 21rem; color: white ; margin: 2rem" name="admin_id">
                @foreach($names as $name)
                    <option value="{{$name->id}}">{{$name->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <h4>Abilities</h4>
            @foreach(config('abilities') as $ability => $label)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="abilities[]" value="{{ $ability }}"
                           @if(in_array($ability , ($role->abilities ?? [] ))) checked @endif id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $label }}
                    </label>
                </div>
            @endforeach
        </div>


        <div class="form-group ">
            <Button style="max-width: 50% ; margin-left: 2rem" class="btn form-control  btn-success">SAVE</button>
        </div>

    </form>

</x-dashboard-layout>
