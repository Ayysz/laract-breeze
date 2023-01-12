import { usePage, Head } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import React, { useState } from 'react';
import Form from './Form';
import '../../../css/style.css';

const Login = () => {
    const { error } = usePage().props.errors;
    const {idAdmin, setIdAdmin } = useState();
    const {nis, setNis } = useState(); 
    const {nip, setNip } = useState(); 
    const {password, setPassword } = useState(); 
    
    const [formAdminVisible, setFormAdminVisible] = useState(false);
    const [formsiswaVisible, setFormsiswaVisible] = useState(false);
    const [formguruVisible, setFormguruVisible] = useState(false);

    const handleLoginAdmin = () => {
        Inertia.post('/login/admin', {
            idAdmin,
            password
        })
    }

    const handleLoginSiswa = () => {
        Inertia.post('/login/siswa', {
            nis,
            password
        })
    }
    
    const handleLoginGuru = () => {
        Inertia.post('/login/guru', {
            nip,
            password
        })
    }

    function resetVisible() {
        return setFormAdminVisible(false),
                setFormguruVisible(false),
                setFormsiswaVisible(false)
    }

    const visibleHandle = (cond) => {
        resetVisible()
        if (cond === 1) return setFormAdminVisible(true)
        if (cond === 2) return setFormsiswaVisible(true)
        if (cond === 3) return setFormguruVisible(true)
    }

    return (
    <>
        <Head title="login" />

        <div className="header">
            <img src="/gambar/header.jpg" alt="header.jpg" height="40%" width="100%" />
        </div>
        <div className="menu">
            <b><a href="#" className="active">Home</a></b>
        </div>
        <div className="kiri">
            <fieldset>
                <legend></legend>
                <center>
                    <button className="button"
                        onClick={visibleHandle(1)}>
                        Admin
                    </button>
                    <button className="button"
                        onClick={visibleHandle(2)}>
                        Siswa
                    </button>
                    <button className="button"
                        onClick={visibleHandle(3)}>
                        Guru
                    </button>
                    <hr />
                    <b>Login sesuai dengan anda</b>
                    <hr />
                </center>

                {/* Form Guru */}
                <div style={{ display: formGuruVisible ? 'block' : 'none' }}>
                    <Form error={error} handleChangeCode={setNip(e.target.value)} title="Guru" type="NIS" handleChangePass={setPassword(e.target.value)} buttonClick={handleLoginGuru} />
                </div>

                {/* Form Admin */}
                <div style={{ display: formAdminVisible ? 'block' : 'none' }}>
                    <Form error={error} handleChangeCode={setIdAdmin(e.target.value)} title="Admin" type="Kode Admin" handleChangePass={setPassword(e.target.value)} buttonClick={handleLoginAdmin} />
                </div>

                {/* Form Siswa */}
                <div style={{ display: formsiswaVisible ? 'block' : 'none' }}>
                    <Form error={error} handleChangeCode={setNis(e.target.value)} title="Siswa" type="NIS" handleChangePass={setPassword(e.target.value)} buttonClick={handleLoginSiswa} />
                </div>

            </fieldset>
        </div>
        <div className="kanan">
            <center>
                <h1>SELAMAT DATANG
                    <br />
                    DI WEB PENILAIAN SMKN 1 CIBINONG
                </h1>
            </center>
        </div>

        <div className="kiri-bawah">
            <center>
                <p className="mar">Gallery</p>
                <div className="gallery">
                    <img src="/gambar/g2.jpg" alt="g2.jpg" />
                    <div className="deskripsi">SMK BISA</div>
                </div>
            </center>
        </div>

    </>
  )
}

export default Login