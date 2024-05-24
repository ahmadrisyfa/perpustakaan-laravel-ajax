import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export class PeminjamanSiswa extends Component {
    constructor(props) {
        super(props);
        this.state = {
            books: [],
        };
    }

    loadData() {
        axios.get('/list')
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
                                        <th scope="col">Buddku</th>
                                        <th scope="col">Murid</th>
                                        <th scope="col">Jumlah Pinjam</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Di Kembalikan</th>
                                        <th scope="col">Denda</th>
                                        <th scope="col">Status</th>
                                        {/* <th scope="col">Action</th> */}
                                    </tr>
                                </thead>
                                <tbody>
                                    {this.state.books.map((item) => {
                                        let overdueDays = 0;
                                        const today = new Date();
                                        const returnDate = new Date(item.tanggal_di_kembalikan);

                                        if (returnDate < today) {
                                            const diffTime = Math.abs(today.getTime() - returnDate.getTime());
                                            overdueDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                        }

                                        const penalty = overdueDays > 7 ? (overdueDays - 8) * 1000 : 0;
                                        const penaltyFormatted = penalty.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

                                        return (
                                            <tr key={item.id}>
                                                <td>{rowNum++}</td>
                                                <td>{item.buku.judul}</td>
                                                <td>{item.murid.nama}</td>
                                                <td>{item.jumlah_pinjam}</td>
                                                <td>{item.tanggal_pinjam}</td>
                                                <td>{item.tanggal_di_kembalikan}</td>
                                                <td>
                                                    {item.status == 1 ? (
                                                        "Tidak Ada Denda Yang Harus Di Bayar"
                                                    ) : (
                                                        penaltyFormatted
                                                    )}
                                                </td>
                                                <td>
                                                    {item.status == 1 ? (
                                                        <button className="btn btn-success btn-sm">Buku Sudah Di Kembalikan</button>
                                                    ) : (
                                                        <button className="btn btn-danger btn-sm">Buku Belum Di Kembalikan</button>
                                                    )}
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

if (document.getElementById('siswalist')) {
    ReactDOM.render(<PeminjamanSiswa />, document.getElementById('siswalist'));
}
