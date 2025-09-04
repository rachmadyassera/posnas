@extends('layouts.main') @section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h4 class="card-title">Update role and setting permission</h4>
            <div class="card-header-action">
                <div class="buttons">
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('role.update',$role->id)}}" method="POST">
                @method('PUT') @csrf
                <div class="form-group">
                    <label>Name Role</label>
                    <input type="text" name="name" value="{{$role->name}}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="d-block">Permission Role</label>
                    <div class="container-fluid">
                        <div class="row">
                            @php use Illuminate\Support\Str; @endphp

                                @foreach ($groupedPermissions as $module => $perms)
                                    @php $moduleSlug = Str::slug($module, '_'); @endphp

                                    <div class="col-md-4">
                                        <div class="card mb-3 shadow" id="module-card-{{ $moduleSlug }}">
                                            <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between align-items-center">
                                                {{ ucfirst($module) }}

                                                {{-- master checkbox (select all) --}}
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="form-check-input select-all"
                                                        id="select-all-{{ $moduleSlug }}"
                                                        data-module="{{ $moduleSlug }}">
                                                    <label class="form-check-label small" for="select-all-{{ $moduleSlug }}">
                                                       Checked All
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                @foreach ($perms as $permission)
                                                    <div class="form-check mb-2">
                                                        {{-- each permission checkbox punya data-module yang sama --}}
                                                        <input class="form-check-input perm-checkbox"
                                                            type="checkbox"
                                                            name="permissions[]"
                                                            value="{{ $permission->id }}"
                                                            id="perm-{{ $permission->id }}"
                                                            data-module="{{ $moduleSlug }}"
                                                            @if($role->permissions->contains($permission->id)) checked @endif>
                                                        <label class="form-check-label" for="perm-{{ $permission->id }}">
                                                            {{ ucfirst($permission->name) }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <input type="submit" value="Update" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Cari semua master checkbox per modul
    document.querySelectorAll('.select-all').forEach(master => {
        const module = master.dataset.module;
        const childSelector = `input.perm-checkbox[data-module="${module}"]`;

        // ambil anak-anak checkbox untuk modul ini
        const children = Array.from(document.querySelectorAll(childSelector));

        // Fungsi pembaruan state master (checked / indeterminate)
        const updateMasterState = () => {
            if (children.length === 0) {
                master.checked = false;
                master.indeterminate = false;
                return;
            }
            const allChecked = children.every(cb => cb.checked === true);
            const someChecked = children.some(cb => cb.checked === true);

            master.checked = allChecked;
            master.indeterminate = !allChecked && someChecked;
        };

        // Inisialisasi state master saat load
        updateMasterState();

        // Jika master di-toggle -> ubah semua anak
        master.addEventListener('change', () => {
            children.forEach(cb => cb.checked = master.checked);
            updateMasterState();
        });

        // Jika salah satu anak berubah -> update master
        children.forEach(cb => {
            cb.addEventListener('change', updateMasterState);
        });
    });
});
</script>


@endsection
