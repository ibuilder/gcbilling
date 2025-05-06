
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="role" id="role" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="rate" class="form-label">Rate</label>
                <input type="number" name="rate" id="rate" class="form-control" step="0.01" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create Staff Member</button>
    </form>
</div>
@endsection
