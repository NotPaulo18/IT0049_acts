<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data = [
            'title' => 'User Accounts',
            'users' => $userModel
                ->orderBy('id', 'DESC')
                ->findAll(),
        ];

        return view('templates/header', $data)
            . view('users/index', $data)
            . view('templates/footer');
    }

    public function new()
    {
        $data = [
            'title'  => 'Add New User',
            'errors' => session()->getFlashdata('errors') ?? [],
        ];

        return view('templates/header', $data)
            . view('users/new', $data)
            . view('templates/footer');
    }

    public function create()
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[50]'
                    . '|regex_match[/^[a-zA-Z0-9_.-]+$/]'
                    . '|is_unique[users.username]',
                'errors' => [
                    'required'    => 'The username is required.',
                    'min_length'  => 'The username must contain at least 3 characters.',
                    'max_length'  => 'The username cannot exceed 50 characters.',
                    'regex_match' => 'The username contains invalid characters.',
                    'is_unique'   => 'That username is already registered.',
                ],
            ],

            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|min_length[2]|max_length[100]',
                'errors' => [
                    'required'   => 'The full name is required.',
                    'min_length' => 'The full name must contain at least 2 characters.',
                    'max_length' => 'The full name cannot exceed 100 characters.',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $userModel->insert([
            'username'   => trim((string) $this->request->getPost('username')),
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'))
            ->with('success', 'User account created successfully.');
    }

    public function edit(int $id)
    {
        $userModel = new UserModel();
        $user      = $userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound(
                'The selected user could not be found.'
            );
        }

        $data = [
            'title'  => 'Edit User',
            'user'   => $user,
            'errors' => session()->getFlashdata('errors') ?? [],
        ];

        return view('templates/header', $data)
            . view('users/edit', $data)
            . view('templates/footer');
    }

    public function update(int $id)
    {
        $userModel = new UserModel();
        $user      = $userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound(
                'The selected user could not be found.'
            );
        }

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[50]'
                    . '|regex_match[/^[a-zA-Z0-9_.-]+$/]',
                'errors' => [
                    'required'    => 'The username is required.',
                    'min_length'  => 'The username must contain at least 3 characters.',
                    'max_length'  => 'The username cannot exceed 50 characters.',
                    'regex_match' => 'The username contains invalid characters.',
                ],
            ],

            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|min_length[2]|max_length[100]',
                'errors' => [
                    'required'   => 'The full name is required.',
                    'min_length' => 'The full name must contain at least 2 characters.',
                    'max_length' => 'The full name cannot exceed 100 characters.',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $username = trim(
            (string) $this->request->getPost('username')
        );

        $duplicateUser = $userModel
            ->where('username', $username)
            ->where('id !=', $id)
            ->first();

        if ($duplicateUser !== null) {
            return redirect()->back()
                ->withInput()
                ->with('errors', [
                    'username' => 'That username is already registered.',
                ]);
        }

        $updateData = [
            'username'  => $username,
            'full_name' => trim(
                (string) $this->request->getPost('full_name')
            ),
        ];

        $avatar = $this->request->getFile('avatar');

        if (
            $avatar !== null
            && $avatar->getError() !== UPLOAD_ERR_NO_FILE
        ) {
            $avatarRules = [
                'avatar' => [
                    'label' => 'Profile Picture',
                    'rules' => 'uploaded[avatar]'
                        . '|is_image[avatar]'
                        . '|mime_in[avatar,image/jpg,image/jpeg,image/png]'
                        . '|max_size[avatar,2048]',
                    'errors' => [
                        'uploaded'  => 'Please select an image.',
                        'is_image'  => 'The uploaded file must be an image.',
                        'mime_in'   => 'Only JPG and PNG images are allowed.',
                        'max_size'  => 'The profile picture cannot exceed 2 MB.',
                    ],
                ],
            ];

            if (! $this->validate($avatarRules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $uploadPath = FCPATH . 'uploads/avatars/';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            $originalName = $avatar->getRandomName();
            $avatar->move($uploadPath, $originalName);

            $extension = pathinfo(
                $originalName,
                PATHINFO_EXTENSION
            );

            $baseName = pathinfo(
                $originalName,
                PATHINFO_FILENAME
            );

            $preparedName = $baseName
                . '_300x300.'
                . $extension;

            service('image')
                ->withFile($uploadPath . $originalName)
                ->fit(300, 300, 'center')
                ->save($uploadPath . $preparedName, 85);

            $originalPath = $uploadPath . $originalName;

            if (is_file($originalPath)) {
                unlink($originalPath);
            }

            if (! empty($user['avatar'])) {
                $oldAvatar = $uploadPath
                    . basename($user['avatar']);

                if (is_file($oldAvatar)) {
                    unlink($oldAvatar);
                }
            }

            $updateData['avatar'] = $preparedName;
        }

        $userModel->update($id, $updateData);

        return redirect()->to(site_url('users'))
            ->with('success', 'User account updated successfully.');
    }
}