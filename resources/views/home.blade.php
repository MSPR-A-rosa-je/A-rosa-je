@include('admin')
<div class="container">
    <div class="row">
        <div>
            <div class="card">
            <img src="{{ asset('assets/svg/users.svg') }}" alt="User Icon">
                <div>Users</div>
                <div>
                    {{ $userCount }}
                </div>
            </div>
        </div>
        <div>
            <div class="card">
                <img src="{{ asset('assets/svg/plants.svg') }}" alt="Plant Icon">
                <div>Plants</div>
                <div>
                    {{ $plantCount }}
                </div>
            </div>
        </div>
        <div>
            <div class="card">
                <img src="{{ asset('assets/svg/missions.svg') }}" alt="Mission Icon">
                <div>Missions</div>
                <div>
                    {{ $missionCount }}
                </div>
            </div>
        </div>
    </div>
</div>

