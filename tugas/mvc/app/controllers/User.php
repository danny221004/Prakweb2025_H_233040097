<?php

/**
 * Controller User
 * Mengatur tampilan daftar user dan detail user
 */
class User extends Controller
{
    // Method utama - routing berdasarkan parameter id
    public function index()
    {
        $data["judul"] = "Data user";
        $data['users'] = $this->model('User_model')->getAllUsers();

        // header
        $this->view('templates/header', $data);

        // main content
        $this->view('list', $data);

        // footer
        $this->view('templates/footer');
    }

    // Tampilkan detail user berdasarkan id
    public function detail($id)
    {
        $data["judul"] = "Detail user";
        $data['user'] = $this->model('User_model')->getUserById($id);

        $this->view('templates/header', $data);
        $this->view('detail', $data);
        $this->view('templates/footer');
    }

    // tampilkan form tambah
    public function create()
    {
        $data['judul'] = 'Tambah User';
        $this->view('templates/header', $data);
        $this->view('user/create', $data);
        $this->view('templates/footer');
    }

    // simpan data baru
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            $this->model('User_model')->createUser(['name' => $name, 'email' => $email]);

            header('Location: ' . BASEURL . '/user');
            exit;
        }

        header('Location: ' . BASEURL . '/user');
        exit;
    }

    // tampilkan form edit
    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        $data['user'] = $this->model('User_model')->getUserById($id);

        $this->view('templates/header', $data);
        $this->view('user/edit', $data);
        $this->view('templates/footer');
    }

    // update data
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            $this->model('User_model')->updateUser(['id' => $id, 'name' => $name, 'email' => $email]);

            header('Location: ' . BASEURL . '/user');
            exit;
        }

        header('Location: ' . BASEURL . '/user');
        exit;
    }

    // hapus user
    public function delete($id)
    {
        $this->model('User_model')->deleteUser($id);
        header('Location: ' . BASEURL . '/user');
        exit;
    }
}
