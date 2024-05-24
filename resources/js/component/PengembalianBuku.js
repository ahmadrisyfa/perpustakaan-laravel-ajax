import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export class PengembalianBuku extends Component {
    constructor(props) {
        super(props);
        this.state = {
            books: [],
        };
    }

    loadData() {
        axios.get('/daftar_pengembalian_buku_js')
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
                            <h5 className="card-title">Daftar Buku Yang Sudah Di Kembalikan</h5>
                            <table className="table table-borderless datatable">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Buku</th>
                                {/* <th scope="col">Murid</th>           */}
                                <th scope="col">Jumlah Pinjam</th>             
                                <th scope="col">Tanggal Pinjam</th>             
                                <th scope="col">Batas Di Kembalikan</th>             
                                <th scope="col">Tanggal Pengembalian</th>             
                                <th scope="col">Status</th>   
                                <th scope="col">Denda Yang Sudah Di Bayar</th>             
                                <th scope="col">Jumlah Denda</th>             
                                <th scope="col">Sisa Denda</th>             

                                </tr>
                            </thead>
                                <tbody>
                                {this.state.books.map((item) => {
                                        let created_at = new Date(item.created_at).toLocaleDateString('en-CA'); // Mengonversi created_at ke format 'yyyy-mm-dd'

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
                                                <td style={{ color: 'orange' }}>{created_at}</td>                                   
                                                <td>                                            
                                                {item.jumlah_denda < denda ? (
                                                    <button class="btn btn-danger btn-sm">Menunggak</button>                                          

                                                ) : (
                                                    // <p>Rp. {new Intl.NumberFormat('id-ID').format(denda)}</p>
                                                    <button class="btn btn-success btn-sm">Selesai</button>
                                                )}
                                                </td>
                                                <td>
                                                    Rp. {new Intl.NumberFormat('id-ID').format(item.jumlah_denda)}
                                                </td>
                                                <td>
                                                    Rp. {new Intl.NumberFormat('id-ID').format(denda)}
                                                </td>
                                                <td>
                                                    Rp. {new Intl.NumberFormat('id-ID').format(denda - item.jumlah_denda)}
                                                </td>

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

if (document.getElementById('daftar_pengembalian_buku')) {
    ReactDOM.render(<PengembalianBuku />, document.getElementById('daftar_pengembalian_buku'));
}
