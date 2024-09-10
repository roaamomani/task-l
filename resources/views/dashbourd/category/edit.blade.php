<div class="nav-profile-text d-flex flex-column">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- Assuming this is for editing an existing category -->
                <form action="{{ route('dash.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use 'POST' for creating new categories, 'PUT' or 'PATCH' for updates -->

                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Insert your category name" value="{{ old('name', $category->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Category description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{ old('description', $category->description) }}" required>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <a href="{{ route('dash.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
