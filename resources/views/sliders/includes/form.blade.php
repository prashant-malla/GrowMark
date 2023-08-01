<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title"
        value="{{ isset($slider) ?  $slider->title : old('title') }}">
    @error('title')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="link" class="form-label">Link</label>
    <input type="url" name="link" class="form-control" id="link"
        value="{{ isset($slider) ? $slider->link : old('link') }}">
    @error('link')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="image" class="form-label">Upload Image</label>
    <input type="file" name="image" class="form-control" id="image" accept="image/*">
    @error('image')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Status</label>
    <div>
        <label>
            <input type="radio" name="is_active" value="1" @checked(isset($slider) ? ($slider->is_active == 1 ? true : false) : true)> Active
        </label>
        <label>
            <input type="radio" name="is_active" value="0" @checked(isset($slider) ? ($slider->is_active == 0 ? true : false) : false)> In Active
        </label>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
