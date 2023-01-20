import { usePage, Head } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import React, { useState } from 'react';
import Form from './Main/Form';
import '../../css/style.css';

const Login = () => {
    const { error } = usePage().props.errors;
    const [idAdmin, setIdAdmin ] = useState();
    const [nis, setNis ] = useState(); 
    const [nip, setNip ] = useState(); 
    const [password, setPassword ] = useState(); 
    
    const [formAdminVisible, setFormAdminVisible] = useState(false);
    const [formSiswaVisible, setFormSiswaVisible] = useState(false);
    const [formGuruVisible, setFormguruVisible] = useState(false);

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
    
    const handleLoginGuru = async () => {
        try {
            Inertia.post('/login/guru', {
                nip,
                password
            })
            
        } catch (error) {
            console.warn(e.message);
        }
    }

    function resetVisible() {
        return setFormAdminVisible(false),
                setFormguruVisible(false),
                setFormSiswaVisible(false),
                setPassword("")
    }

    const visibleHandle = (cond) => {
        resetVisible()
        if (cond === 1) return setFormAdminVisible(true)
        if (cond === 2) return setFormSiswaVisible(true)
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
        <div className="kiri-atas">
            <fieldset>
                <legend></legend>
                <center>
                    <button className="button-primary"
                        onClick={() => visibleHandle(1)}>
                        Admin
                    </button>
                    <button className="button-primary"
                        onClick={() => visibleHandle(2)}>
                        Siswa
                    </button>
                    <button className="button-primary"
                        onClick={() => visibleHandle(3)}>
                        Guru
                    </button>
                    <hr />
                    <b>Login sesuai dengan anda</b>
                    <hr />
                </center>

                {/* Form Guru */}
                <div style={{ display: formGuruVisible ? 'block' : 'none' }}>
                    <Form error={error} 
                    title="Guru" 
                    type="NIP"
                    handleChangeCode={(data) => setNip(data)}
                    handleChangePass={(data) => setPassword(data)}
                    buttonClick={handleLoginGuru}
                    />
                </div>
            
                {/* Form Admin */}
                <div style={{ display: formAdminVisible ? 'block' : 'none' }}>
                    <Form error={error} 
                    title="Admin" 
                    type="Kode Admin"
                    handleChangeCode={(data) => setIdAdmin(data)}
                    handleChangePass={(data) => setPassword(data)}
                    buttonClick={handleLoginAdmin}
                    />
                </div>

                {/* Form Siswa */}
                <div style={{ display: formSiswaVisible ? 'block' : 'none' }}>
                    <Form error={error} 
                    title="Siswa" 
                    type="NIS"
                    handleChangeCode={(data) => setNis(data)}
                    handleChangePass={(data) => setPassword(data)}
                    buttonClick={handleLoginSiswa}
                    />
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