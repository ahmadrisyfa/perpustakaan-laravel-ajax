import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export class PeminjamanBuku extends Component {
    constructor(props) {
        super(props);
        this.state = {
            books: [],
        };
    }

    loadData() {
        axios.get('/daftar_pinjam_buku_js')
            .then((response) => this.setState({ books: response.data.data }));
    }

    componentDidMount() {
        this.loadData()
    }

    render() {
        let rowNum = 1; // Inisialisasi nomor urut
        return (
            <div>
                <div className="col-12">
                    <div className="card recent-sales overflow-auto">
                        <div className="card-body">
                            <h5 className="card-title">Daftar Buku Yang Anda Pinjam</h5>
                            <table className="table table-borderless datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Buku</th>
                                    {/* <th scope="col">Murid</th>           */}
                                    <th scope="col">Jumlah Pinjam</th>             
                                    <th scope="col">Tanggal Pinjam</th>             
                                    <th scope="col">Batas Di Kembalikan</th>             
                                    <th scope="col">Denda</th>             
                                    <th scope="col">Status</th>             
                                    {/* <th scope="col">Action</th>              */}
                                    </tr>
                                </thead>
                                <tbody>
                                {this.state.books.map((item) => {
                                    let denda_per_hari = 1000;
                                    let tanggal_hari_ini = new Date().toLocaleDateString('en-CA'); // Mendapatkan tanggal hari ini dalam format 'yyyy-mm-dd'
                                    let tanggal_kembali = new Date(item.tanggal_di_kembalikan).toLocaleDateString('en-CA'); // Mendapatkan tanggal pengembalian buku dalam format 'yyyy-mm-dd'
                                    
                                    let selisih_hari = Math.ceil((new Date(tanggal_hari_ini) - new Date(tanggal_kembali)) / (1000 * 60 * 60 * 24));
                                    let denda = selisih_hari > 0 ? selisih_hari * denda_per_hari : 0;

                                    return (
                                        <tr key={item.id}>
                                            <td>{rowNum++}</td>
                                            <td>{item.buku.judul}</td>
                                            {/* <td>{item.murid.nama}</td> */}
                                            <td>{item.jumlah_pinjam}</td>
                                            <td>{item.tanggal_pinjam}</td>
                                            <td>{item.tanggal_di_kembalikan}</td>
                                            <td>                                            
                                            {denda <= 0 ? (
                                                <p>Tidak Ada Denda Yang Harus Di Bayar</p>
                                            ) : (
                                                <p>Rp. {new Intl.NumberFormat('id-ID').format(denda)}</p>
                                            )}
                                            </td>
                                            <td>{denda > 0 ? (
                                                <button class="btn btn-danger btn-sm">Terlambat</button>                                          

                                            ) : (
                                                <button class="btn btn-success btn-sm">Normal</button>

                                            )}</td>
                                        </tr>
                                    );
                                })}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        );
    }


}

if (document.getElementById('daftar_pinjam_buku')) {
    ReactDOM.render(<PeminjamanBuku />, document.getElementById('daftar_pinjam_buku'));
}
