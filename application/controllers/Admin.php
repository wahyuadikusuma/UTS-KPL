<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('admintppkkwonogiri')) {
            redirect('admin/dashboard');
        }
        $data['title'] = 'TPPKK Wonogiri - Login';

        $this->form_validation->set_rules('username', 'Username', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/login');
            $this->load->view('admin/templates/login_footer');
        } else {
            $this->validasiLogin();
        }
    }

    private function validasiLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $admin = $this->db->get_where('akun', ['username' => $username])->row_array();


        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'username' => $admin['username'],
                    'email' => $admin['email'],
                    'admintppkkwonogiri' => true
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat Datang, <strong>' . $admin['name'] . '</strong> ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password yang anda masukkan salah!</div>');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password anda salah!</div>');
            redirect('admin');
        }
    }

    public function dashboard()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['artikel']['jumlahartikel'] = $this->Artikel_model->countAllArtikel();
        $data['pesan']['jumlahpesanmasuk'] = $this->Pesan_model->countAllPesan();
        $data['slider']['jumlahslider'] = $this->Slider_model->countAllSlider();
        $data['total']['jumlahviewers'] = $this->Artikel_model->sumViewersAllArtikel();

        $data['grafik'] = $this->Artikel_model->get12Artikel();

        // $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-4" role="alert">Selamat Datang, ' . $data['name'] . ' !</div>');

        $data['title'] = 'Dashboard - TPPKK Wonogiri';
        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/templates/admin_footer');
    }

    public function profil()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'Profil Admin TPPKK Wonogiri';
        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/profil', $data);
        $this->load->view('admin/templates/admin_footer');
    }

    // mengecek user, apakah telah melakukan login
    private function isLogin()
    {
        if ((!$this->session->userdata('admintppkkwonogiri')) || ($this->session->userdata('username') == null)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silakan login terlebih dahulu!</div>');
            $data = [
                'username',
                'admintppkkwonogiri',
            ];
            $this->session->unset_userdata($data);
            redirect('admin');
        }
    }

    public function changePassword()
    {
        $this->isLogin();
        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image, password');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Admin';

        $this->form_validation->set_rules('passwordlama', 'Password', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password not match',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[4]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/changepassword');
            $this->load->view('admin/templates/admin_footer');
        } else {
            $passwordlama = $this->input->post('passwordlama');
            $password1 = $this->input->post('password1');
            $passwordbaru = password_hash($password1, PASSWORD_BCRYPT);

            if (password_verify($passwordlama, $data['password'])) {
                $this->db->set('password', $passwordbaru);
                $this->db->where('username', $username);
                $this->db->update('akun');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diperbarui</div>');
                redirect('admin/changepassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama tidak sesuai!</div>');
                redirect('admin/changepassword');
            }
        }
    }

    public function editProfil()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('id_user, name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'Profil Admin TPPKK Wonogiri';

        $this->form_validation->set_rules('name', 'Judul', 'trim');
        $this->form_validation->set_rules('username', 'Judul', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar', $data);
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/editprofil', $data);
            $this->load->view('admin/templates/admin_footer');
        } else {
            $id_user = $data['id_user'];
            $username = $this->input->post('username');
            $name = $this->input->post('name');

            $fotoLama = $data['image'];

            $upload_image = $_FILES['image']['name'];

            // config
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/admin/avatar/';

            $this->load->library('upload', $config);

            if ($upload_image) {
                //menghapus file lama
                $fotoLama = './assets/img/admin/avatar/' . $fotoLama;
                if (is_readable($fotoLama)) {

                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                        unlink($fotoLama);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editProfil/' . $id_user);
                    }
                } else {
                    if ($this->upload->do_upload('image')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editProfil/' . $id_user);
                    }
                }
            }
            $this->db->set('name', $name);
            $this->db->set('username', $username);
            $this->db->where('id_user', $id_user);
            $this->db->update('akun');
            $this->session->set_userdata('username', $username);
            $this->session->set_flashdata('profil', '<div class="alert alert-success pb-1 mb-2" role="alert"> Profil berhasil diperbarui </div>');
            redirect('admin/profil');
        }
    }

    public function logout()
    {
        $data = [
            'username',
            'admintppkkwonogiri',
        ];
        $this->session->unset_userdata($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Session berhasil diakhiri</div>');
        redirect('admin');
    }

    public function artikel()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Artikel';
        $data['subtitle'] = 'Artikel';
        $data['artikel'] = $this->Artikel_model->getAllArtikel();

        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/artikel');
        $this->load->view('admin/templates/admin_footer');
    }


    public function addArtikel()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('id_user, name, username, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Tambah Artikel';
        $data['subtitle'] = 'Artikel';

        $this->form_validation->set_rules('judul', 'Judul', 'trim');
        $this->form_validation->set_rules('isi_artikel', 'Judul', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/tambahartikel');
            $this->load->view('admin/templates/admin_footer');
        } else {
            $id_penulis = $data['id_user'];
            $judul = $this->input->post('judul');
            $isi_artikel = $this->input->post('isi_artikel');

            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/admin/artikel/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/addArtikel');
                }
            }

            $data = [
                'id_penulis' => $id_penulis,
                'judul' => $judul,
                'isi_artikel' => $isi_artikel,
                'tanggal' => time(),
                'views' => 0,
            ];

            $this->Artikel_model->addArtikel($data);
            $this->session->set_flashdata('artikel', 'Ditambahkan');
            $this->session->set_flashdata('message', '<div class="alert alert-primary col-lg-4" role="alert">Artikel berhasil ditambahkan.</div>');
            redirect('admin/artikel');
        }
    }

    public function editArtikel($id_artikel)
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Edit Artikel';
        $data['subtitle'] = 'Artikel';

        $data['artikel'] = $this->Artikel_model->getArtikelById($id_artikel);

        $this->form_validation->set_rules('judul', 'Judul', 'trim');
        $this->form_validation->set_rules('isi_artikel', 'Judul', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/editartikel', $data);
            $this->load->view('admin/templates/admin_footer');
        } else {
            // $id_penulis = $data['id_user'];
            $judul = $this->input->post('judul');
            $isi_artikel = $this->input->post('isi_artikel');

            $file_lama = $this->Artikel_model->getArtikelById($id_artikel);

            $upload_image = $_FILES['gambar']['name'];

            // config
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/admin/artikel/';

            $this->load->library('upload', $config);

            if ($upload_image) {
                //menghapus file lama
                $nama_gambar = './assets/img/admin/artikel/' . $file_lama->gambar;
                if (is_readable($nama_gambar)) {

                    if ($this->upload->do_upload('gambar')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                        unlink($nama_gambar);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editartikel/' . $id_artikel);
                    }
                } else {
                    if ($this->upload->do_upload('gambar')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editartikel/' . $id_artikel);
                    }
                }
            }

            $this->Artikel_model->editArtikel($id_artikel, $judul, $isi_artikel);
            $this->session->set_flashdata('artikel', 'Diperbarui');
            redirect('admin/artikel');
        }
    }

    public function deleteArtikel($id_artikel)
    {
        $this->isLogin();

        $data = $this->Artikel_model->getArtikelById($id_artikel);
        $nama_gambar = './assets/img/admin/artikel/' . $data->gambar;
        if (is_readable($nama_gambar) && unlink($nama_gambar)) {
            $this->Artikel_model->deleteArtikel($id_artikel);
            $this->session->set_flashdata('artikel', 'Dihapus');
            $this->session->set_flashdata('message', '<div class="alert alert-primary col-lg-4" role="alert">Artikel berhasil dihapus.</div>');
            redirect('admin/artikel');
        }
        $this->Artikel_model->deleteArtikel($id_artikel);
        $this->session->set_flashdata('artikel', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-danger col-lg-4" role="alert">Artikel berhasil dihapus, File ' . $nama_gambar . ' tidak ditemukan.</div>');
        redirect('admin/artikel');
    }


    //--------pesan--------
    public function pesan()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Pesan Masyarakat';
        $data['subtitle'] = 'Pesan Masyarakat';

        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/pesan', $data);
        $this->load->view('admin/templates/admin_footer');
    }

    public function printAllPesan()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['pesan'] = $this->Pesan_model->getAllPesan();
        $this->load->view('admin/print_pesan', $data);
    }

    public function hapusPesan($id_pesan)
    {
        $this->isLogin();

        $this->Pesan_model->hapusPesan($id_pesan);
        $this->session->set_flashdata('pesan', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-4" role="alert"> Dihapus </div>');
        redirect('admin/pesan');
    }


    // ================== SLIDER ======================

    public function slider()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Slider';
        $data['subtitle'] = 'Slider';

        $data['slider'] = $this->Slider_model->getSlider();

        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/slider', $data);
        $this->load->view('admin/templates/admin_footer');
    }

    public function deleteSlider($id)
    {
        $this->isLogin();

        $data = $this->Slider_model->getSliderById($id);
        $nama_gambar = './assets/img/admin/slider/' . $data->gambar;
        if (is_readable($nama_gambar)) {
            $this->Slider_model->deleteSlider($id);
            unlink($nama_gambar);

            $this->session->set_flashdata('slider', 'Dihapus');
            redirect('admin/slider');
        }
        $this->Slider_model->deleteSlider($id);
        $this->session->set_flashdata('slider', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-primary col-lg-4" role="alert">Slider berhasil dihapus.</div>');
        redirect('admin/slider');
    }

    public function addSlider()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Tambah Slider';
        $data['subtitle'] = 'Slider';

        $this->form_validation->set_rules('teks1', 'Judul', 'trim');
        $this->form_validation->set_rules('teks2', 'Judul', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/tambahslider');
            $this->load->view('admin/templates/admin_footer');
        } else {
            $teks1 = $this->input->post('teks1');
            $teks2 = $this->input->post('teks2');

            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/admin/slider/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/addSlider');
                }
            }

            $data = [
                'teks1' => $teks1,
                'teks2' => $teks2,
            ];

            $this->Slider_model->addSlider($data, 'slider');
            $this->session->set_flashdata('slider', 'Ditambahkan');
            redirect('admin/slider');
        }
    }

    public function editSlider($id_slider)
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Edit Slider';
        $data['subtitle'] = 'Slider';

        $data['slider'] = $this->Slider_model->getSliderById($id_slider);

        $this->form_validation->set_rules('teks1', 'Judul', 'trim');
        $this->form_validation->set_rules('teks2', 'Judul', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/editslider');
            $this->load->view('admin/templates/admin_footer');
        } else {
            $teks1 = $this->input->post('teks1');
            $teks2 = $this->input->post('teks2');

            $data = $this->Slider_model->getSliderById($id_slider);

            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $nama_gambar = './assets/img/admin/slider/' . $data->gambar;
                if (is_readable($nama_gambar)) {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '2048';
                    $config['upload_path'] = './assets/img/admin/slider/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                        unlink($nama_gambar);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editSlider');
                    }
                } else {
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '2048';
                    $config['upload_path'] = './assets/img/admin/slider/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editSlider');
                    }
                }
            }
            $this->Slider_model->editSlider($id_slider, $teks1, $teks2);
            $this->session->set_flashdata('slider', 'Diperbarui');
            redirect('admin/slider');
        }
    }


    // --------- galeri -----------
    public function pokja()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Pokja';
        $data['subtitle'] = 'Pokja';
        $data['pokja'] = $this->Galeri_model->getPokja();

        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/galeri/pokja');
        $this->load->view('admin/templates/admin_footer');
    }

    public function addPokja()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Tambah Pokja';
        $data['subtitle'] = 'Pokja';

        $this->form_validation->set_rules('nama_pokja', 'Judul', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/galeri/tambahpokja');
            $this->load->view('admin/templates/admin_footer');
        } else {
            // $teks1 = $this->input->post('teks1');
            $nama_pokja = $this->input->post('nama_pokja');

            $upload_image = $_FILES['logo']['name'];

            //config
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/admin/pokja/';

            $this->load->library('upload', $config);

            if ($upload_image) {

                if ($this->upload->do_upload('logo')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('logo', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/addPokja');
                }
            }

            $data = [
                'nama_pokja' => $nama_pokja,
            ];

            $this->Galeri_model->addPokja($data, 'pokja');
            $this->session->set_flashdata('pokja', 'Ditambahkan');
            redirect('admin/pokja');
        }
    }


    public function editPokja($id)
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Edit Pokja';
        $data['subtitle'] = 'Pokja';

        $data['pokja'] = $this->Galeri_model->getPokjaById($id);

        $this->form_validation->set_rules('nama_pokja', 'Judul', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/galeri/editpokja');
            $this->load->view('admin/templates/admin_footer');
        } else {
            $nama_pokja = $this->input->post('nama_pokja');

            $data = $this->Galeri_model->getPokjaById($id);

            $upload_image = $_FILES['logo']['name'];

            // config
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/admin/pokja/';

            $this->load->library('upload', $config);

            if ($upload_image) {
                $nama_gambar = './assets/img/admin/pokja/' . $data->logo;
                if (is_readable($nama_gambar)) {
                    if ($this->upload->do_upload('logo')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('logo', $new_image);
                        unlink($nama_gambar);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editPokja/' . $id);
                    }
                } else {
                    if ($this->upload->do_upload('logo')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('logo', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editPokja/' . $id);
                    }
                }
            }
            $this->Galeri_model->editPokja($id, $nama_pokja);
            $this->session->set_flashdata('pokja', 'Diperbarui');
            redirect('admin/pokja');
        }
    }

    public function deletePokja($id)
    {
        $this->isLogin();

        $data = $this->Galeri_model->getPokjaById($id);
        $nama_gambar = './assets/img/admin/pokja/' . $data->logo;
        if (is_readable($nama_gambar)) {
            $this->Galeri_model->deletePokja($id);
            unlink($nama_gambar);
            $this->session->set_flashdata('pokja', 'Dihapus');
            redirect('admin/pokja');
        }
        $this->Galeri_model->deletePokja($id);
        $this->session->set_flashdata('pokja', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-primary col-lg-4" role="alert">Pokja berhasil dihapus.</div>');
        redirect('admin/pokja');
    }

    // =================  KEGIATAN   ================
    public function kegiatan()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Kegiatan';
        $data['subtitle'] = 'Kegiatan';

        // $data['kegiatan'] = $this->Galeri_model->getKegiatan();

        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/galeri/kegiatan');
        $this->load->view('admin/templates/admin_footer');
    }

    public function addKegiatan()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Tambah Kegiatan';
        $data['subtitle'] = 'Kegiatan';
        $data['pokja'] = $this->Galeri_model->getPokja();

        $this->form_validation->set_rules('nama_kegiatan', 'Judul', 'trim');
        $this->form_validation->set_rules('id_pokja', 'Pokja', 'required');
        $this->form_validation->set_message('required', 'Silakan pilih nama pokja!');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/galeri/tambahkegiatan');
            $this->load->view('admin/templates/admin_footer');
        } else {
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $id_pokja = $this->input->post('id_pokja');

            $upload_image = $_FILES['gambar']['name'];

            // config
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/admin/kegiatan/';

            $this->load->library('upload', $config);

            if ($upload_image) {
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/addKegiatan');
                }
            }

            $data = [
                'nama_kegiatan' => $nama_kegiatan,
                'id_pokja' => $id_pokja,
            ];

            $this->Galeri_model->addKegiatan($data, 'kegiatan');
            $this->session->set_flashdata('kegiatan', 'Ditambahkan');
            redirect('admin/kegiatan');
        }
    }

    public function editKegiatan($id)
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Edit Kegiatan';
        $data['subtitle'] = 'Kegiatan';

        // untuk mendapat data pokja di list item
        $data['pokja'] = $this->Galeri_model->getPokja();
        // mendapat data sekarang
        $data['kegiatan'] = $this->Galeri_model->getKegiatanById($id);

        $this->form_validation->set_rules('nama_kegiatan', 'Judul', 'trim');
        $this->form_validation->set_rules('id_pokja', 'Pokja', 'required');
        $this->form_validation->set_message('required', 'Silakan pilih nama pokja!');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/galeri/editkegiatan');
            $this->load->view('admin/templates/admin_footer');
        } else {
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $id_pokja = $this->input->post('id_pokja');

            $data = $this->Galeri_model->getKegiatanById($id);

            $upload_image = $_FILES['gambar']['name'];

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/admin/kegiatan/';

            $this->load->library('upload', $config);

            if ($upload_image) {
                $nama_gambar = './assets/img/admin/kegiatan/' . $data->gambar;
                if (is_readable($nama_gambar)) {
                    if ($this->upload->do_upload('gambar')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                        unlink($nama_gambar);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editKegiatan/' . $id);
                    }
                } else {
                    if ($this->upload->do_upload('gambar')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        // redirect('admin/editKegiatan');
                    }
                }
            }
            $this->Galeri_model->editKegiatan($id, $id_pokja, $nama_kegiatan);
            $this->session->set_flashdata('kegiatan', 'Diubah');
            redirect('admin/kegiatan');
        }
    }

    public function deleteKegiatan($id)
    {
        $this->isLogin();

        $data = $this->Galeri_model->getKegiatanById($id);
        $nama_gambar = './assets/img/admin/kegiatan/' . $data->gambar;
        if (is_readable($nama_gambar)) {
            $this->Galeri_model->deleteKegiatan($id);
            unlink($nama_gambar);
            $this->session->set_flashdata('kegiatan', 'Dihapus');
            redirect('admin/kegiatan');
        }
        $this->Galeri_model->deleteKegiatan($id);
        $this->session->set_flashdata('kegiatan', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-primary col-lg-4" role="alert">Kegiatan berhasil dihapus.</div>');
        redirect('admin/kegiatan');
    }

    public function foto_kegiatan()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Foto Kegiatan';
        $data['subtitle'] = 'Foto Kegiatan';

        // $data['foto_kegiatan'] = $this->Galeri_model->getAllFotoKegiatan();

        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/galeri/foto_kegiatan');
        $this->load->view('admin/templates/admin_footer');
    }

    public function addFotoKegiatan()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Tambah Foto Kegiatan';
        $data['subtitle'] = 'Foto Kegiatan';
        $data['kegiatan'] = $this->Galeri_model->getKegiatan();

        $this->form_validation->set_rules('id_kegiatan', 'kegiatan', 'required');
        $this->form_validation->set_message('required', 'Silakan pilih nama kegiatan!');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/galeri/tambahfotokegiatan');
            $this->load->view('admin/templates/admin_footer');
        } else {
            // $nama_kegiatan = $this->input->post('nama_kegiatan');
            $id_kegiatan = $this->input->post('id_kegiatan');

            $upload_image = $_FILES['foto']['name'];

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '3048';
            $config['upload_path'] = './assets/img/admin/fotokegiatan/';

            $this->load->library('upload', $config);

            if ($upload_image) {
                if ($this->upload->do_upload('foto')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/addFotoKegiatan');
                }
            }

            $data = [
                'id_kegiatan' => $id_kegiatan,
                'tanggal' => time()
            ];

            $this->Galeri_model->addFotoKegiatan($data);
            $this->session->set_flashdata('foto_kegiatan', 'Ditambahkan');
            redirect('admin/foto_kegiatan');
        }
    }

    public function editFotoKegiatan($id)
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Edit Foto Kegiatan';
        $data['subtitle'] = 'Foto Kegiatan';

        $data['kegiatan'] = $this->Galeri_model->getKegiatan();
        $data['foto'] = $this->Galeri_model->getFotoKegiatanById($id);
        // echo var_dump($data['foto']);
        // die;
        // print_r($data);
        $this->form_validation->set_rules('id_kegiatan', 'kegiatan', 'required');
        $this->form_validation->set_message('required', 'Silakan pilih nama kegiatan!');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/galeri/editfotokegiatan', $data);
            $this->load->view('admin/templates/admin_footer');
        } else {
            $id_kegiatan = $this->input->post('id_kegiatan');
            // $tanggal = time();

            $data = $this->Galeri_model->getFotoKegiatanById($id);

            $upload_image = $_FILES['foto']['name'];

            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/admin/fotokegiatan/';

            $this->load->library('upload', $config);

            if ($upload_image) {
                $nama_gambar = './assets/img/admin/fotokegiatan/' . $data->foto;
                if (is_readable($nama_gambar)) {
                    if ($this->upload->do_upload('foto')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('foto', $new_image);
                        unlink($nama_gambar);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editFotoKegiatan/' . $id);
                    }
                } else {
                    if ($this->upload->do_upload('foto')) {
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('foto', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editFotoKegiatan/' . $id);
                    }
                }
            }
            $this->Galeri_model->editFotoKegiatan($id, $id_kegiatan);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('foto_kegiatan', 'Diubah');
            } else {
                $this->session->set_flashdata('foto_kegiatan', 'Gagal Diubah');
            }
            redirect('admin/foto_kegiatan');
        }
    }

    public function deleteFotoKegiatan($id)
    {
        $this->isLogin();

        $data = $this->Galeri_model->getFotoKegiatanById($id);
        $nama_gambar = './assets/img/admin/fotokegiatan/' . $data->foto;
        if (is_readable($nama_gambar)) {
            $this->Galeri_model->deleteFotoKegiatan($id);
            unlink($nama_gambar);
            $this->session->set_flashdata('foto_kegiatan', 'Dihapus');
            redirect('admin/foto_kegiatan');
        }
        $this->Galeri_model->deleteFotoKegiatan($id);
        $this->session->set_flashdata('foto_kegiatan', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-primary col-lg-4" role="alert">Foto Kegiatan berhasil dihapus.</div>');
        redirect('admin/foto_kegiatan');
    }

    public function downloadFotoKegiatan($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->Galeri_model->getFotoKegiatanById($id);
        $file = 'assets/img/admin/fotokegiatan/' . $fileinfo->foto;
        force_download($file, NULL);
    }

    // --------- Materi ---------

    public function materi()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Materi';
        $data['subtitle'] = 'Materi';

        // $data['artikel'] = $this->Materi_model->getAllMateri();

        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/materi', $data);
        $this->load->view('admin/templates/admin_footer');
    }

    public function addMateri()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Tambah Materi';
        $data['subtitle'] = 'Materi';

        $this->form_validation->set_rules('judul', 'Judul', 'trim');
        // $this->form_validation->set_rules('judul', 'Judul', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/tambahmateri', $data);
            $this->load->view('admin/templates/admin_footer');
        } else {
            $judul = $this->input->post('judul');
            $size = $_FILES['file']['size'];
            $upload_file = $_FILES['file']['name'];

            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
            $config['max_size']     = '0';
            $config['upload_path'] = './assets/file/materi/';

            $this->load->library('upload', $config);

            if ($upload_file) {
                if ($this->upload->do_upload('file')) {
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('nama_file', $new_file);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/addMateri');
                }
            }

            $data = [
                'judul' => $judul,
                'file_size' => $size,
                'tanggal' => time(),
                'jumlah_unduh' => 0,
            ];

            // $this->Materi_model->addMateri($data);
            $this->db->insert('materi', $data);
            $this->session->set_flashdata('materi', 'Ditambah');
            redirect('admin/materi');
        }
    }

    public function editMateri($id)
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();
        //menghapus session search artikel
        $this->session->set_userdata('keyword',  null);

        $data['title'] = 'TPPKK Wonogiri - Edit Foto Kegiatan';
        $data['subtitle'] = 'Materi';
        $data['file'] = $this->Materi_model->getMateriById($id);

        $this->form_validation->set_rules('judul', 'Judul', 'trim');
        // $this->form_validation->set_rules('judul', 'Judul', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/admin_header', $data);
            $this->load->view('admin/templates/admin_sidebar');
            $this->load->view('admin/templates/admin_topbar', $data);
            $this->load->view('admin/editmateri', $data);
            $this->load->view('admin/templates/admin_footer');
        } else {

            $judul = $this->input->post('judul');
            $size = $_FILES['file']['size'];

            $upload_file = $_FILES['file']['name'];

            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|txt';
            $config['max_size']     = '0';
            $config['upload_path'] = './assets/file/materi/';

            $this->load->library('upload', $config);
            $data = $this->Materi_model->getMateriById($id);
            if ($upload_file) {
                $nama_file = './assets/file/materi/' . $data->nama_file;
                if (is_readable($nama_file)) {
                    if ($this->upload->do_upload('file')) {
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('nama_file', $new_file);
                        $this->db->set('file_size', $size);
                        unlink($nama_file);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editMateri/' . $id);
                    }
                } else {
                    if ($this->upload->do_upload('file')) {
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('nama_file', $new_file);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                        redirect('admin/editMateri/' . $id);
                    }
                }
            }
            $this->db->set('judul', $judul);
            $this->db->where('id_materi', $id);
            $this->db->update('materi');
            $this->session->set_flashdata('materi', 'Diubah');
            redirect('admin/materi');
        }
    }

    public function deleteMateri($id)
    {
        $data = $this->Materi_model->getMateriById($id);
        $nama_file = './assets/file/materi/' . $data->nama_file;

        if (is_readable($nama_file)) {
            $this->Materi_model->deleteMateri($id);
            // var_dump($nama_file);
            // die;

            unlink($nama_file);
            $this->session->set_flashdata('materi', 'Dihapus');
            redirect('admin/materi');
        }
        $this->Materi_model->deleteMateri($id);
        $this->session->set_flashdata('materi', 'Dihapus');
        redirect('admin/materi');
    }

    // bantuan
    public function bantuan()
    {
        $this->isLogin();

        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Admin';
        $data['subtitle'] = 'Bantuan';

        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/bantuan', $data);
        $this->load->view('admin/templates/admin_footer');
    }
}
