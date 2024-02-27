@include('back.admin')
<div class="container">
    <div class="row">
        <div>
            <div class="card">
            <img src="{{ asset('assets/pictures/users.svg') }}" alt="User Icon">
                <div>Users</div>
                <div>
                    {{ $userCount }}
                </div>
            </div>
        </div>
        <div>
            <div class="card">
                <img src="{{ asset('assets/pictures/plants.svg') }}" alt="Plant Icon">
                <div>Plants</div>
                <div>
                    {{ $plantCount }}
                </div>
            </div>
        </div>
        <div>
            <div class="card">
                <img src="{{ asset('assets/pictures/missions.svg') }}" alt="Mission Icon">
                <div>Missions</div>
                <div>
                    {{ $missionCount }}
                </div>
            </div>
        </div>
    </div>
</div>

