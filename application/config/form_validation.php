<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
		'Kuisioner/index' => array(
				array(
						'field' => 'umur',
						'label' => 'Umur',
						'rules' => 'trim|required|numeric',
						'errors' => array('required' => "Tolong isikan %s Anda.",
								'numeric' => "Umur hanya boleh berisi angka."
						)
				),
				array(
						'field' => 'pendidikan',
						'label' => 'Pendidikan',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda."
						)
				),
				array(
						'field' => 'pekerjaan',
						'label' => 'Pekerjaan',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda."
						)
				)
		),
		'Kuisioner/form' => array(
				array(
						'field' => 'umur',
						'label' => 'Umur',
						'rules' => 'trim|required|numeric',
						'errors' => array('required' => "Tolong isikan %s Anda.",
								'numeric' => "Umur hanya boleh berisi angka."
						)
				),
				array(
						'field' => 'pendidikan',
						'label' => 'Pendidikan',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda."
						)
				),
				array(
						'field' => 'pekerjaan',
						'label' => 'Pekerjaan',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda."
						)
				)
		),
		'autentikasi/login' => array(
				array(
						'field' => 'username',
						'label' => 'Username',
						'rules' => 'trim|required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required',
						'errors' => array('required' => "Tolong isikan %s Anda.")
				)
		)
);