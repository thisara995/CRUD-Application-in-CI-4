<?= $this->extend('products/layout') ?>

<?= $this->section('content') ?>
<div class="card mt-5 mx-auto" style="max-width: 500px;">
  <div class="card-header"><h5>Edit Product</h5></div>
  <div class="card-body">
    
    <form method="post" action="/products/update/<?= $product['id'] ?>">
      <?= csrf_field() ?>
      
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= esc($product['name']) ?>" class="form-control" required>
      </div>
      
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control"><?= esc($product['description']) ?></textarea>
      </div>
      
      <div class="form-group mt-2">
        <label for="price">Price (LKR)</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">LKR</span>
          </div>
          <input type="number" name="price" id="price" value="<?= esc($product['price']) ?>" class="form-control" step="0.01" required>
        </div>
      </div>
      
      <div class="form-group mt-2">
        <label for="qty">Qty</label>
        <input type="number" name="qty" id="qty" value="<?= esc($product['qty']) ?>" class="form-control" required>
      </div>
      
      <div class="form-group mt-2">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
          <option value="active" <?= $product['status'] == 'active' ? 'selected' : '' ?>>Active</option>
          <option value="inactive" <?= $product['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
        </select>
      </div>
      
      <input type="submit" value="Save" class="btn btn-success mt-3">
      <a href="/products" class="btn btn-danger mt-3">Cancel</a>
      
    </form>
  </div>
</div>
<?= $this->endSection() ?>
