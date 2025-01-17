@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Update Product</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" name="name" class="form-control" required value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label>Category </label>
                        <select class="form-control" name="category" required>
                            @foreach ($category as $ctg)
                                @if ($product->category_id == $ctg->id)
                                <option value = "{{ $ctg->id }}" selected> {{ $ctg->nama }} </option>
                                @else
                                <option value = "{{ $ctg->id }}"> {{ $ctg->nama }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Size </label>
                        <input type="number" name="size" class="form-control" required value="{{$product->size}}">
                    </div>
                    <div class="form-group">
                        <label>Price </label>
                        <input type="number" name="price" class="form-control" required value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label>Photo </label>
                        <input type="hidden" name="oldImage" id="oldImage" value="{{$product->image}}" >
                        @if ($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="img-preview img-fluid mb-3 col-sm-4 d-block">

                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-4">
                        @endif
                        <input type="file" name="image" class="form-control" id="image" onchange="previewImage()">
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
