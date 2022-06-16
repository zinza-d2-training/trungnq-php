@extends('layouts.client')
@section('title')
    Company management
@endsection
@section('content')
    <x-breadcrumbs name='company'></x-breadcrumbs>
    <div class="px-6">
        <div class=" my-4 py-2  flex flex-row justify-between">
            <div class="">Company. Role admin {{ Config::get('constants.admin_name') }} </div>
            <div class=""><a href="{{ route('company.create') }}" target="bank"
                    class="p-2 bg-blue-600 rounded-lg text-white">New Company</a></div>
        </div>
        <div id="toast"></div>
        <x-table>
            <x-slot name="tablehead" class="">
                <thead class="text-sm text-gray-700  bg-slate-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-user"></i>Company accoutn
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-calendar-day"></i> Company name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-clock"> @sortablelink('status') </i>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-clock"></i> Number of users
                        </th>
                        <th scope="col" class="px-6 py-3">
                            edit
                        </th>
                    </tr>
                </thead>
            </x-slot>
            <x-slot name="tablebody">
                    @foreach ($companies as $company)
                        <x-company-row :company="$company" ></x-company-row>
                    @endforeach
            </x-slot>
        </x-table>
    </div>
    <div class="mt-auto px-6">
        {{ $companies->links() }}
    </div>
@endsection
