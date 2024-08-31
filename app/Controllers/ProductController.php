<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProductController extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data['products'] = $this->productModel->findAll();
        $data['message'] = session()->getFlashdata('message');
        
        // Return the index view
        return view('products/index', $data);
    }

    public function create()
    {
        // Return the create view
        return view('products/create');
    }

    public function store()
    {
        // Validation rules
        $rules = [
            'name'        => 'required|min_length[3]',
            'description' => 'required',
            'price'       => 'required|decimal',
            'qty'         => 'required|integer',
            'status'      => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'qty'         => $this->request->getPost('qty'),
            'status'      => $this->request->getPost('status'),
        ];
        
        $this->productModel->save($data);
        session()->setFlashdata('message', 'Product successfully created.');
        
        return redirect()->to('/products');
    }

    public function show($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            throw new PageNotFoundException("Product with ID $id not found");
        }
        
        $data['product'] = $product;
        
        // Return the show view
        return view('products/show', $data);
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            throw new PageNotFoundException("Product with ID $id not found");
        }
        
        $data['product'] = $product;
        
        // Return the edit view
        return view('products/edit', $data);
    }

    public function update($id)
    {
        // Validation rules
        $rules = [
            'name'        => 'required|min_length[3]',
            'description' => 'required',
            'price'       => 'required|decimal',
            'qty'         => 'required|integer',
            'status'      => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'qty'         => $this->request->getPost('qty'),
            'status'      => $this->request->getPost('status'),
        ];
        
        if (!$this->productModel->find($id)) {
            throw new PageNotFoundException("Product with ID $id not found");
        }
        
        $this->productModel->update($id, $data);
        session()->setFlashdata('message', 'Product successfully updated.');
        
        return redirect()->to('/products');
    }

    public function delete($id)
    {
        if ($this->productModel->find($id)) {
            $this->productModel->delete($id);
            session()->setFlashdata('message', 'Product successfully deleted.');
        } else {
            session()->setFlashdata('error', 'Product not found.');
        }
        
        return redirect()->to('/products');
    }
}
