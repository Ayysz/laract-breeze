import React from 'react';
import Layout from '../Pages/Main/Layout';
import { usePage } from '@inertiajs/inertia-react';

const Home = () => {

    const { user } = usePage().props.auth;
    console.log("User",user);


  return (
    <>
        <Layout>
            <center>
                <b>
                    <br />
                    SELAMAT DATANG USER DENGAN AKSES MASUK {""}
                    {user?.kode_admin ?? user?.nis ?? user?.nip}
                </b>
            </center>
        </Layout>
    </>
    )
};

export default Home;