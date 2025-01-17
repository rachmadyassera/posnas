@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Add Product</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category" required>
                            <option value = ""> Pilih </option>
                            @foreach ($category as $ctg)
                            <option value = "{{ $ctg->id }}"> {{ $ctg->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Size </label>
                        <input type="number" name="size" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price </label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Photo (format : jpg,jpeg,png,etc)</label>
                        <img class="img-preview img-fluid mb-3 col-sm-4">
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image"  required onchange="previewImage()">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <input type="submit" value="Simpan Data" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src =oFREvent.target.result;
        }
    }
</script>

@endsection
