<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $data = [
            'title'     => 'Customer Accounts',
            'customers' => $customerModel
                ->orderBy('id', 'DESC')
                ->findAll(),
        ];

        return view('templates/header', $data)
            . view('customers/index', $data)
            . view('templates/footer');
    }

    public function new()
    {
        $data = [
            'title'  => 'Add New Customer',
            'errors' => session()->getFlashdata('errors') ?? [],
        ];

        return view('templates/header', $data)
            . view('customers/new', $data)
            . view('templates/footer');
    }

    public function create()
    {
        $rules = [
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|min_length[2]|max_length[100]',
                'errors' => [
                    'required'   => 'The full name is required.',
                    'min_length' => 'The full name must contain at least 2 characters.',
                    'max_length' => 'The full name cannot exceed 100 characters.',
                ],
            ],

            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[100]',
                'errors' => [
                    'required'    => 'The email address is required.',
                    'valid_email' => 'Please enter a valid email address.',
                    'max_length'  => 'The email cannot exceed 100 characters.',
                ],
            ],

            'phone' => [
                'label' => 'Phone',
                'rules' => 'permit_empty|min_length[7]|max_length[20]|regex_match[/^[0-9+\-\s()]+$/]',
                'errors' => [
                    'min_length'  => 'The phone number must contain at least 7 characters.',
                    'max_length'  => 'The phone number cannot exceed 20 characters.',
                    'regex_match' => 'The phone number contains invalid characters.',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->insert([
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'))
            ->with('success', 'Customer account created successfully.');
    }

    public function edit(int $id)
    {
        $customerModel = new CustomerModel();
        $customer      = $customerModel->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound(
                'The selected customer could not be found.'
            );
        }

        $data = [
            'title'    => 'Edit Customer',
            'customer' => $customer,
            'errors'   => session()->getFlashdata('errors') ?? [],
        ];

        return view('templates/header', $data)
            . view('customers/edit', $data)
            . view('templates/footer');
    }

    public function update(int $id)
    {
        $customerModel = new CustomerModel();
        $customer      = $customerModel->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound(
                'The selected customer could not be found.'
            );
        }

        $rules = [
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|min_length[2]|max_length[100]',
                'errors' => [
                    'required'   => 'The full name is required.',
                    'min_length' => 'The full name must contain at least 2 characters.',
                    'max_length' => 'The full name cannot exceed 100 characters.',
                ],
            ],

            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[100]',
                'errors' => [
                    'required'    => 'The email address is required.',
                    'valid_email' => 'Please enter a valid email address.',
                    'max_length'  => 'The email cannot exceed 100 characters.',
                ],
            ],

            'phone' => [
                'label' => 'Phone',
                'rules' => 'permit_empty|min_length[7]|max_length[20]|regex_match[/^[0-9+\-\s()]+$/]',
                'errors' => [
                    'min_length'  => 'The phone number must contain at least 7 characters.',
                    'max_length'  => 'The phone number cannot exceed 20 characters.',
                    'regex_match' => 'The phone number contains invalid characters.',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')),
        ]);

        return redirect()->to(site_url('customers'))
            ->with('success', 'Customer account updated successfully.');
    }
}