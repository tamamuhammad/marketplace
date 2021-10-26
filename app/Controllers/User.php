<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
	protected $users;

	public function __construct()
	{
		$this->users = new UserModel();
	}

	public function index()
	{
		if (session()->has('email')) {
			return redirect()->to('/dashboard');
		}
		$data['title'] = 'Login Page';
		$data['validation'] = \Config\Services::validation();
		return view('auth/index', $data);
	}

	public function login()
	{
		if (!$this->validate([
			'email' => 'required|valid_email',
			'password' => 'required|min_length[6]'
		])) {
			return redirect()->to('/login')->withInput();
		}

		$user = $this->users->where(['email' => $this->request->getVar('email')])->first();
		if ($user) {
			if (password_verify($this->request->getVar('password'), $user['password'])) {
				$data = [
					'username' => $user['name'],
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password')
				];
				session()->set($data);

				return redirect()->to('/dashboard');
			} else {
				session()->setFlashdata('false', 'Password kurang tepat');
				return redirect()->to('/login');
			}
		} else {
			session()->setFlashdata('false', 'Email belum terdaftar');
			return redirect()->to('/login');
		}
	}

	public function logout()
	{
		$data = ['username', 'email', 'password'];
		if (session()->has('email')) {
			session()->remove($data);
			session()->setFlashdata('true', 'Anda berhasil logout');
		} else {
			session()->setFlashdata('false', 'Anda belum login ke system');
		}
		return redirect()->to('/login');
	}

	public function show()
	{
		if (!session()->has('email')) {
			return redirect()->to('/login');
		}
		$data['title'] = 'Profile';
		$email = session()->get('email');
		$data['user'] = $this->users->getUser($email);
		$data['validation'] = \Config\Services::validation();

		return view('auth/profile', $data);
	}

	public function update($id)
	{
		if (!$this->validate([
			'name' 		=> 'required',
			'username' 		=> 'required',
			'email'		=> 'required|valid_email',
			'wa'		=> 'required|numeric',
		])) {
			return redirect()->to('/user/show/' . $id)->withInput();
		}

		$wa = '62' . $this->request->getVar('wa');

		$this->users->save([
			'id' => $id,
			'name' => $this->request->getVar('name'),
			'username' => $this->request->getVar('username'),
			'email' => $this->request->getVar('email'),
			'wa' => $wa,
			'updated_at' => Time::now()
		]);

		session()->set(['email' => $this->request->getVar('email')]);
		session()->setFlashdata('true', 'Profile berhasil diedit');
		return redirect()->to('/user/show/' . $id);
	}
}
