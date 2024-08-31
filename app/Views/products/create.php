<?= $this->extend('products/layout') ?>

<?= $this->section('content') ?>
<div class="card mt-5 mx-auto" style="max-width: 500px;">
  <div class="card-header"><h5>Product</h5></div>
  <div class="card-body">
      
      <form action="<?= site_url('/products') ?>" method="post">
        <?= csrf_field() ?>
        
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        
        <div class="form-group mt-2">
        <label for="price">Price (LKR)</label>
        <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">LKR</span>
        </div>
        <input type="number" name="price" id="price" class="form-control" step="0.01" required>
    </div>
</div>

            <div class="form-group">
          <label for="Qty">Qty</label>
          <input type ="number" name ="qty" id="qty" class="form-control" required>
        </div>
        
        <div class="form-group mt-2">
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
        <input type="submit" value="Save" class="btn btn-success mt-3">
        <input type="reset" value="cancel" class="btn btn-danger mt-3">
        
      </form>
  </div>
</div>
<?= $this->endSection() ?>
