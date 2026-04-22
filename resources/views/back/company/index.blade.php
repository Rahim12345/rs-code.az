@extends('back.layouts.master')

@section('title', 'Şirkətlər')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-xl font-bold text-gray-900">Şirkətlər</h1>
        <p class="text-sm text-gray-500 mt-0.5">Şirkətləri idarə edin</p>
    </div>
    <a href="{{ route('company.create') }}" class="btn-primary">
        <i class="fa fa-plus"></i>
        Şirkət Əlavə Et
    </a>
</div>

@if(session('success'))
<div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="admin-table w-full">
        <thead>
            <tr>
                <th>Qrup</th>
                <th>Ad</th>
                <th class="text-right">Əməliyyat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($companies as $company)
            <tr>
                <td>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                        {{ $company->group->name_az ?? '—' }}
                    </span>
                </td>
                <td class="font-medium text-gray-900">{{ $company->name }}</td>
                <td class="text-right">
                    <div class="btn-group justify-end">
                        <a href="{{ route('company.edit', $company->id) }}" class="btn-primary btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>
                        <form action="{{ route('company.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Silmək istədiyinizdən əminsiniz?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="3" class="text-center text-gray-400 py-8">Şirkət tapılmadı</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
