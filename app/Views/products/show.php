<?= $this->extend('products/layout') ?>

<?= $this->section('content') ?>
 
<div class="card mt-5 mx-auto" style="max-width: 500px;">
  <div class="card-header"><h5>Product Page</h5></div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Product Name: <?= esc($product['name']) ?></h5>
        <p class="card-text">Description: <?= esc($product['description']) ?></p>
        <p class="card-text">Price: <?= 'LKR ' . number_format($product['price'], 2) ?></p>
        <p class="card-text">Quantity: <?= esc($product['qty']) ?></p>
        <p class="card-text">Status: 
          <?php if ($product['status'] === 'active'): ?>
            <span class="badge bg-success">Active</span>
          <?php else: ?>
            <span class="badge bg-warning text-dark">Inactive</span>
          <?php endif; ?>
        </p>
  </div>
       
    </hr>
  
  </div>
</div>
<?= $this->endSection() ?>
