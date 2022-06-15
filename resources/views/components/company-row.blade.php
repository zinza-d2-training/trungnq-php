<tr class="company-row">
    <td class="px-6 py-4">
        @if (count($company->user))
            <div class="inline-block ">
                <img src="/storage/images/avatars/{{ $company->user[0]->avatar }}" alt=""
                    class="w-10 rounded-full">
            </div>
            <div class="px-3 inline-block w-3">
                <p class="text-bold text-slate-900">{{ $company->user[0]->name }} </p>
                <p class=" text-gray-600">{{ $company->user[0]->email }} </p>
            </div>
        @endif
    </td>
    <td class="px-6 py-4">{{ $company->name }}</td>
    <td class="px-6 py-4">{{ $company->active }}</td>
    <td class="px-6 py-4">{{ $company->max_users }}</td>
    <td class="px-6 py-4">
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center text-sm font-medium text-gray-500 ">
                        <div><i class="fa-solid fa-ellipsis"></i></div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('company.edit', ['company' => $company])">
                        {{ __('Edit') }}
                    </x-dropdown-link>
                    <x-dropdown-link>
                        <button class="deletecompany" company_id="{{ $company->id }}">Delete</button>
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div>
    </td>
</tr>
