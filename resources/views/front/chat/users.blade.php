<div class="md:w-3/12" x-data="{ open: false }">
    <div class="relative">
        <button @click="open = !open" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
           List Of Contacts
            <svg class="ml-2 h-5 w-5 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 3a1 1 0 01.894.553l4 7a1 1 0 010 .894l-4 7A1 1 0 0110 18a1 1 0 01-.894-.553l-4-7a1 1 0 010-.894l4-7A1 1 0 0110 3zm0 2.382L7.618 10 10 14.618 12.382 10 10 5.382z" clip-rule="evenodd" />
            </svg>
        </button>

        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-SM rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 max-h-60 overflow-y-auto">
            <div class="py-1">
                @foreach($users as $user)
                <a href="{{ route('chat.show', $user->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex justify-between items-center">{{ $user->first_name }} {{ $user->last_name }}
                @if(isset($unread[$user->id]))
                    <span class="bg-green-500 text-white rounded-full px-3 py-1 text-sm">{{ $unread[$user->id] }}</span>
                @endif</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
