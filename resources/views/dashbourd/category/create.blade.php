<div class="nav-profile-text d-flex flex-column">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{ route('dash.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="insert your category name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Category description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
                    </div>
                


                    <button type="submit" class="btn btn-gradient-primary me-2">Submit new category</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>